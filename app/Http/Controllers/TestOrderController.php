<?php

namespace App\Http\Controllers;

use App\Events\IasTestMail;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Question;
use App\Models\Admin\AddQuestion;
use App\Models\Admin\Series;
use App\Models\Admin\Batch;
use App\Models\Admin\CourseType;
use App\Models\Admin\PreviousYearSubject;
use App\Models\Admin\QuestionBankSubject;
use App\Models\Admin\Test;
use App\Models\SettingGeneral;
use App\Models\TestReport;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use PDF;
use File;
use Illuminate\Support\Facades\URL;
use Storage;
use function PHPUnit\Framework\isEmpty;
use Mail;

class TestOrderController extends Controller
{

    public function myorder()
    {
        // $analyticsData = Analytics::fetchTopReferrers(Period::months(6));

        $datas = Orders::where('user_id', Auth::user()->id)->with('type', 'batch.series', 'pyqbatch', 'qbbatch')->get();
        return view('website.Users.myorders', compact('datas'));
    }

    public function mytest()
    {
        $datas = TestReport::where([['user_id',Auth::user()->id],['course_id',1]])->with('course:id,name','batch.series:id,name','batch:id,name,series_id','test')->orderBy('id','DESC')->get();
         return view('website.Users.mytest', compact('datas'));
    }


    public function pyqreport()
    {
        $pyq = [];
        $datas = TestReport::where([['user_id',Auth::user()->id],['course_id',3]])->with('course:id,name','pyqbatch','pyqtest.subject')->orderBy('id','DESC')->get();
        return view('website.Users.report', compact('datas','pyq'));

    }


    public function qbreport()
    {

        $qb = [];
        $datas = TestReport::where([['user_id',Auth::user()->id],['course_id',2]])->with('course:id,name','qbbatch','qbtest.category')->orderBy('id','DESC')->get();
        return view('website.Users.report', compact('datas','qb'));

    }

    public function testseries()
    {
        $datas = Series::active()
                        ->with(['batch' => function ($q){
                            $q->active();
                        }])
                        ->with(['batch.test' => function ($q){
                            $q->active();
                        }])
                        ->orderBy('order', 'ASC')->get();
        return view('website.Users.IAS.testseries', compact('datas'));
    }

    public function seriesbatch(Request $request, $slug)
    {

        $datas = Series::where([["slug", $slug],['status',1]])->with('batch','batch.test')
                        ->whereHas('batch.test',function($q){
                            $q->where('status',1);
                        })->get();
        return view('website.Users.IAS.seriesbatch', compact('datas'));
    }

    private static function checkSubscription($test_questions = '')
    {
        if ($test_questions['type'] == 0) {
            return 1;
        } else if ($test_questions['type'] == 1) {
            return  \App\Models\User::checkSubscription($test_questions['batch_id'], 1);
        }
    }

    public function testoverview($series_slug = '', $batch_slug = '', $test_slug = '')
    {

        //Redirect To Batch Page
        if ($series_slug != '' && $batch_slug != '' && $test_slug == '') {

            $series_id  = Series::where('slug',$series_slug)->pluck('id')->first();

            if (Auth::user() == null) {
                $id = Batch::where([['slug', $batch_slug],['series_id',$series_id]])->pluck('id')->first();
                $batch = Batch::where([["id", $id],['status',1]])
                                ->with(['test'=> function($q) { $q->where('status','=',1)->orderBy('order','ASC'); }], 'series')
                               ->first();
                return view('website.Users.IAS.testoverview', compact('batch'));
            }
            $id = Batch::where([['slug', $batch_slug],['series_id',$series_id]])->pluck('id')->first();
             $attempt_count = TestReport::where([['user_id', Auth::user()->id], ['type', 0], ['batch_id', $id]])->count();

            $batch = Batch::where("id", $id)->with(['test'=> function($q) { $q->where('status','=',1)->orderBy('order','ASC'); }], 'test.getTestReports', 'series')->first();
            if ($batch->isClosed == 1) {
                return redirect()->back()->with(Session::flash('alert-danger','Batch Closed'));
            }

            return view('website.Users.IAS.testoverview', compact('batch', 'attempt_count'));
            } elseif ($series_slug != '' && $batch_slug == '' && $test_slug == '') { //Redirect To Series Page
            $data = Series::where([["slug", $series_slug],['status',1]])
                            ->with(['batch' => function($q) {
                                    $q->active();
                            }])
                            ->with(['batch.test' => function($q) {
                                $q->active();
                            }])->first();
            return view('website.Users.IAS.seriesbatch', compact('data'));
        } elseif ($series_slug != '' && $batch_slug != '' && $test_slug != '') { //Redirect To Test Page

            if (Auth::user() == null) {
                return redirect()->back()->with(Session::flash('alert-danger','Login Before Continue'));
            }
            $test_questions = Test::with(['questions.question', 'batch.series'])->where("slug", $test_slug)->first();
            $check_subscription = self::checkSubscription($test_questions);

            if ($check_subscription == 0) {
                return redirect()->route('testoverview', ['series_slug' => $test_questions->batch->series->slug, 'batch_slug' => $test_questions->batch->slug])
                    ->with(Session::flash('alert-danger', 'Please Buy Course to take Test'));
            }

            if (!empty($test_questions)) {
     	        $series_id  = Series::where('slug',$series_slug)->pluck('id')->first();

		$id = Batch::where([['slug', $batch_slug],['series_id',$series_id]])->pluck('id')->first();
		$attempt_count = TestReport::where([['user_id', Auth::user()->id], ['type', 0], ['batch_id', $id], ['course_id', 1]])->count();
                if ($date=(\Carbon\Carbon::createFromFormat('Y-m-d',$test_questions->start_date))->gte( \Carbon\Carbon::now()->format('Y-m-d'))) {
                    return redirect()->back()->with(Session::flash('alert-danger', 'Test Not Unlocked Yet'));

                } else {

                if ($test_questions->questions->isEmpty()) {
                    return redirect()->back()->with(Session::flash('alert-danger', 'This Test has no Questions'));
                } elseif ($test_questions->type == 0 && \App\Models\Orders::where([['batch_id',$test_questions->batch->id],['course_id',1],['user_id',Auth::user()->id]])->exists()   ) {
                    $question_count = $test_questions->questions->count();
                    return view('website.Users.IAS.Test.IAS-testseries', compact('test_questions', 'question_count'));
                }elseif($test_questions->type == 0   && $attempt_count >= 1){

                    return redirect()->back()->with(Session::flash('alert-danger', 'Maximum Attempt Exceeded.Please Enroll in the Course to Access'));
                } else {
                    $question_count = $test_questions->questions->count();
                    return view('website.Users.IAS.Test.IAS-testseries', compact('test_questions', 'question_count'));
                }
            }
            } else {
                return redirect()->back()->with(Session::flash('alert-danger', 'Something Went Wrong'));
            }
        }
    }

    public function paysuccess(Request $request)
    {
        //Update Payment Status
        $data =  [
            'response' => json_encode($request->response),
            'payment_type' => 1,
            'status' => 1,
            'payment_id' => $request->response['razorpay_payment_id'],
        ];
        Orders::where('order_id', $request->order_id)->update($data);

        //Send Response
        $arr = array('msg' => 'Payment successful.', 'status' => true);
        return response()->json($arr);
    }

    public function payfailure(Request $request)
    {
        //Update Payment Status
        $data =  [
            'response' =>  json_encode($request->response),
            'payment_type' => 1,
            'status' => 0,
            'payment_id' => $request->response['metadata']['payment_id'],

        ];
        Orders::where('order_id', $request->order_id)->update($data);
    }

    public function thankyou($encrypted_id)
    {
        $decrypt_id =  Crypt::decryptString($encrypted_id); {
            try {
                $datas = Orders::where([['batch_id', $decrypt_id], ['user_id', Auth::user()->id]])->first();
                return view('website.payment_thankyou', compact('datas'));
            } catch (DecryptException $e) {
                return redirect('/');
            }
        }
    }

    public function reportShow(Request $request, $id)
    {
        $data = TestReport::findOrFail($id);
        $html = view('website.Users.IAS.report', compact('data'))->render();
        return response()->json(['status' => true, 'html' => $html]);
    }

    public function reportShowTestIndex(Request $request, $id)
    {
        $datas = TestReport::where([['test_id',$id],['user_id',Auth::user()->id],['course_id',1]])->orderBy('id','DESC')->get();
        $html = view('website.Users.IAS.report', compact('datas'))->render();
        return response()->json(['status' => true, 'html' => $html]);
    }

    public function testpage(Request $request, $parameter)
    {
        $id = Crypt::decrypt($parameter);

        $test_questions = Test::with('questions.question')->where("id", $id)->with('batch.series')->first();
        $attempt_count = TestReport::where([['user_id', Auth::user()->id], ['type', 0], ['test_id', $id], ['course_id', 1]])->count();

        $status = Test::where('id', $id)->select('type')->pluck('type')->first();

        if ($test_questions->questions->isEmpty()) {
            return redirect()->back()->with(Session::flash('alert-danger', 'This Test Module is under maintanence'));
        } elseif ($status == 0   && $attempt_count == 5) {
            return redirect()->back()->with(Session::flash('alert-danger', 'Maximum Attempt Exceeded.Please Enroll in the Course to Access'));
        } else {
            $question_count = $test_questions->questions->count();
            return view('website.Users.IAS.Test.IAS-testseries', compact('test_questions', 'question_count'));
        }
    }


    public function solutionShow(Request $request, $parameter)
    {
        try {
            $id = Crypt::decrypt($parameter);
            $fullreport = TestReport::findOrFail($id)->first();
            $test_questions =  TestReport::select('question_html')->findOrFail($id)->first();
            $questions_html = (json_decode($test_questions->question_html, true));
            $question_count = count(json_decode($test_questions->question_html, true));
            return view('website.Users.IAS.solution')->with(compact('question_count', 'test_questions', 'questions_html', 'fullreport'));
        } catch (DecryptException $e) {
            return redirect('/');
        }
    }

    public function sessionupdate(Request $request, $id)
    {

        $questionans = request('questionans');
        $review = request('mark_as_review');

        $review_count = 0;
        if (!empty($review)) {
            $review_count = count($review);
        }

        $answered_questions = $correct = $incorrect =  $unattempt = $unanswered_questions =  $positive_mark = 0;
      $batch_id = Test::where('id', $id)->pluck('batch_id')->first();
        $questions_html = array();

        $tests = Test::where("id", $id)->with('questions')->first();
        $negative_mark = (isset($tests->negativemark) && !empty(($tests->negativemark))) ? $tests->negativemark : '0';

        $test_questions =   AddQuestion::where('test_id', $id)->get()->pluck('question_id');
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

        $totalmarks = $positive_mark - (($incorrect) * ($negative_mark));
        $total_negative_mark = $incorrect * $negative_mark;

        //$data['answered_question'] = $answered_questions;
        $data['batch_id'] = $batch_id;
        $data['test_id'] = $id;
        $data['correct'] = $correct;
        $data['incorrect'] = $incorrect;
        $data['unattempt'] = $unanswered_questions;
        $data['review'] = $review_count;
        $data['positive_mark'] = $positive_mark;
        $data['total_marks'] = $question_count * $tests->mark;
        $data['negative_mark'] = number_format((float)$total_negative_mark, 2, '.', '');
        $data['marks_obtained'] = number_format((float)$totalmarks, 2, '.', '');
        $data['user_id'] = Auth::user()->id;
        $data['date'] = date('Y-m-d H:i:s');
        $data['type'] = $request->type;
        $data['course_id'] = $request->course_id;
        $data['question_html'] = json_encode($questions_html, true);

      $test_report_id =  TestReport::create($data)->id;


      $parameter =[
          'id' =>$test_report_id,
      ];
      $parameter= Crypt::encrypt($parameter);

     //For PDF generate

        $course = CourseType::where('id', $request->course_id)->pluck('name')->first();
        $batch = Test::where('id', $id)->with('batch.series')->with('batch:id,name')->first();
        $series = Test::where('id', $id)->with('batch.series')->with('batch:id,series_id', 'series:id,name')->first();
        $solutions = json_decode($data['question_html'], true);
        $logo =SettingGeneral::first();
        //    $pdfdata = [
        // 'title' => 'IAS STUDYHUB',
        // 'date' => date('Y-m-d H:i:s'),
        // 'fname' => Auth::user()->fname,
        // 'lname' => Auth::user()->lname,
        // 'email' => Auth::user()->email,
        // 'test' => $request->test_name,
        // 'batch' => $request->batch_name,
        // 'series' => $request->series_name,
        // 'course' => $course,
        // 'correct' =>$correct,
        // 'incorrect' =>$incorrect,
        // 'unattempt' =>$unanswered_questions,
        // 'total' =>$totalmarks,
        // 'solutions' => $solutions,
        // ];

        // PDF::setOptions(['isPhpEnabled' => true]);
        // $pdf = PDF::loadView('reportPDF', $pdfdata);
        // $pdf->setPaper('L');
        // $pdf->output();
        // $canvas = $pdf->getDomPDF()->getCanvas();
        // $height = $canvas->get_height();
        // $width = $canvas->get_width();
        // $canvas->set_opacity(.1,"Multiply");
        // $canvas->page_text($width/12, $height/1.8, 'IAS STUDYHUB', null,
        //  60, array(0,0,0),2,2,-30);
        // //  page_text(x axis value, y axis value, 'your text, font(or null), font size,rgb color array, word space, char space, angle(- or +));
        // $content = $pdf->download()->getOriginalContent();

        // Storage::put('images/website/user-photos/report.pdf',$content) ;
        $logo =SettingGeneral::first();
        $SITE_URL  = $logo->website;
        $email_data = array(
            'name' => Auth::user()->fname,
            'email' => Auth::user()->email,
            'batch_name' => $batch->batch['name'],
            'series_name' => $series->batch['series']['name'],
            'user_enc_id' => Crypt::encrypt(Auth::user()->id),
            'test_enc_id' => Crypt::encrypt($test_report_id),
            'test_name' => $tests->name ,
            'image_path' => $SITE_URL .'/'.$logo->logo ,
            'date' => date('d-m-Y H:i:s'),
            'url' => $SITE_URL,
            'address' => $logo->address,
        );

        // event(new IasTestMail($email_data));
        // Mail::send('mail.result', $email_data, function ($message) use ($email_data) {
        //     $message->to($email_data['email'], $email_data['name'])
        //         ->subject('IAS Test Report')
        //         ->from(config('app.mail_from_address'));
        // });

        return redirect($request->url)->with(Session::flash('alert-success', 'Test Completed Successfully'));

    }
}
