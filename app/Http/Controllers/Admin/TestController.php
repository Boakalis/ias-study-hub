<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Test;
use App\Models\Admin\Batch;
use App\Models\Admin\Series;
use App\Models\Admin\Subject;
use App\Models\Admin\AddQuestion;
use App\Models\Question;
use App\Models\TestReport;
use Session;
use Illuminate\Pagination\Paginator;
use File;
use Auth;
use Facade\Ignition\Middleware\AddQueries;
use Input;
use function GuzzleHttp\json_decode;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class TestController extends Controller
{

    public function test()
    {

        $categoryDatas = Series::select('id','name')->get();
        $subCategoryDatas = Batch::select('id','name')->get();
        $datas = Test::with("batch.series")->orderBy('order', 'ASC')
            ->paginate(100);

        return view('admin.ias.test.index')
            ->with(compact('datas','categoryDatas','subCategoryDatas'));
    }

    public function createTest()
    {

        $batch = Batch::with('series')->get();

        return view('admin.ias.test.create')
            ->with(compact('batch'));
    }

    public function storeTest(Request $request)
    {

        $datas = $request->except('_token');

        if (request('slug') != null) {
            $request['slug'] = str_slug(request('slug'), '-').'-'.Carbon::now()->format('Y-m').'-'.substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 1, 2) . date('y') . date('m') . '00' . substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'), 1, 2);
        } else {
            $request['slug'] = str_slug(request('name'), '-').'-'.Carbon::now()->format('Y-m').'-'.substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 1, 2) . date('y') . date('m') . '00' . substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'), 1, 2);;
        }



        $name = $request->name;
        $slug = $request->slug;

        if (    Test::where([['batch_id',$request->batch_id],['name',$name]])->exists()) {
            return back()
            ->with(Session::flash('alert-danger', 'Batch with same test name exists.'));

        }elseif(Test::where([['batch_id',$request->batch_id],['slug',$slug]])->exists()) {
            return back()
            ->with(Session::flash('alert-danger', 'Batch with same test slug exists.'));

        }else{


        $validatedData = $request->validate(
            [

                'duration' => 'required|numeric',
                'batch_id' => 'required',
                'mark' => 'required|numeric|integer',
                'status' => 'required|integer',
                'negativemark' => 'required|numeric',
                'type' => 'required|integer',
            ],
            [
                'name.required' => 'Name is required', 'duration.required' => 'Duration Field is required', 'batch_id.required' => 'Batch  is required', 'mark.required' => 'Mark Field is required', 'status.required' => 'Status is required', 'negativemark.required' => 'Negativemark is required', 'negativemark.numeric' => 'Negativemark must be number', 'mark.numeric' => 'Mark must be number', 'mark.integer' => 'Mark Field must be integer',  'type.required' => 'Type is required', 'slug.required' => 'Slug is required',
            ]
        );

        $datas = $request->except('_token');

        Test::create($datas);
        $test_number = Test::where('batch_id', $request->batch_id)->get()->count();
        $values = ['testcount' => $test_number,];

        Batch::where('id', $request->batch_id)->update($values);


        return redirect()->route('create_test')
            ->with(Session::flash('alert-success', 'Test Created Successfully'));
    }
    }

    public function testEdit(Request $request, $id)
    {
        $batch = Batch::with('series')->get();
        $category = Subject::get();
        $datas = Test::with("batch.series")->findOrFail($id);
        $question = Question::select('id', 'question', 'answers', 'level', 'subject_id')->with('subject')
            ->active()
            ->paginate(100);
        $showQuestion = AddQuestion::where('test_id', $id)->with('question.subject')
            ->get();

        $getQ = $showQuestion->pluck('question_id');

        if (isset($getQ) && !empty($getQ)) {
            $questions = Question::whereNotIn('id', $getQ)->active()->paginate(100);
        } else {
            $questions = Question::paginate(100);
        }

        return view('admin.ias.test.edit')->with(compact('batch', 'datas', 'question', 'category', 'questions', 'showQuestion'));
    }

    public function testUpdate(Request $request, $id)
    {

if (request('slug') != null) {
            $request['slug'] = str_slug(request('slug'), '-').'-'.Carbon::now()->format('Y-m').'-'.substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 1, 2) . date('y') . date('m') . '00' . substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'), 1, 2);
        } else {
            $request['slug'] = str_slug(request('name'), '-').'-'.Carbon::now()->format('Y-m').'-'.substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 1, 2) . date('y') . date('m') . '00' . substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'), 1, 2);;
        }

        $name = $request->name;
        $slug = $request->slug;
        if (    Test::where([['batch_id',$request->batch_id],['name',$name]])->count() > 1 ) {
            return back()
            ->with(Session::flash('alert-danger', 'Batch with same test name exists.'));

        }elseif(Test::where([['batch_id',$request->batch_id],['slug',$slug]])->count() > 1){
            return back()
            ->with(Session::flash('alert-danger', 'Batch with same test slug exists.'));

        }else {
        $validatedData = $request->validate([
            'duration' => 'required|numeric',
             'batch_id' => 'required',
              'mark' => 'required|numeric',
              'status' => 'required|integer',
              'negativemark' => 'required|numeric',
              'type' => 'required|integer',
            ], [
            'name.required' => 'Name is required', 'duration.required' => 'Duration Field is required', 'batch_id.required' => 'Batch  is required', 'mark.required' => 'Mark Field is required', 'status.required' => 'Status is required', 'negativemark.required' => 'Negativemark is required', 'negativemark.numeric' => 'Negativemark must be number', 'mark.numeric' => 'Mark must be number', 'type.required' => 'Type is required', 'slug.required' => 'Slug is required',
        ]);

        $datas = $request->except('_token', 'example_length', 'tab');
        Test::where('id', $id)->update($datas);
        return redirect()->route('edit_test', ['id' => $id, 'tab' => 1])
            ->with(Session::flash('alert-success', 'Test Updated Successfully '));
    }
    }

    public function addTestUpdate(Request $request, $id)
    {
        if (request('question_id') == null || empty($request->question_id)) {
            return redirect()->route('edit_test', ['id' => $id, 'tab' => 2])->with(Session::flash('alert-danger', 'Select atleast one question minimum'));
        }

        foreach ($request->input("question_id") as $question_id) {
            $add = new AddQuestion;

            $add->test_id = $request->test_id;
            $add->question_id = $question_id;

            $add->save();
        }

        return redirect()->route('edit_test', ['id' => $id, 'tab' => 2])
            ->with(Session::flash('alert-success', 'Questions Added Successfully '));
    }

    public function search(Request $request, $id)
    {

        $batch = Batch::with('series')->get();
        $datas = Test::with("batch.series")->findOrFail($id);
        $category = Subject::get();
        $subject = $request->subject_id;
        $level = $request->level;

        //Show Added Questions on Delete Question Tab
        $showQuestion = AddQuestion::where('test_id', $id)->with('question.subject')->get();

        //Ignore Added Questions on Add Question List
        $getQ = AddQuestion::where('test_id', $id)->get()->pluck('question_id');

        if (isset($getQ) && !empty($getQ)) {
            $questions = Question::whereNotIn('id', $getQ)->select('id', 'question', 'answers', 'level', 'subject_id')
                ->with('subject')
                ->active()->when(request('subject_id'), function ($query) use ($subject) {
                    if ($subject != null) {
                        $query->where('subject_id', $subject);
                    }
                    return $query;
                })->when(request('level'), function ($query) use ($level) {
                    if ($level != null) {
                        $query->where('level', $level);
                    }
                    return $query;
                })->paginate(100);
        } else {
            $questions = Question::paginate(100);
        }
        $tab = 2;

        return view('admin.ias.test.edit')->with(compact('batch', 'datas', 'category', 'questions', 'showQuestion', 'tab', 'level', 'subject'));
    }

    public function testdestroy(Request $request, $id)
    {
        if (request('question_id') == null || empty($request->question_id)) {
            return redirect()->route('edit_test', ['id' => $id, 'tab' => 3])->with(Session::flash('alert-danger', 'Select atleast one question minimum'));
        }

        $checked = $request->question_id;

        foreach ($checked as $value) {
            AddQuestion::where('id', $value)->delete();
        }

        return redirect()->route('edit_test', ['id' => $id, 'tab' => 3])
            ->with(Session::flash('alert-danger', 'Questions Removed from this Test Successfully '));
    }

    public function testClone($id)
    {
        $datas = Test::where('id',$id)->first();
        $batch = Batch::with('series')->get();

        return view('admin.ias.test.add')->with(compact('datas','batch'));
    }

    public function orderchange(Request $request)
    {
        $test = Test::all();
        foreach ($test as $data) {
            foreach ($request->order as $order) {
                if ($order['id'] == $data->id) {
                    $data->update(['order' => $order['position']]);
                }
            }
        }
        return response(['status' => 200]);
    }



    public function storeClone(Request $request,$id)
    {

        $datas = $request->except('_token');

        if (request('slug') != null) {
            $request['slug'] = str_slug(request('slug'), '-');
        } else {
            $request['slug'] = str_slug(request('name'), '-');
        }

        $name = $request->name;
        $slug = $request->slug;

        if (    Test::where([['batch_id',$request->batch_id],['name',$name]])->exists()) {
            return back()
            ->with(Session::flash('alert-danger', 'Batch with same test name exists.'));

        }elseif(Test::where([['batch_id',$request->batch_id],['slug',$slug]])->exists()) {
            return back()
            ->with(Session::flash('alert-danger', 'Batch with same test slug exists.'));

        }else{

            $clone = Test::find($id)->load('questions');
            $newTest = $clone->replicate();
            $questions = $newTest->questions;
            $newTest->name =$request->name;
            $newTest->batch_id =$request->batch_id;
            $newTest->duration =$request->duration;
            $newTest->mark =$request->mark;
            $newTest->negativemark =$request->negativemark;
            $newTest->type =$request->type;
            $newTest->slug =$request->slug;
            $newTest->start_date = $request->start_date;

            $newTest->save();
            $test_id = $newTest->id ;

            foreach ($questions as $key => $question) {
                    $saveQuestion = new AddQuestion;
                    $saveQuestion->test_id = $test_id;
                    $saveQuestion->question_id = $question->question_id;
                    $saveQuestion->save();
            }

       return redirect()->route('test')
       ->with(Session::flash('alert-success', 'Test Copied Successfully '));
    }
    }

    public function filter(Request $request)
    {
        $categoryDatas = Series::select('id','name')->get();
        $subCategoryDatas = Batch::select('id','name')->get();

        if ($request->category != 0) {
            $datas = Test::with("batch.series")->orderBy('order', 'ASC')->where('batch_id',$request->subcategory_data)->paginate(100);

        }else {
            $datas = Test::with("batch.series")->orderBy('order', 'ASC')
            ->paginate(100);

        }

        return view('admin.ias.test.index')
            ->with(compact('datas','categoryDatas','subCategoryDatas'));

    }

    public function testDestroyAll(Request $request, $id)
    {

        if (TestReport::where([['test_id', $id], ['course_id', 1]])->doesntExist()) {
            Test::findOrFail($id)->delete();
            $request->session()->flash('message', 'Test Deleted successfully.');
            $request->session()->flash('message-type', 'danger');
            return response()->json(['status' => 'Updated']);
        } else {
            $request->session()->flash('message', 'User Enrolled in this Test.');
            $request->session()->flash('message-type', 'danger');
            return response()->json(['status' => 'Updated']);
        }
    }

}
