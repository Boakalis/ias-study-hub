<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Subject;
use Session;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


use function GuzzleHttp\json_decode;

class SubjectController extends Controller
{
    public function subject()
    {
        $datas = Subject::orderBy('id', 'DESC')->paginate(50);
        return view('admin.subject.index')
            ->with(compact('datas'));
    }

    public function createSubject()
    {
        return view('admin.subject.create');
    }

    public function subjectStore(Request $request)
    {

        $validator = \Validator::make($request->all() , ['name' => 'required|unique:subjects', 'status' => 'required|integer',

    ],['name.unique' => 'Subject Name Must Be Unique' ]);

        if ($validator->fails())
        {
            return response()
                ->json(['errors' => $validator->errors()
                ->all() ]);
        }
        $datas = ['name' => request('name') , 'status' => request('status') , 'created_by' => Auth::guard('admin')->user()->id, ];
        Subject::create($datas);
        $request->session()->flash('message', 'Category added successfully.');
        $request->session()->flash('message-type', 'success');
        return response()->json(['status'=>'Added']);

    }

    public function subjectEdit(Request $request, $id)
    {

        $subject = Subject::findOrFail($id);
        return response()->json($subject);

    }

    public function subjectUpdate(Request  $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' =>  [ 'required',Rule::unique('subjects','name')->ignore($id,'id')],
            'status' => ['required'],
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all() ]);
        }

        $datas = ['name' => $request->name, 'status' => $request->status, ];

        Subject::where('id', $id)->update($datas);

        $request->session()->flash('message', 'Category Updated successfully.');
        $request->session()->flash('message-type', 'success');
        return response()->json(['status'=>'Updated']);

    }

    public function deleteSubject(Request $request ,$id)
    {

        $subjects = Subject::with('question')->find($id);

        if ($subjects
            ->question
            ->isEmpty())
        {

            $subjects->delete();
            $request->session()->flash('message', 'Category Deleted successfully.');
            $request->session()->flash('message-type', 'danger');
            return response()->json(['status'=>'deleted']);




        }
        else
        {
            $request->session()->flash('message', 'Questions is assigned to this Category.');
            $request->session()->flash('message-type', 'danger');
            return response()->json(['status'=>'deleted']);
        }

    }
}

