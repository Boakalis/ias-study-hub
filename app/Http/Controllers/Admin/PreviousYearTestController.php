<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\PreviousYearSubject;
use App\Models\Admin\PreviousYearTest;
use App\Models\Admin\Subject;
use App\Models\Question;
use App\Models\Admin\AddPreviousQuestion;
use App\Models\Admin\Batch;
use App\Models\Admin\PreviousYearCategory;
use App\Models\Admin\QuestionBankCategory;
use App\Models\TestReport;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PreviousYearTestController extends Controller
{
    public function index()
    {
        $categoryDatas = PreviousYearSubject::select('id','name')->get();

        $datas = PreviousYearTest::with('subject','category')->orderBy('order', 'ASC')->paginate(100);
        $subjects = PreviousYearSubject::active()->get();
        return view('admin.previous-year-question.test.index')
            ->with(compact('datas','subjects','categoryDatas'));
    }

    public function filter(Request $request)
    {
        $subjects = PreviousYearSubject::active()->get();

        $categoryDatas = PreviousYearSubject::select('id','name')->get();

        if ($request->category != 0) {
            $datas = PreviousYearTest::with('subject','category')->orderBy('order', 'ASC')->where('category_id',$request->subcategory_data)->paginate(100);

        }else {
            $datas = PreviousYearTest::with('subject','category')->orderBy('order', 'ASC')
            ->paginate(100);

        }
        return view('admin.previous-year-question.test.index')
            ->with(compact('datas','subjects','categoryDatas'));


    }


    public function createPreviousTest()
    {
        $datas = PreviousYearSubject::select('id', 'name')->active()
            ->get();
        $subjects = PreviousYearSubject::active()->get();
        return view('admin.previous-year-question.test.create')
            ->with(compact('datas'));
    }

    public function previousTestStore(Request $request)
    {

        if (request('slug') != null)
        {
            $request['slug'] = str_slug(request('slug') , '-');
        }
        else
        {
            $request['slug'] = str_slug(request('name') , '-');
        }

        $validator = \Validator::make($request->all() , ['category_id' => 'required', 'subject_id' => 'required', 'slug' => 'required|unique:previous_year_tests', 'status' => 'required','name'=> 'required|unique:previous_year_tests' ,'duration'=> 'required|numeric','negativemark'=> 'required:numeric','type'=> 'required','mark' => 'required|numeric'

        ], ['subject_id.required' => 'Subject Field is required','category_id.required' => 'Catgeory Field is required', ]);

        if ($validator->fails())
        {
            return response()
                ->json(['errors' => $validator->errors()
                ->all() ]);
        }

        $datas = $request->except('_token');
        PreviousYearTest::create($datas);
        $request->session()->flash('message', 'Test Added successfully.');
        $request->session()->flash('message-type', 'success');
        return response()->json(['status'=>'Updated']);
    }


    public function subCat(Request $request)
    {
        //IAS,PYQ,QB TEST FILTER SECTION
        if ($request->filter == 1) {
           $subcategories = Batch::where('series_id',$request->category_id)->active()->get();
            return response()
            ->json(['subcategories' => $subcategories, 'status' => true]);
        }elseif($request->filter == 2){
            $subcategories = QuestionBankCategory::where('subject_id',$request->category_id)->active()->get();
            return response()
            ->json(['subcategories' => $subcategories, 'status' => true]);
        }elseif($request->filter == 3){
            $subcategories = PreviousYearCategory::where('subject_id',$request->category_id)->active()->get();
            return response()
            ->json(['subcategories' => $subcategories, 'status' => true]);

        }
        //Previous Year Test SubCategory Fetch Code
        else{

        $subject_id = $request->subject_id;

        $subcategories = PreviousYearCategory::active()->where('subject_id', $subject_id)->get();
        return response()
            ->json(['subcategories' => $subcategories, 'status' => true]);
        }
    }

    public function previousTestEdit(Request $request, $id)
    {
        $subjects = PreviousYearSubject::active()->get();
        $questionCategory = Subject::active()->get();
        $categories = PreviousYearCategory::active()->get();
        $datas = PreviousYearTest::findOrFail($id);
        $showQuestion = AddPreviousQuestion::where('test_id', $id)->with('question.subject')
            ->get();

        $getQuestion = $showQuestion->pluck('question_id');

        if (isset($getQuestion) && !empty($getQuestion))
        {
            $question = Question::whereNotIn('id', $getQuestion)->active()->paginate(100);
        }
        else
        {
            $question = Question::active()->paginate(100);
        }
        return view('admin.previous-year-question.test.edit')
            ->with(compact('datas', 'subjects', 'question', 'questionCategory', 'showQuestion','categories'));
    }

    public function previousTestUpdate(Request $request, $id)
    {
        $req = $request->all();

        if (request('slug') != null)
        {
            $request['slug'] = str_slug(request('slug') , '-');
        }
        else
        {
            $request['slug'] = str_slug(request('name') , '-');
        }

        $datas = $request->except('_token', 'example_length');

        $validatedData = $request->validate([

            'name' =>  [ 'required',Rule::unique('previous_year_tests','name')->ignore($id,'id')],

            'duration' => 'required|numeric',  'subject_id' => 'required', 'mark' => 'required|numeric', 'status' => 'required', 'negativemark' => 'required|numeric', 'type' => 'required',
            'slug' =>  [ 'required',Rule::unique('previous_year_tests','slug')->ignore($id,'id')],

        ], ['name.required' => 'Name is required', 'duration.required' => 'Duration Field is required', 'batch_id.required' => 'Batch  is required', 'mark.required' => 'Mark Field is required', 'year.required' => 'Year Field is required', 'status.required' => 'Status is required', 'negativemark.required' => 'Negativemark is required', 'negativemark.numeric' => 'Negativemark must be number', 'mark.numeric' => 'Negativemark must be number', 'type.required' => 'Type is required', 'slug.required' => 'Slug is required',

        ]);

        PreviousYearTest::where('id', $id)->update($datas);

         return redirect()->route('edit_previous_test',['id' =>$id,'tab' => 1])
            ->with(Session::flash('alert-success', 'Test Updated Successfully '));

    }

    public function previousDestroy(Request $request, $id)
    {
        $test_attempt_check = TestReport::where([['test_id',$id],['course_id',3]])->first();

        if (is_null($test_attempt_check)) {
            PreviousYearTest::findOrFail($id)->delete();
            $request->session()->flash('message', 'Test Deleted successfully.');
            $request->session()->flash('message-type', 'danger');
            return response()->json(['status'=>'Updated']);
        } else {
            $request->session()->flash('message', 'User Enrolled in this Test.');
            $request->session()->flash('message-type', 'danger');
            return response()->json(['status'=>'Updated']);
    }

    }

    public function orderchange(Request $request)
    {
        $test = PreviousYearTest::all();
        foreach ($test as $data) {
            foreach ($request->order as $order) {
                if ($order['id'] == $data->id) {
                    $data->update(['order' => $order['position']]);
                }
            }
        }
        return response(['status' => 200]);
    }



    public function previousAddTestUpdate(Request $request, $id)
    {

        if(request('question_id') == null || empty($request->question_id)){
            return redirect()->route('edit_previous_test',['id' =>$id,'tab' => 2])->with(Session::flash('alert-danger', 'Select atleast one question minimum'));
        }

        foreach ($request->input("question_id") as $question_id)
        {
            $add = new AddPreviousQuestion;

            $add->test_id = $request->test_id;
            $add->question_id = $question_id;

            $add->save();
        }

        return redirect()->route('edit_previous_test',['id' =>$id,'tab' => 2])
        ->with(Session::flash('alert-success', 'Questions Added Successfully '));

    }

    public function previousSearch(Request $request, $id)
    {
        $subjects = PreviousYearSubject::get();
        $questionCategory = Subject::active()->get();
        $datas = PreviousYearTest::findOrFail($id);
        $categories = Question::select('subject_id')->with('subject')
            ->active()
            ->get();
        $subject = $request->subject_id;
        $level = $request->level;
        $showQuestion = AddPreviousQuestion::where('test_id', $id)->with('question.subject')
            ->get();

        $getQ = AddPreviousQuestion::where('test_id', $id)->get()
            ->pluck('question_id');

        if (isset($getQ) && !empty($getQ))
        {

            $question = Question::whereNotIn('id', $getQ)->select('id', 'question', 'answers', 'level', 'subject_id')
                ->with('subject')
                ->active()->when(request('subject_id') , function ($query) use ($subject)
            {
                if ($subject != null)
                {
                    $query->where('subject_id', $subject);
                }
                return $query;
            })->when(request('level') , function ($query) use ($level)
            {
                if ($level != null)
                {
                    $query->where('level', $level);
                }
                return $query;
            })->paginate(100);
        }
        else
        {
            $question = Question::paginate(100);
        }
        $tab = 2 ;

        return view('admin.previous-year-question.test.edit')->with(compact('datas', 'subjects', 'question', 'showQuestion', 'questionCategory' ,'tab','categories','subject','level'));

    }

    public function previousAddTestdestroy(Request $request, $id)
    {
        if(request('question_id') == null || empty($request->question_id)){
            return redirect()->route('edit_previous_test',['id' =>$id,'tab' => 3])->with(Session::flash('alert-danger', 'Select atleast one question minimum'));
        }

        $checked = $request->question_id;

        foreach ($checked as $value)
        {
            AddPreviousQuestion::where('id', $value)->delete();
        }

        return redirect()->route('edit_previous_test',['id' =>$id,'tab' => 3])
        ->with(Session::flash('alert-danger', 'Questions deleted Successfully '));

    }


    public function storeClone(Request $request,$id)
    {


        if (request('slug') != null)
        {
            $request['slug'] = str_slug(request('slug') , '-');
        }
        else
        {
            $request['slug'] = str_slug(request('name') , '-');
        }

        $validator = \Validator::make($request->all() , [ 'slug' => 'required|unique:previous_year_tests', 'status' => 'required','name'=> 'required|unique:previous_year_tests' ,

        ], ['subject_id.required' => 'Subject Field is required','category_id.required' => 'Catgeory Field is required', ]);

        if ($validator->fails())
        {
            return response()
                ->json(['errors' => $validator->errors()
                ->all() ]);
        }


        $datas = $request->except('_token');
        $clone = PreviousYearTest::find($id)->load('questions');

            $newTest = $clone->replicate();
            $questions = $newTest->questions;
            $newTest->name =$request->name;
            $newTest->status =$request->status;
            $newTest->slug =$request->slug;

            $newTest->save();
            $test_id = $newTest->id ;

            foreach ($questions as $key => $question) {
                    $saveQuestion = new AddPreviousQuestion;
                    $saveQuestion->test_id = $test_id;
                    $saveQuestion->question_id = $question->question_id;
                    $saveQuestion->save();
            }

       return redirect()->route('test')
       ->with(Session::flash('alert-success', 'Test Copied Successfully '));


    }




}

