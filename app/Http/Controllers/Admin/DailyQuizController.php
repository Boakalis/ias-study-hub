<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\DailyQuiz;
use Illuminate\Http\Request;
use Session;
use App\Models\Admin\Subject;
use App\Models\Admin\AddQuizQuestion;
use App\Models\Admin\QuizDate;
use App\Models\Question;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Validation\Rule;


class DailyQuizController extends Controller
{



    public function dailyQuiz()
    {

        $datas = DailyQuiz::orderBy('order','ASC')->paginate(100);
        return view('admin.dailyquiz.index')->with(compact('datas'));
    }

    public function createQuiz()
    {
        return view('admin.dailyquiz.create');
    }





    public function storeQuiz(Request $request)
    {

        if (request('slug') != null)
        {
            $request['slug'] = str_slug(request('slug') , '-');
        }
        else
        {
            $request['slug'] = str_slug(request('name') , '-');
        }

        $validator = \Validator::make($request->all() , ['date' => 'required|unique:daily_quizzes', 'status' => 'required','mark' => 'required|numeric','duration' => 'required|numeric','name' => 'required|unique:daily_quizzes','slug' => 'required|unique:daily_quizzes', 'time' => 'required',

        ]);

        if ($validator->fails())
        {
            return response()
                ->json(['errors' => $validator->errors()
                ->all() ]);
        }

        $datas = $request->except('_token');
        $datas['time'] = date("H:i:s", strtotime(request('time')));
        $datas['date'] = Carbon::parse(request('date'))->format('Y-m-d H:i:s');

        DailyQuiz::create($datas);

        $request->session()->flash('message', 'Test added successfully.');
        $request->session()->flash('message-type', 'success');
        return response()->json(['status'=>'Added']);

    }



    public function editQuiz(Request $request, $id)
    {
        $datas = DailyQuiz::findOrFail($id);
        $subjects = Subject::get();


        $question = Question::select('id', 'question', 'answers', 'level', 'subject_id')->with('subject')
            ->active()
            ->get();
        $show = AddQuizQuestion::where('test_id', $id)->with('question.subject')
            ->get();

        $getQ = AddQuizQuestion::where('test_id', $id)->get()
            ->pluck('question_id');

        if (isset($getQ) && !empty($getQ))
        {
            $q = Question::whereNotIn('id', $getQ)->paginate(100);
        }
        else
        {
            $q = Question::paginate(100);
        }

        return view('admin.dailyquiz.edit')->with(compact('datas', 'subjects', 'q', 'show', 'question'));
    }

    public function updateQuiz(Request $request, $id)
    {
        if (request('slug') != null)
        {
            $request['slug'] = str_slug(request('slug') , '-');
        }
        else
        {
            $request['slug'] = str_slug(request('name') , '-');
        }

        $validator = \Validator::make($request->all() , ['date' => 'required', 'status' => 'required','mark' => 'required|numeric','duration' => 'required|numeric',
        'name' => [ 'required',Rule::unique('daily_quizzes','name')->ignore($id)],
        'slug' => [ 'required',Rule::unique('daily_quizzes','slug')->ignore($id)],
   'time' => 'required',

        ]);

        if ($validator->fails())
        {
            return response()
                ->json(['errors' => $validator->errors()
                ->all() ]);
        }


        $updatequiz = $request->except('_token');
        $updatequiz['time'] = date("H:i:s", strtotime(request('time')));
        $updatequiz['date'] = Carbon::parse(request('date'))->format('Y-m-d H:i:s');

        $datas = DailyQuiz::findOrFail($id);

        DailyQuiz::where('id', $id)->update($updatequiz);

        return redirect()->route('edit_daily_quiz',['id' =>$id,'tab' => 1])
        ->with(Session::flash('alert-success', 'Quiz Updated Successfully '));
    }

    public function search(Request $request, $id)
    {
        $datas = DailyQuiz::findOrFail($id);
        $subjects = Subject::get();
        $question = Question::select('id', 'question', 'answers', 'level', 'subject_id')->with('subject')
            ->active()
            ->get();
        $show = AddQuizQuestion::where('test_id', $id)->with('question.subject')
            ->get();
        $getQ = AddQuizQuestion::where('test_id', $id)->get()
            ->pluck('question_id');
        $subject = $request->subject_id;
        $level = $request->level;

        if (isset($getQ) && !empty($getQ))
        {
            $q = Question::whereNotIn('id', $getQ)->select('id', 'question', 'answers', 'level', 'subject_id')
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
            $q = Question::paginate(100);
        }

        $tab = 2;


        return view('admin.dailyquiz.edit')->with(compact('datas', 'subjects', 'q', 'show', 'question','tab','subject','level'));

    }

    public function updateTestQuiz(Request $request, $id)
    {

        foreach ($request->input("question_id") as $question_id)
        {
            $add = new AddQuizQuestion;

            $add->test_id = $request->test_id;
            $add->question_id = $question_id;

            $add->save();
        }
        return redirect()->route('edit_daily_quiz',['id' =>$id,'tab' => 2])
        ->with(Session::flash('alert-success', 'Quiz Updated Successfully '));
    }

    public function deleteTestQuiz(Request $request, $id)
    {
           $checked = $request->question_id;

        foreach ($checked as $value)
        {
            AddQuizQuestion::where('id', $value)->delete();
        }

        return redirect()->route('edit_daily_quiz',['id' =>$id,'tab' => 3])
        ->with(Session::flash('alert-success', 'Quiz Updated Successfully '));
    }

    public function deleteQuiz($id)
    {
        DailyQuiz::where('id', $id)->delete();
        return redirect()
            ->route('daily_quiz')
            ->with(Session::flash('alert-danger', 'Quiz Deleted Successfully '));

    }

    public function orderchange(Request $request)
    {
        $test = DailyQuiz::all();
        foreach ($test as $data) {
            foreach ($request->order as $order) {
                if ($order['id'] == $data->id) {
                    $data->update(['order' => $order['position']]);
                }
            }
        }
        return response(['status' => 200]);
    }



}

