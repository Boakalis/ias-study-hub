<?php

namespace App\Http\Controllers;

use App\Models\Admin\AddQuizQuestion;
use App\Models\Admin\DailyQuiz;
use App\Models\Admin\QuestionBankQuestion;
use App\Models\Admin\QuestionBankSubject;
use App\Models\Admin\QuizDate;
use App\Models\Question;
use App\Models\TestReport;
use Illuminate\Http\Request;
use Auth;
use Mail;
use Illuminate\Support\Carbon;
use DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class DailyQuizController extends Controller
{
    public function index()
    {
//         return      DailyQuiz::select(DB::raw('count(id) as `data`'), DB::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"),  DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
// ->groupby('year','month')
// ->get();

        $years = DailyQuiz::select(DB::raw('MONTH(date) as month' ),DB::raw("YEAR(date) as year"))
            ->groupBy(['month','year'])
            ->orderBy('year', 'DESC')
            ->active()->get();

        return view('website.daily-quiz.index')->with(compact('years'));
    }

    public function getDailyQuizMonth($year = '')
    {

        if (!preg_match("/^[0-9]+$/i", $year)) {
            return redirect()->route('dailyQuizIndex')->with('danger', 'Something Went Wrong');
        }

        if ($year != '') {
            $months =   DailyQUiz::select(DB::raw("MONTHNAME(date) as monthname"), DB::raw("MONTH(date) as month"), DB::raw("(COUNT(*)) as test"))
                ->whereYear('date', $year)
                ->groupBy(['monthname', 'month'])
                ->orderBy('month', 'DESC')
                ->get();
            return view('website.daily-quiz.month')->with(compact('year', 'months'));
        } else {
            return redirect()->route('dailyQuizIndex')->with('danger', 'Something Went Wrong');
        }
    }

    public function getDailyQuizList($year = '', $month = '')
    {
        if (!preg_match("/^[0-9]+$/i", $year)) {
            return redirect()->route('dailyQuizIndex')->with('danger', 'Something Went Wrong');
        }

        if (!preg_match("/^[0-9]+$/i", $month)) {
            return redirect()->route('dailyQuizIndex')->with('danger', 'Something Went Wrong');
        }

        if ($year != '' && $month != '') {
              $quizs =   DailyQUiz::whereYear('date', $year)->whereMonth('date', $month)
                ->where('status',1)->orderBy('id', 'DESC')
                ->has('questions')->get();
            return view('website.daily-quiz.list')->with(compact('year', 'month', 'quizs'));
        } else {
            return redirect()->route('dailyQuizIndex')->with('danger', 'Something Went Wrong');
        }
    }

    public function testindex(Request $request, $yearMonth)
    {
        $datas = DailyQuiz::where('date', $yearMonth)->get();
        $html = view('website.daily-quiz.test-index', compact('datas'))->render();
        return response()
            ->json(['status' => true, 'html' => $html]);
    }

    public function testpage($id)
    {

        try {

            $decrypt_id =  Crypt::decryptString($id);
            $test_check = TestReport::where([['user_id', Auth::user()->id], ['test_id', $decrypt_id], ['course_id', 4]])->first();
            $test = DailyQuiz::where('id', $decrypt_id)->with(['questions', 'questions.question'])->first();
            return view('website.daily-quiz.test-page', compact('test_check', 'test'));
        } catch (DecryptException $e) {
            return redirect('/');
        }
    }

    public function resultUpdate(Request $request, $id)
    {
        $questionans = request('questionans');

        $answered_questions = $correct = $incorrect = $unanswered_questions =  $positive_mark = 0;

        $questions_html = array();

        $tests = DailyQuiz::where("id", $id)->with('questions')->first();
        $test_questions =   AddQuizQuestion::where('test_id', $id)->get()->pluck('question_id');
        $question_count = count($test_questions);

        foreach ($test_questions as $key => $test_question) {

            $check_answer = Question::find($test_question);
            $questions_html[$key]['question'] = $check_answer->question;
            $questions_html[$key]['option_1'] = $check_answer->option_1;
            $questions_html[$key]['option_2'] = $check_answer->option_2;
            $questions_html[$key]['option_3'] = $check_answer->option_3;
            $questions_html[$key]['option_4'] = $check_answer->option_4;
            $questions_html[$key]['answers'] = $check_answer->answers;
            $questions_html[$key]['explanation'] = $check_answer->explanation;

            if (!empty($questionans) && count($questionans) > 0) {
                if (in_array($test_question, array_keys($questionans))) {
                    if ($check_answer->answers == $questionans[$test_question]) {
                        ++$correct;
                        $positive_mark += 1;
                        $questions_html[$key]['user_answer'] = $questionans[$test_question];
                    } else {
                        ++$incorrect;
                        $questions_html[$key]['user_answer'] = $questionans[$test_question];
                    }
                    ++$answered_questions;
                } else {
                    $questions_html[$key]['user_answer'] = 0;
                    ++$unanswered_questions;
                }
            } else {
                $questions_html[$key]['user_answer'] = 0;
                ++$unanswered_questions;
            }
        }

        $totalmarks = $positive_mark;

        //$data['answered_question'] = $answered_questions;
        $data['test_id'] = $id;
        $data['correct'] = $correct;
        $data['incorrect'] = $incorrect;
        $data['unattempt'] = $unanswered_questions;
        $data['positive_mark'] = $positive_mark;
        $data['total_marks'] = $question_count;
        $data['marks_obtained'] = number_format((float)$totalmarks, 2, '.', '');
        $data['user_id'] = Auth::user()->id;
        $data['date'] = date('Y-m-d H:i:s');
        $data['course_id'] = $request->course_id;
        $data['type'] = 0;
        $data['question_html'] = json_encode($questions_html, true);

        TestReport::create($data);

        $email_data = array(
            'name' => Auth::user()->fname,
            'email' => Auth::user()->email,
            'date' => $tests->date,
            'quiz_name' => $tests->name,
            'attended_date' => date('d-m-Y H:i:s'),
        );

        // Mail::send('mail.quiz-result', $email_data, function ($message) use ($email_data) {
        //     $message->to($email_data['email'], $email_data['name'])
        //         ->subject('Test Report')
        //         ->from('leaderias@admin.com');
        // });
        $questions_html = (json_decode($data['question_html'], true));

        $html = view('website.daily-quiz.result-page', compact('questions_html', 'tests'))->render();
        return response()
            ->json(['status' => true, 'html' => $html]);
    }

    public function showSolutions($id)
    {
        try {

            $decrypt_id =  Crypt::decryptString($id);
            $test_check = TestReport::where([['user_id', Auth::user()->id], ['test_id', $decrypt_id], ['course_id', 4]])->first();
            $tests = DailyQuiz::where('id', $decrypt_id)->with(['questions', 'questions.question'])->first();
            return view('website.daily-quiz.test-page', compact('test_check', 'tests'));
        } catch (DecryptException $e) {
            return redirect('/');
        }
    }
}
