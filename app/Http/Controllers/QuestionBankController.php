<?php

namespace App\Http\Controllers;

use App\Models\Admin\AddBankQuestion;
use App\Models\Admin\CourseType;
use App\Models\Admin\QuestionBankCategory;
use App\Models\Admin\QuestionBankQuestion;
use App\Models\Admin\QuestionBankSubject;
use App\Models\Orders;
use App\Models\Payment;
use App\Models\Question;
use App\Models\SettingGeneral;
use App\Models\TestReport;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Session;
use Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class QuestionBankController extends Controller
{
	public function index($slug)
	{
		$id = QuestionBankSubject::where('slug', $slug)->pluck('id')->first();
		if (Orders::where([['batch_id', $id], ['course_id', '2'], ['user_id', Auth::user()->id]])->exits()) {
			$check_order_exists = Orders::where([['batch_id', $id], ['course_id', '2'], ['user_id', Auth::user()->id]])->get();
		} else {
			$check_order_exists = Orders::where([['batch_id', 'PREMIUM'], ['course_id', '2'], ['user_id', Auth::user()->id]])->get();
		}

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


		$batch_id = QuestionBankQuestion::where('subject_id', $id)->active()->pluck('subject_id')->get();
		$subjectimage = QuestionBankSubject::where('id', $id)->active()->pluck('image')->first();
		$subject = QuestionBankSubject::where('id', $id)->active()->first();
		$totalamount = QuestionBankSubject::where('status',1)->get();
		$sumofamount = $totalamount->sum('price');
		$category = QuestionBankCategory::where('subject_id', $id)->with('subject')->active()->get();
		return view('website.question-bank.index')->with(compact('category', 'subscribe_check', 'subject', 'subjectimage', 'sumofamount'));
	}

    public function bankIndex()
    {
        $datas = QuestionBankSubject::where('status',1)->get();
        return view('website.question-bank.main-index')->with(compact('datas'));
    }

	public function testindex($slug)
	{
		$id = QuestionBankCategory::where('slug', $slug)->pluck('id')->first();
		$subjectid = QuestionBankCategory::where('id', $id)->active()->pluck('subject_id')->first();

		if (Orders::where([['batch_id', $subjectid], ['course_id', '2'], ['user_id', Auth::user()->id]])->get()) {
			$check_order_exists = Orders::where([['batch_id', $subjectid], ['course_id', '2'], ['user_id', Auth::user()->id]])->get();
		} else {
			$check_order_exists = Orders::where([['batch_id', 'PREMIUM'], ['course_id', '2'], ['user_id', Auth::user()->id]])->get();
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

		$attempt_count = TestReport::where([['user_id', Auth::user()->id], ['type', 0], ['batch_id', $subjectid], ['course_id', 2]])->count();
		$subject = QuestionBankSubject::where('id', $subjectid)->active()->first();
		$categoryimage = QuestionBankSubject::where('id', $subjectid)->active()->pluck('image')->first();
		$tests = QuestionBankQuestion::where('category_id', $id)->active()->orderBy('order','ASC')->get();
		return view('website.question-bank.test-index')->with(compact('categoryimage', 'tests', 'subject', 'subscribe_check', 'attempt_count', 'remaining_date'));
	}

	public function getQuestionBankPages($category = '', $sub_category = '', $test_slug = '')
	{
		if ($category != '' && $sub_category == '' && $test_slug == '') { //Redirect To Category Page
			$id = QuestionBankSubject::where('slug', $category)->pluck('id')->first();

			if (Auth::user() == null) {
				$subject = QuestionBankSubject::where('id', $id)->active()->first();
				$category = QuestionBankCategory::where('subject_id', $id)->with('subject')->active()->get();
                $totalamount = QuestionBankSubject::where('status',1)->get();
				$sumofamount = $totalamount->sum('price');
				$subscribe_check = 0;
				return view('website.question-bank.index')->with(compact('category', 'subscribe_check', 'subject', 'sumofamount'));
			}

			if (Orders::where([['batch_id', $id], ['course_id', '2'], ['user_id', Auth::user()->id]])->first()) {
				$check_order_exists = Orders::where([['batch_id', $id], ['course_id', '2'], ['user_id', Auth::user()->id]])->get();
			} else {
				$check_order_exists = Orders::where([['batch_id', 'PREMIUM'], ['course_id', '2'], ['user_id', Auth::user()->id]])->get();
			}
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
            $batch_id = QuestionBankQuestion::where('subject_id', $id)->active()->pluck('subject_id')->first();

			$subject = QuestionBankSubject::where('id', $id)->active()->first();
			$category = QuestionBankCategory::where('subject_id', $id)->with('subject')->active()->get();
            $totalamount = QuestionBankSubject::where('status',1)->get();
			$sumofamount = $totalamount->sum('price');
			return view('website.question-bank.index')->with(compact('category', 'subscribe_check', 'subject', 'sumofamount'));
		} elseif ($category != '' && $sub_category != '' && $test_slug == '') { //Redirect To Sub Category Page
			$id = QuestionBankCategory::where('slug', $sub_category)->pluck('id')->first();
			$subjectid = QuestionBankCategory::where('id', $id)->active()->pluck('subject_id')->first();

			if (Auth::user() == null) {
				$attempt_count = 0;
				$subscribe_check = 0;
				$remaining_date = 0;
				$subject = QuestionBankSubject::where('id', $subjectid)->active()->first();
				$categoryimage = QuestionBankSubject::where('id', $subjectid)->active()->pluck('image')->first();
				$tests = QuestionBankQuestion::where('category_id', $id)->active()->orderBy('order','ASC')->get();
                $totalamount = QuestionBankSubject::where('status',1)->get();
				$sumofamount = $totalamount->sum('price');
				return view('website.question-bank.test-index', compact('categoryimage', 'tests', 'subject', 'subscribe_check', 'attempt_count', 'remaining_date', 'sumofamount'));
			}



			if (Orders::where([['batch_id', $subjectid], ['course_id', '2'], ['user_id', Auth::user()->id]])->first()) {
				$check_order_exists = Orders::where([['batch_id', $subjectid], ['course_id', '2'], ['user_id', Auth::user()->id]])->get();
			} else {
				$check_order_exists = Orders::where([['batch_id', 'PREMIUM'], ['course_id', '2'], ['user_id', Auth::user()->id]])->get();
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
            $attempt_count = TestReport::where([['user_id', Auth::user()->id], ['type', 0], ['batch_id', $subjectid], ['course_id', 2]])->count();
			$subject = QuestionBankSubject::where('id', $subjectid)->active()->first();
			$categoryimage = QuestionBankSubject::where('id', $subjectid)->active()->pluck('image')->first();
			$tests = QuestionBankQuestion::where('category_id', $id)->active()->orderBy('order','ASC')->get();
            $totalamount = QuestionBankSubject::where('status',1)->get();
			$sumofamount = $totalamount->sum('price');
            $courseLists = QuestionBankSubject::active()->get();
            return view('website.question-bank.test-index')->with(compact('categoryimage','courseLists', 'tests', 'subject', 'subscribe_check', 'attempt_count', 'remaining_date', 'sumofamount'));
		} elseif ($category != '' && $sub_category != '' && $test_slug != '') { //Redirect To Test Page


			$test_questions = QuestionBankQuestion::with('questions.question')->where("slug", $test_slug)->with('subject', 'category')->first();
            if (Auth::user() == null) {
                return redirect()->back()->with(Session::flash('alert-danger','Login Before Continue'));
            }
			if (!empty($test_questions)) {
				$attempt_count = TestReport::where([['user_id', Auth::user()->id], ['type', 0], ['test_id', $test_questions->id], ['course_id', 2]])->count();

				$status = QuestionBankQuestion::where('id', $test_questions->id)->select('type')->pluck('type')->first();

				if ($test_questions->questions->isEmpty()) {
					return redirect()->back()->with(Session::flash('alert-danger', 'This Test Module has No Questions'));
				} elseif ($status == 0   && $attempt_count == 5000) {
					return redirect()->back()->with(Session::flash('alert-danger', 'Maximum Attempt Exceeded.Please Buy Course to Access'));
				} else {
					$question_count = $test_questions->questions->count();
					return view('website.question-bank.testpage')->with(compact('test_questions', 'question_count'));
				}
			} else {
				return redirect('/');
			}
		} else {
			return redirect('/');
		}
	}

    public function courses()
    {
        $purchased_course = Orders::where([['user_id',Auth::user()->id],['course_id',2]])->get('batch_id');
        $datas = QuestionBankSubject::whereNotIn('id',$purchased_course)->active()->get();
        $html = view('website.question-bank.course-list', compact('datas'))->render();
        return response()
            ->json(['status' => true, 'html' => $html]);

    }

	public function testpage($encrypted_id)
	{
		$id = Crypt::decrypt($encrypted_id);

		$test_questions = QuestionBankQuestion::with('questions.question')->where("id", $id)->with('subject', 'category')->first();
		$attempt_count = TestReport::where([['user_id', Auth::user()->id], ['type', 0], ['test_id', $id], ['course_id', 2]])->count();
		$status = QuestionBankQuestion::where('id', $id)->select('type')->pluck('type')->first();

		if ($test_questions->questions->isEmpty()) {
			return redirect()->back()->with(Session::flash('alert-danger', 'This Test Module is under maintanence'));
		} elseif ($status == 0   && $attempt_count == 5000) {
			return redirect()->back()->with(Session::flash('alert-danger', 'Maximum Attempt Exceeded.Please Buy Course to Access'));
		} else {
			$question_count = $test_questions->questions->count();
			return view('website.question-bank.testpage')->with(compact('test_questions', 'question_count'));
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
		$batch_id = QuestionBankQuestion::where('id', $id)->pluck('subject_id')->first();
		$tests = QuestionBankQuestion::where("id", $id)->with('questions')->first();
		$test_questions =   AddBankQuestion::where('bank_id', $id)->get()->pluck('question_id');
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

		$course = CourseType::where('id', $request->course_id)->pluck('name')->first();


		TestReport::create($data);


		$email_data = array(
			'name' => Auth::user()->fname,
			'email' => Auth::user()->email,
			'batch_name' => $request->batch_name,
            'image_path' => $SITE_URL .'/'.$logo->logo ,
            'test_name' => $tests->name ,
            'url' => $SITE_URL,

			'series_name' => $request->series_name,
			'date' => date('d-m-Y H:i:s'),
		);

		Mail::send('mail.result', $email_data, function ($message) use ($email_data) {
			$message->to($email_data['email'], $email_data['name'])
				->subject('Test Report')
				->from(config('app.mail_from_address'));
		});

		return redirect()->route('qbreport')->with(Session::flash('alert-success', 'Test Report Generated Successfully'));
	}

	public function questionBankTestSolutionShow($encrypted_id)
	{
		try {

			$id = Crypt::decrypt($encrypted_id);
			$fullreport = TestReport::where('id', $id)->first();
			$questions_html = (json_decode($fullreport->question_html, true));
			return view('website.question-bank.solution')->with(compact('questions_html', 'fullreport'));
		} catch (DecryptException $e) {
			return redirect('/');
		}
	}
}
