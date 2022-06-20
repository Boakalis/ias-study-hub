<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\QuestionBankSubject;
use App\Models\Admin\QuestionBankCategory;
use App\Models\Admin\QuestionBankQuestion;
use App\Models\Admin\AddBankQuestion;
use App\Models\Admin\Subject;
use App\Models\Question;
use App\Models\TestReport;
use Illuminate\Http\Request;
use Session;
use File;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Admin\Helper;


class QuestionBankController extends Controller
{
    public function subject()
    {
        $datas = QuestionBankSubject::get();
        return view('admin.questionbank.subject.index')->with(compact('datas'));
    }

    public function categories()
    {

        $subjects = QuestionBankSubject::active()->get();
        $datas = QuestionBankCategory::with('subject')->get();
        return view('admin.questionbank.sub-category.index')
            ->with(compact('datas', 'subjects'));
    }

    public function question()
    {
        $categoryDatas = QuestionBankSubject::select('id','subject')->get();
        $datas = QuestionBankQuestion::with('subject', 'category')->orderBy('order','ASC')->paginate(100);
        $subjects = QuestionBankSubject::active()->get();
        $categories = QuestionBankCategory::active()->get();
        return view('admin.questionbank.question-bank.index')
            ->with(compact('subjects', 'datas','categoryDatas', 'categories'));
    }

    public function filter(Request $request)
    {
        $categoryDatas = QuestionBankSubject::select('id','subject')->get();

        if ($request->category != 0) {
            $datas = QuestionBankQuestion::with('subject', 'category')->orderBy('order', 'ASC')->where('category_id',$request->subcategory_data)->paginate(100);

        }else {
            $datas = QuestionBankQuestion::with('subject', 'category')->orderBy('order','ASC')->paginate(100);


        }

        $subjects = QuestionBankSubject::active()->get();
        $categories = QuestionBankCategory::active()->get();
        return view('admin.questionbank.question-bank.index')
            ->with(compact('subjects', 'datas','categoryDatas', 'categories'));
    }


    public function subCat(Request $request)
    {

        $subject_id = $request->subject_id;

        $subcategories = QuestionBankCategory::active()->where('subject_id', $subject_id)->get();
        return response()
            ->json(['subcategories' => $subcategories, 'status' => true]);
    }

    public function subjectEdit(Request $request, $id)
    {

        $datas = QuestionBankSubject::findOrFail($id);
        return response()->json($datas);

    }

    public function categoriesEdit(Request $request, $id)
    {

        $datas = QuestionBankCategory::with('subject')->findOrFail($id);
        $subjects = QuestionBankSubject::active()->get();
        return response()
            ->json($datas);

    }

    public function questionEdit(Request $request, $id)
    {
           $category = Subject::get();
              $datas = QuestionBankQuestion::with('subject','category')->findOrFail($id);
              $categories = QuestionBankCategory::active()->get();
              $subjects = QuestionBankSubject::active()->get();
        $showQuestion = AddBankQuestion::where('bank_id', $id)->with('question.subject')
            ->get();

        $getQuestion = AddBankQuestion::where('bank_id', $id)->get()
            ->pluck('question_id');

        if (isset($getQuestion) && !empty($getQuestion))
        {
            $questions = Question::whereNotIn('id', $getQuestion)->active()->paginate(100);
        }
        else
        {
            $questions = Question::paginate(100);
        }

        return view('admin.questionbank.question-bank.edit')->with(compact('datas','categories', 'subjects', 'category', 'questions', 'showQuestion'));

    }

    public function search(Request $request, $id)
    {

        $category = Subject::get();
        $categories = QuestionBankCategory::active()->get();
        $datas = QuestionBankQuestion::with('subject','category')->findOrFail($id);
        $subjects = QuestionBankSubject::active()->get();
        $subject = $request->subject_id;
        $level = $request->level;
        $showQuestion = AddBankQuestion::where('bank_id', $id)->with('question.subject')
        ->get();
        $getQuestion = AddBankQuestion::where('bank_id', $id)->get()
        ->pluck('question_id');


        if (isset($getQuestion) && !empty($getQuestion))
        {
            $questions = Question::whereNotIn('id', $getQuestion)->select('id', 'question', 'answers', 'level', 'subject_id')
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
            $questions = Question::paginate(100);
        }

        return view('admin.questionbank.question-bank.edit',['id' => $id, 'tab' => 2])->with(compact('datas','categories', 'category', 'questions', 'showQuestion', 'subjects'));

    }

    public function questionBankShow(Request $request, $id)
    {
        $datas = QuestionBankQuestion::with('subject', 'category')->findOrFail($id);
        $questions = AddBankQuestion::where('bank_id', $id)->with('question')
            ->get();
        return view('admin.questionbank.question.show')
            ->with(compact('datas', 'questions'));
    }

    public function subjectStore(Request $request)
    {

        if (request('slug') != null)
        {
            $request['slug'] = str_slug(request('slug') , '-');
        }
        else
        {
            $request['slug'] = str_slug(request('subject') , '-');
        }

        $validator = Validator::make($request->all() , ['subject' => 'required|unique:question_bank_subjects',
        'slug' => 'required|unique:question_bank_subjects',
        'price' => 'required|numeric',
        'image' => 'mimes:jpeg,jpg,png,gif|max:10000','status' => 'required', 'slug' => 'required',],[ 'subject.required' => 'Subject is Required'

        ]);

        if ($validator->fails())
        {
            return response()
                ->json(['errors' => $validator->errors()
                ->all() ]);
        }

         $imageName = null;

        if($request->hasFile('image') )
        {
            $file_name = str_replace(" ", "-", $request->image->getClientOriginalName());
            $file_arr  = Helper::upload_file($file_name,'image');
            $request->image->move($file_arr['path'], $file_arr['file_name']);
            $imageName = $file_arr['db_path'];
        }

         $datas = [
                'subject' => $request -> subject ,
                'price' => $request -> price ,
                'slug' => $request -> slug ,
                'status' => $request -> status ,
                'image' => $imageName,
            ];

        if($imageName == null){
            unset($datas['image']);
        }


        QuestionBankSubject::create($datas);
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

        $validator = Validator::make($request->all() , [
        'category' => 'required|unique:question_bank_categories',
        'slug' => 'required|unique:question_bank_categories',
        'subject_id' => 'required', 'status' => 'required',

        ], ['subject_id.required' => 'The Subject field is required', 'category_id.required' => 'The Category field is required', ]);

        if ($validator->fails())
        {
            return response()
                ->json(['errors' => $validator->errors()
                ->all() ]);
        }

        $datas = $request->except('_token');
        QuestionBankCategory::create($datas);

        $test_number = QuestionBankCategory::where('subject_id',$request->subject_id)->get()->count();
        $values = ['categorycount' => $test_number, ];

        QuestionBankSubject::where('id',$request->subject_id)->update($values);
        $request->session()->flash('message', 'Sub-Category Added successfully.');
        $request->session()->flash('message-type', 'success');
        return response()->json(['status'=>'Updated']);
    }

    public function questionStore(Request $request)
    {

        if (request('slug') != null)
        {
            $request['slug'] = str_slug(request('slug') , '-');
        }
        else
        {
            $request['slug'] = str_slug(request('name') , '-');
        }

        $validator = Validator::make($request->all() , [
              'name' =>   'required|unique:question_bank_questions',

            'category_id' => 'required', 'subject_id' => 'required', 'slug' => 'required|unique:question_bank_questions', 'status' => 'required','duration' => 'required:numeric','type' => 'required|integer' ,'mark' => 'required|numeric','negativemark' => 'required|numeric'

        ], ['subject_id.required' => 'The Subject Field is required', 'category_id.required' => 'The Category Field is Required' ]);

        if ($validator->fails())
        {
            return response()
                ->json(['errors' => $validator->errors()
                ->all() ]);
        }

        $datas = $request->except('_token');
        QuestionBankQuestion::create($datas);
        $request->session()->flash('message', 'Test Added successfully.');
        $request->session()->flash('message-type', 'success');
        return response()->json(['status'=>'Updated']);
    }

    public function subjectUpdate(Request $request, $id)
    {


        if (request('slug') != null)
        {
            $request['slug'] = str_slug(request('slug') , '-');
        }
        else
        {
            $request['slug'] = str_slug(request('subject') , '-');
        }


        $validator = Validator::make($request->all() , [
            'subject' =>  [ 'required',Rule::unique('question_bank_subjects','subject')->ignore($id,'id')],
            'slug' =>  [ 'required',Rule::unique('question_bank_subjects','slug')->ignore($id,'id')],
             'price' => 'required|numeric','image' => 'mimes:jpeg,jpg,png,gif|max:10000',
             'status' => 'required',
            ],[ 'subject.required' => 'Subject is Required'

        ]);

        if ($validator->fails())
        {
            return response()
                ->json(['errors' => $validator->errors()
                ->all() ]);
        }

        $oldImage = QuestionBankSubject::findOrFail($id)->pluck('image')->first();

        $imageName = null;

        if($request->hasFile('image') )
        {
            $file_name = str_replace(" ", "-", $request->image->getClientOriginalName());
            $file_arr  = Helper::upload_file($file_name,'image');
            $request->image->move($file_arr['path'], $file_arr['file_name']);
            $imageName = $file_arr['db_path'];
        }

        $datas = [
                'subject' => $request -> subject ,
                'price' => $request -> price ,
                'slug' => $request -> slug ,
                'status' => $request -> status ,
                'image' => $imageName,
            ];

             if($imageName == null){
            unset($datas['image']);
        }


        QuestionBankSubject::where('id', $id)->update($datas);
        $request->session()->flash('message', 'Category Updated successfully.');
        $request->session()->flash('message-type', 'success');
        return response()->json(['status'=>'Updated']);

    }

    public function categoriesUpdate(Request $request, $id)
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


            'category' =>  [ 'required',Rule::unique('question_bank_categories','category')->ignore($id,'id')],
            'slug' =>  [ 'required',Rule::unique('question_bank_categories','slug')->ignore($id,'id')],
             'subject_id' => 'required',  'status' => 'required'

        ], ['subject_id.required' => 'The Subject field is required', 'category.required' => 'The Category field is required', ]);

        if ($validator->fails())
        {
            return response()
                ->json(['errors' => $validator->errors()
                ->all() ]);
        }

        $datas = $request->except('_token');
        QuestionBankCategory::where('id', $id)->update($datas);
        $request->session()->flash('message', 'Sub-Category updated successfully.');
        $request->session()->flash('message-type', 'success');
        return response()->json(['status'=>'Updated']);
    }

    public function bankUpdate(Request $request, $id)
    {
        if (request('slug') != null)
        {
            $request['slug'] = str_slug(request('slug') , '-');
        }
        else
        {
            $request['slug'] = str_slug(request('name') , '-');
        }

        $validatedData = $request->validate([
            'name' =>  [ 'required',Rule::unique('question_bank_questions','name')->ignore($id,'id')],
            'category_id' => 'required', 'subject_id' => 'required',
            'slug' =>  [ 'required',Rule::unique('question_bank_questions','slug')->ignore($id,'id')],
              'status' => 'required', ], ['subject_id.required' => 'The Subject field is required', 'category_id.required' => 'The Category field is required', ]);
        $datas = $request->except('_token');

        QuestionBankQuestion::where('id', $id)->update($datas);
        return redirect()->route('edit_question_bank_question',['id' =>$id,'tab' => 1])
            ->with(Session::flash('alert-success', 'Test updated Successfully'));

    }

    public function orderchange(Request $request)
    {
        $test = QuestionBankQuestion::all();
        foreach ($test as $data) {
            foreach ($request->order as $order) {
                if ($order['id'] == $data->id) {
                    $data->update(['order' => $order['position']]);
                }
            }
        }
        return response(['status' => 200]);
    }



    public function questionUpdate(Request $request, $id)
    {

        if(request('question_id') == null || empty($request->question_id)){
            return redirect()->route('edit_question_bank_question',['id' =>$id,'tab' => 2])->with(Session::flash('alert-danger', 'Select atleast one question minimum'));
        }

        $request->input('question_id');
        foreach ($request->input("question_id") as $question_id)
        {
            $add = new AddBankQuestion;

            $add->bank_id = $request->bank_id;
            $add->question_id = $question_id;

            $add->save();
        }

        return redirect()->route('edit_question_bank_question',['id' =>$id,'tab' => 2])
            ->with(Session::flash('alert-success', 'Questions Added Successfully '));

    }

    public function subjectDestroy(Request $request,$id)
    {
        // return  QuestionBankSubject::withTrashed()->find(1)->restore();
        $check = QuestionBankCategory::where('subject_id', $id)->get();

        if ($check->isEmpty())
        {
            $datas = QuestionBankSubject::findOrFail($id)->delete();
            $request->session()->flash('message', 'Category Deleted successfully.');
            $request->session()->flash('message-type', 'danger');
            return response()->json(['status'=>'Updated']);

        }
        else
        {
            $request->session()->flash('message', 'Category Assined to some Test .');
            $request->session()->flash('message-type', 'danger');
            return response()->json(['status'=>'Updated']);

        }

    }

    public function categoriesDestroy(Request $request,$id)
    {

        $check = QuestionBankQuestion::where('category_id', $id)->get();

        if ($check->isEmpty())
        {
            $datas = QuestionBankCategory::findOrFail($id)->delete();
            $request->session()->flash('message', 'Category Deleted successfully.');
            $request->session()->flash('message-type', 'danger');
            return response()->json(['status'=>'Updated']);
        }
        else
        {
            $request->session()->flash('message', 'Category Assined to some Test .');
            $request->session()->flash('message-type', 'danger');
            return response()->json(['status'=>'Updated']);

        }

    }

    public function bankDestroy( Request $request, $id)
    {
        $test_attempt_check = TestReport::where([['test_id',$id],['course_id',1]])->first();

        if (is_null($test_attempt_check)) {
            QuestionBankQuestion::findOrFail($id)->delete();
            $request->session()->flash('message', 'Test Deleted successfully.');
            $request->session()->flash('message-type', 'danger');
            return response()->json(['status'=>'Updated']);
        } else {
            $request->session()->flash('message', 'User Enrolled in this Test.');
            $request->session()->flash('message-type', 'danger');
            return response()->json(['status'=>'Updated']);
    }

    }

    public function questionDestroy(Request $request, $id)
    {

        if(request('question_id') == null || empty($request->question_id)){
            return redirect()->route('edit_question_bank_question',['id' =>$id,'tab' => 3])->with(Session::flash('alert-danger', 'Select atleast one question minimum'));
        }

        $check = $request->question_id;

        foreach ($check as $value)
        {
            AddBankQuestion::where('id', $value)->delete();
        }

        return redirect()->route('edit_question_bank_question',['id' =>$id,'tab' => 3])
            ->with(Session::flash('alert-danger', 'Questions Deleted Successfully '));

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

        $validator = \Validator::make($request->all() , [ 'slug' => 'required|unique:question_bank_questions', 'status' => 'required','name'=> 'required|unique:question_bank_questions' ,

        ], ['subject_id.required' => 'Subject Field is required','category_id.required' => 'Catgeory Field is required', ]);

        if ($validator->fails())
        {
            return response()
                ->json(['errors' => $validator->errors()
                ->all() ]);
        }


        $datas = $request->except('_token');
        $clone = QuestionBankQuestion::find($id)->load('questions');

            $newTest = $clone->replicate();
            $questions = $newTest->questions;
            $newTest->name =$request->name;
            $newTest->status =$request->status;
            $newTest->slug =$request->slug;

            $newTest->save();
            $test_id = $newTest->id ;

            foreach ($questions as $key => $question) {
                    $saveQuestion = new AddBankQuestion;
                    $saveQuestion->bank_id = $test_id;
                    $saveQuestion->question_id = $question->question_id;
                    $saveQuestion->save();
            }

       return redirect()->route('test')
       ->with(Session::flash('alert-success', 'Test Copied Successfully '));


    }




}

