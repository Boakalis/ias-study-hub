<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\PreviousYearCategory;
use App\Models\Admin\PreviousYearSubject;
use App\Models\Admin\PreviousYearTest;
use Illuminate\Http\Request;
use Session;
use Validator;
use Illuminate\Validation\Rule;
use App\Models\Admin\Helper;

class PreviousYearController extends Controller
{
    public function index()
    {
        $datas = PreviousYearSubject::orderBy('id', 'DESC')->paginate(50);
        return view('admin.previous-year-question.category.index')->with(compact('datas'));
    }

    public function categories()
    {
        $subjects = PreviousYearSubject::orderBy('id', 'DESC')->get();
        $datas = PreviousYearCategory::with('subject')->paginate(50);
        return view('admin.previous-year-question.sub-category.index')
            ->with(compact('datas', 'subjects'));
    }


    public function previousStore(Request $request)
    {

        if (request('slug') != null)
        {
            $request['slug'] = str_slug(request('slug') , '-');
        }
        else
        {
            $request['slug'] = str_slug(request('name') , '-');
        }

    $validator = \Validator::make($request->all() , ['name' => 'required|unique:previous_year_subjects', 'status' => 'required|integer', 'slug' => 'required|unique:previous_year_subjects' , 'image' =>'mimes:jpeg,jpg,png,gif|required|max:10000','price' => 'required|numeric'

        ]);

        if ($validator->fails())

        {
            return response()
                ->json(['errors' => $validator->errors()
                ->all() ]);
        }

        $bannerImage = null;

        if($request->hasFile('image') )
        {
            $file_name = str_replace(" ", "-", $request->image->getClientOriginalName());
            $file_arr  = Helper::upload_file($file_name,'image');
            $request->image->move($file_arr['path'], $file_arr['file_name']);
            $bannerImage = $file_arr['db_path'];
        }


        $datas = [
            'name' => $request -> name ,
            'price' => $request -> price ,
            'slug' => $request -> slug ,
            'status' => $request -> status ,
            'image' => $bannerImage,
        ];

        if($bannerImage == null){
            unset($datas['image']);
        }

        PreviousYearSubject::create($datas);
        $request->session()->flash('message', 'Category Added successfully.');
        $request->session()->flash('message-type', 'success');
        return response()->json(['status'=>'Updated']);
    }


    public function categoriesStore(Request $request)
    {

        if (request('slug') != null)
        {
            $request['slug'] = str_slug(request('slug') , '-');
        }
        else
        {
            $request['slug'] = str_slug(request('category') , '-');
        }

        $validator = \Validator::make($request->all() , ['category' => 'required|unique:previous_year_categories', 'subject_id' => 'required', 'status' => 'required', 'slug' => 'required|unique:previous_year_categories',

        ], ['subject_id.required' => 'The Subject field is required', 'category_id.required' => 'The Category field is required', ]);

        if ($validator->fails())
        {
            return response()
                ->json(['errors' => $validator->errors()
                ->all() ]);
        }

        $datas = $request->except('_token');
        PreviousYearCategory::create($datas);

        $test_number = PreviousYearCategory::where('subject_id',$request->subject_id)->get()->count();
        $values = ['categorycount' => $test_number, ];

        PreviousYearSubject::where('id',$request->subject_id)->update($values);
        $request->session()->flash('message', 'Sub-Category Added successfully.');
        $request->session()->flash('message-type', 'success');
        return response()->json(['status'=>'Updated']);
    }



    public function previousEdit(Request $request, $id)
    {
        $datas = PreviousYearSubject::findOrFail($id);
        return response()->json($datas);
    }

    public function categoriesEdit(Request $request, $id)
    {

        $datas = PreviousYearCategory::with('subject')->findOrFail($id);
        $subjects = PreviousYearSubject::active()->get();
        return response()
            ->json($datas);

    }

    public function previousUpdate(Request $request, $id)
    {

        if (request('slug') != null)
        {
            $request['slug'] = str_slug(request('slug') , '-');
        }
        else
        {
            $request['slug'] = str_slug(request('name') , '-');
        }

        $validator = \Validator::make($request->all() , [
            'name' =>  [ 'required',Rule::unique('previous_year_subjects','name')->ignore($id,'id')],
            'slug' =>  [ 'required',Rule::unique('previous_year_subjects','slug')->ignore($id,'id')],
            'status' => 'required|integer' , 'image' =>'mimes:jpeg,jpg,png,gif|max:10000','price' => 'required|numeric'

        ]);

        if ($validator->fails())
        {
            return response()
                ->json(['errors' => $validator->errors()
                ->all() ]);
        }

        $bannerImage = null;

        if($request->hasFile('image') )
        {
            $file_name = str_replace(" ", "-", $request->image->getClientOriginalName());
            $file_arr  = Helper::upload_file($file_name,'image');
            $request->image->move($file_arr['path'], $file_arr['file_name']);
            $bannerImage = $file_arr['db_path'];
        }

        $datas = [
            'name' => $request -> name ,
            'price' => $request -> price ,
            'slug' => $request -> slug ,
            'status' => $request -> status ,
            'image' => $bannerImage,
        ];

        if($bannerImage ==null){
            unset($datas['image']);
        }

        PreviousYearSubject::where('id', $id)->update($datas);

        $request->session()->flash('message', 'Category Updated successfully.');
        $request->session()->flash('message-type', 'success');
        return response()->json(['status'=>'Updated']);

    }


    public function categoriesupdate(Request $request, $id)
    {
        if (request('slug') != null)
        {
            $request['slug'] = str_slug(request('slug') , '-');
        }
        else
        {
            $request['slug'] = str_slug(request('category') , '-');
        }

        $validator = \Validator::make($request->all() , [
            'category' =>  [ 'required',Rule::unique('previous_year_categories','category')->ignore($id,'id')],
            'slug' =>  [ 'required',Rule::unique('previous_year_categories','slug')->ignore($id,'id')],
               'status' => 'required','subject_id' =>'required',

        ]);

        if ($validator->fails())
        {
            return response()
                ->json(['errors' => $validator->errors()
                ->all() ]);
        }

        $datas = $request->except('_token');

        PreviousYearCategory::where('id',$id)->update($datas);

        $request->session()->flash('message', 'Category Updated successfully.');
        $request->session()->flash('message-type', 'success');
        return response()->json(['status'=>'Updated']);

    }





    public function previousDestroy(Request $request,$id)
    {
        $check = PreviousYearCategory::where('subject_id', $id)->get();

        if ($check->isEmpty())
        {
            $datas = PreviousYearSubject::find($id)->delete();
            $request->session()->flash('message', 'Category Deleted successfully.');
            $request->session()->flash('message-type', 'danger');
            return response()->json(['status'=>'deleted']);

        }
        else
        {
            $request->session()->flash('message', 'Category Assigned to some Test.');
            $request->session()->flash('message-type', 'danger');
            return response()->json(['status'=>'deleted']);

        }

    }

    public function categoriesDestroy(Request $request,$id)
    {
        $check = PreviousYearTest::where('category_id', $id)->get();

        if ($check->isEmpty())
        {
            $datas =PreviousYearCategory::find($id)->delete();
            $request->session()->flash('message', 'Category Deleted successfully.');
            $request->session()->flash('message-type', 'danger');
            return response()->json(['status'=>'deleted']);
        }
        else
        {
            $request->session()->flash('message', 'Category Assigned to some Test.');
            $request->session()->flash('message-type', 'danger');
            return response()->json(['status'=>'deleted']);
        }

    }



}

