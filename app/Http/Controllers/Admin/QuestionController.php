<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\QuestionCategory;
use App\Models\Admin\Subject;
use Illuminate\Pagination\Paginator;
use Session;
use App\Models\Admin\AddBankQuestion;
use App\Models\Admin\AddQuestion;
use App\Models\Admin\AddPreviousQuestion;
use App\Models\Admin\AddQuizQuestion;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function question()
    {
        $datas = Question::with('subject')->orderBy('id', 'DESC')->paginate(100);

        return view('admin.question.index')
            ->with(compact('datas'))
            ->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $subjects = Subject::select('id', 'name')->active()
            ->get();
        return view('admin.question.create', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function questionStore(Request $request)
    {

        $validatedData = $request->validate([
                                            'question' => 'required',
                                            'option_1' => 'required',
                                            'option_2' => 'required',
                                            'option_3' => 'required',
                                            'option_4' => 'required',
                                            'answers' => 'required',
                                            'explanation' => 'required',
                                            'level' => 'required', ],
                                            ['question.required' => 'Question is required',
                                            'option_1.required' => 'Option Field is required',
                                            'option_2.required' => 'Option Field is required',
                                             'option_3.required' => 'Option Field is required',
                                             'option_4.required' => 'Option Field is required',
                                             'answers.required' => 'Answer is required',
                                             'explanation.required' =>
                                             'Explanation is required',
                                             'level.required' => 'Level is required']);

        Question::create($request->all());

        return redirect()
            ->route('create_question')
            ->with(Session::flash('alert-success', 'Question Created Successfully'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function questionShow(Request $request, $id)
    {
        $datas = Question::findOrFail($id);
        $html = view('admin.question.show', compact('datas'))->render();
        return response()
            ->json(['status' => true, 'html' => $html]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editQuestion(Request $request, $id)
    {

        $subjects = Subject::select('id', 'name')->active()
            ->get();
        $datas = Question::with('subject')->findOrFail($id);
        return view('admin.question.edit')->with(compact('datas', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateQuestion(Request $request, $id)
    {

        $validatedData = $request->validate(['question' => 'required', 'option_1' => 'required', 'option_2' => 'required', 'option_3' => 'required', 'option_4' => 'required', 'answers' => 'required', 'explanation' => 'required', 'level' => 'required', ], ['question.required' => 'Question is required', 'option_1.required' => 'Option Field is required', 'option_2.required' => 'Option Field is required', 'option_3.required' => 'Option Field is required', 'option_4.required' => 'Option Field is required', 'answers.required' => 'Answer is required', 'explanation.required' => 'Explanation is required', 'level.required' => 'Level is required',

        ]);

        //Check Same Category need to update
        if(Question::where('subject_id', $request->subject_id)->exists()){

            Question::where('id', $id)->update($request->except('_token'));
            return redirect()->route('question')->with(Session::flash('alert-info', 'Question Updated Successfully'));

        }else{

            if (AddQuestion::where('question_id', $id)->exists() ||
            AddPreviousQuestion::where('question_id', $id)->exists() ||
            AddBankQuestion::where('question_id', $id)->exists() ||
            AddQuizQuestion::where('question_id', $id)->exists()){
                return back()->with(Session::flash('alert-danger', 'Question Already Assigned to Some Test'));
            }

            Question::where('id', $id)->update($request->except('_token'));
            return redirect()->route('question')->with(Session::flash('alert-info', 'Question Updated Successfully'));
        }



    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteQuestion(Request $request, $id)
    {
        if (AddQuestion::where('question_id', $id)->doesntExist() &&
            AddPreviousQuestion::where('question_id', $id)->doesntExist() &&
            AddBankQuestion::where('question_id', $id)->doesntExist() &&
            AddQuizQuestion::where('question_id', $id)->doesntExist()){

             Question::findOrFail($id)->delete();
            $request->session()->flash('message', 'Question Deleted successfully.');

            $request->session()->flash('message-type', 'success');
            return response()->json(['status'=>'deleted']);
        }else{

            $request->session()->flash('message', 'Question is assigned to some Test.');
            $request->session()->flash('message-type', 'danger');
            return response()->json(['status'=>'deleted']);
        }

    }

    public function questionBulkImport()
    {
        $subjects = Subject::select('id', 'name')->active()
        ->get();
        return view('admin.question.bulk-import', compact('subjects'));
    }


}

