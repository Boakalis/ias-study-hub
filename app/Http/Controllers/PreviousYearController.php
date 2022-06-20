<?php

namespace App\Http\Controllers;

use App\Models\Admin\AddPreviousQuestion;
use App\Models\Admin\PreviousYearCategory;
use App\Models\Admin\PreviousYearSubject;
use App\Models\Admin\PreviousYearTest;
use App\Models\Orders;
use App\Models\Question;
use App\Models\TestReport;
use Illuminate\Http\Request;
use Razorpay\Api\Order;
use Auth;
use Session;
use Illuminate\Support\Facades\Crypt;
use Mail;
use App\Models\Notice;
use App\Models\SettingGeneral;
use Illuminate\Notifications\Notifiable;
use App\Notifications\Telegram;
use Illuminate\Support\Facades\Config;
use Illuminate\Contracts\Encryption\DecryptException;
use Carbon\Carbon;



class PreviousYearController extends Controller
{
    public function index()
    {
        $datas = PreviousYearSubject::active()->get();
        return view('website.previous-year-question.index')->with(compact('datas'));
    }


    public function testIndex($category = '', $sub_category = '', $test_slug = '')
    {

        if ($category != '' && $sub_category == '' && $test_slug == '') {
            $id = PreviousYearSubject::where('slug', $category)->pluck('id')->first();

            if (Auth::user() == null) {
                $totalamount = PreviousYearSubject::where('status',1)->get();
                $sumofamount = $totalamount->sum('price');
                $subject = PreviousYearSubject::where('slug', $category)->first();
                $datas = PreviousYearCategory::where('subject_id', $subject->id)->active()->get();
                $subscribe_check = 0;
                $remaining_date = 0;
                return view('website.previous-year-question.category-index')->with(compact('datas', 'subject', 'sumofamount', 'subscribe_check', 'remaining_date'));
            }

            if (Orders::where([['batch_id', $id], ['course_id', '3'], ['user_id', Auth::user()->id]])->first()) {
                $check_order_exists = Orders::where([['batch_id', $id], ['course_id', '3'], ['user_id', Auth::user()->id]])->get();
            } else {
                $check_order_exists = Orders::where([['batch_id', 'PREMIUM'], ['course_id', '3'], ['user_id', Auth::user()->id]])->get();
            }
            $remaining_date = '-1';

            if (sizeof($check_order_exists) > 0) {

                foreach ($check_order_exists as $key => $value) {
                    if (Carbon::parse($value->date)->diffInDays(Carbon::now()) >= 365) {
                        $expiry_check[] = '0';
                    } else {
                        $expiry_check[] = '1';
                        $remaining_date = Carbon::parse($value->date)->diffInDays(Carbon::now());
                    }
                }
                $subscribe_value = '1';
                if (in_array($subscribe_value, $expiry_check)) {
                    $subscribe_check = 1;
                } else {
                    $subscribe_check = 0;
                }
            } else {
                $subscribe_check = 0;
            }

            $totalamount = PreviousYearSubject::where('status',1)->get();
            $sumofamount = $totalamount->sum('price');

            $subject = PreviousYearSubject::where('slug', $category)->first();
            $datas = PreviousYearCategory::where('subject_id', $subject->id)->active()->get();
            return view('website.previous-year-question.category-index')->with(compact('datas', 'subject', 'sumofamount', 'subscribe_check', 'remaining_date'));
        } elseif ($category != '' && $sub_category != '' && $test_slug == '') {

            $id = PreviousYearSubject::where('slug', $category)->pluck('id')->first();

            if (Auth::user() == null) {
                $subject = PreviousYearCategory::where('slug', $sub_category)->with('subject')->first();
                $datas = PreviousYearTest::with('getTestReports')->where('subject_id', $subject->subject_id)->active()->orderBy('order','ASC')->get();
                $totalamount = PreviousYearSubject::where('status',1)->get();
                $sumofamount = $totalamount->sum('price');
                $subscribe_check = 0;
                $remaining_date = 0;
                return view('website.previous-year-question.test-index')->with(compact('datas', 'subject', 'subscribe_check', 'remaining_date', 'sumofamount','totalamount'));
            }

            if (Orders::where([['batch_id', $id], ['course_id', '3'], ['user_id', Auth::user()->id]])->first()) {
                $check_order_exists = Orders::where([['batch_id', $id], ['course_id', '3'], ['user_id', Auth::user()->id]])->get();
            } else {
                $check_order_exists = Orders::where([['batch_id', 'PREMIUM'], ['course_id', '3'], ['user_id', Auth::user()->id]])->get();
            }

            $remaining_date = '-1';

            if (sizeof($check_order_exists) > 0) {

                foreach ($check_order_exists as $key => $value) {
                    if (Carbon::parse($value->date)->diffInDays(Carbon::now()) >= 365) {
                        $expiry_check[] = '0';
                    } else {
                        $expiry_check[] = '1';
                        $remaining_date = Carbon::parse($value->date)->diffInDays(Carbon::now());
                    }
                }
                $subscribe_value = '1';
                if (in_array($subscribe_value, $expiry_check)) {
                    $subscribe_check = 1;
                } else {
                    $subscribe_check = 0;
                }
            } else {
                $subscribe_check = 0;
            }

            $subject = PreviousYearCategory::where('slug', $sub_category)->with('subject')->first();
            $datas = PreviousYearTest::with('getTestReports')->where('subject_id', $subject->subject_id)->active()->orderBy('order','ASC')->get();
            $totalamount = PreviousYearSubject::where('status',1)->get();
            $sumofamount = $totalamount->sum('price');
            return view('website.previous-year-question.test-index')->with(compact('datas', 'subject', 'subscribe_check', 'remaining_date', 'sumofamount'));
        } elseif ($category != '' && $sub_category != '' && $test_slug != '') {

            $id = PreviousYearCategory::where('slug', $category)->pluck('id')->first();

            if (Auth::user() == null) {
                return redirect()->back()->with(Session::flash('alert-danger','Login Before Continue'));
            }

            if (Orders::where([['batch_id', $id], ['course_id', '3'], ['user_id', Auth::user()->id]])->first()) {
                $check_order_exists = Orders::where([['batch_id', $id], ['course_id', '3'], ['user_id', Auth::user()->id]])->get();
            } else {
                $check_order_exists = Orders::where([['batch_id', 'PREMIUM'], ['course_id', '3'], ['user_id', Auth::user()->id]])->get();
            }

            $remaining_date = '-1';

            if (sizeof($check_order_exists) > 0) {

                foreach ($check_order_exists as $key => $value) {
                    if (Carbon::parse($value->date)->diffInDays(Carbon::now()) >= 365) {
                        $expiry_check[] = '0';
                    } else {
                        $expiry_check[] = '1';
                        $remaining_date = Carbon::parse($value->date)->diffInDays(Carbon::now());
                    }
                }
                $subscribe_value = '1';
                if (in_array($subscribe_value, $expiry_check)) {
                    $subscribe_check = 1;
                } else {
                    $subscribe_check = 0;
                }
            } else {
                $subscribe_check = 0;
            }

            $test_questions = PreviousYearTest::with('questions.question')->where("slug", $test_slug)->with('subject', 'category')->first();
            $question_count = $test_questions->questions->count();

            if ($question_count == 0) {
                return redirect()->back()->with(Session::flash('alert-danger', 'This Test has No Questions'));
            }
            return view('website.previous-year-question.testpage')->with(compact('test_questions', 'question_count', 'remaining_date'));
        } else {
            return redirect()->route('previousYearIndex');
        }
    }

    public function testpage($encrypted_id)
    {

        $id = Crypt::decrypt($encrypted_id);

        $test_questions = PreviousYearTest::with('questions.question')->where("id", $id)->with('subject', 'category')->first();
        $attempt_count = TestReport::where([['user_id', Auth::user()->id], ['type', 0], ['test_id', $id], ['course_id', 2]])->count();
        $status = PreviousYearTest::where('id', $id)->select('type')->pluck('type')->first();

        if ($test_questions->questions->isEmpty()) {
            return redirect()->back()->with(Session::flash('alert-danger', 'This Test Module is under maintanence'));
        } elseif ($status == 0   && $attempt_count == 5000) {
            return redirect()->back()->with(Session::flash('alert-danger', 'Maximum Attempt Exceeded.Please Buy Course to Access'));
        } else {
            $question_count = $test_questions->questions->count();
            return view('website.previous-year-question.testpage')->with(compact('test_questions', 'question_count'));
        }
    }

    public function resultUpdate(Request $request, $id)
    {
        $review = request('mark_as_review');
        if (!empty($review)) {
            $review = count($review);
        } else {
            $review = 0;
        }
        $questionans = request('questionans');
        $answered_questions = $correct = $incorrect =  $unattempt = $unanswered_questions =  $positive_mark = 0;
        $negative_mark = 0.6;
        $questions_html = array();
        $batch_id = PreviousYearTest::where('id', $id)->pluck('subject_id')->first();
        $batch_name = PreviousYearSubject::where('id', $batch_id)->pluck('name')->first();
        $tests = PreviousYearTest::where("id", $id)->with('questions')->first();
        $test_questions =   AddPreviousQuestion::where('test_id', $id)->get()->pluck('question_id');
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
                        $positive_mark += 2;
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
        $SITE_URL  = env('APP_URL');
        $logo =SettingGeneral::first();

        $totalmarks = $positive_mark - (($incorrect) * ($negative_mark));
        $total_negative_mark = $incorrect * $negative_mark;

        //For Question Bank And PYQ Only
        $correct = $request->correct;
        $incorrect = $request->incorrect;

        //$data['answered_question'] = $answered_questions;
        $data['batch_id'] = $batch_id;
        $data['test_id'] = $id;
        $data['correct'] = $correct;
        $data['incorrect'] = $incorrect;
        $data['unattempt'] = $unanswered_questions;
        $data['review'] = $review;
        $data['positive_mark'] = $positive_mark;
        $data['total_marks'] = $question_count;
        $data['negative_mark'] = number_format((float)$total_negative_mark, 2, '.', '');
        $data['marks_obtained'] = number_format((float)$totalmarks, 2, '.', '');
        $data['user_id'] = Auth::user()->id;
        $data['date'] = date('Y-m-d H:i:s');
        $data['type'] = $request->type;
        $data['course_id'] = $request->course_id;
        $data['question_html'] = json_encode($questions_html, true);
        TestReport::create($data);

        $email_data = array(
            'name' => Auth::user()->fname,
            'email' => Auth::user()->email,
            'image_path' => $SITE_URL .'/'.$logo->logo ,
            'test_name' => $tests->name ,
            'url' => $SITE_URL,

            'batch_name' => $batch_name,
            'series_name' => $request->series_name,
            'date' => date('d-m-Y H:i:s'),
        );

        // Mail::send('mail.result', $email_data, function ($message) use ($email_data) {
        //     $message->to($email_data['email'], $email_data['name'])
        //         ->subject('Test Report')
        //         ->from(env('MAIL_FROM_ADDRESS'));
        // });

        // $notice = New Notice([
        //     'notice' => 'New Message',
        //     'description' => 'Description',
        //     'urllink' => 'https://google.com',
        //     'telegram_id' => -1001282935282,

        // ]);

        // $notice->save();
        // $notice -> notify(new Telegram());

        // return Auth::id();
        return redirect()->route('pyqreport')->with(Session::flash('alert-success', 'Test Report Generated Successfully'));
    }

    public function previousYearTestSolutionShow($encrypted_id)
    {
        try {

            $id = Crypt::decrypt($encrypted_id);
            $fullreport = TestReport::where('id', $id)->first();
            $questions_html = (json_decode($fullreport->question_html, true));

            return view('website.previous-year-question.solution')->with(compact('questions_html', 'fullreport'));
        } catch (DecryptException $e) {
            return redirect('/');
        }
    }

    public function courses()
    {
        $purchased_course = Orders::where([['user_id',Auth::user()->id],['course_id',3]])->get('batch_id');
        $datas = PreviousYearSubject::whereNotIn('id',$purchased_course)->where('price','!=',0)->active()->get();
        $html = view('website.previous-year-question.course-list', compact('datas'))->render();
        return response()
            ->json(['status' => true, 'html' => $html]);

    }



}
