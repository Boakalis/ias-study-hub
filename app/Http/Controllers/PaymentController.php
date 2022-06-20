<?php

namespace App\Http\Controllers;

use App\Events\IasPaymentMail;
use App\Events\PyqPaymentMail;
use App\Events\QbPaymentMail;
use App\Models\Admin\Batch;
use App\Models\Admin\PreviousYearSubject;
use App\Models\Admin\QuestionBankSubject;
use App\Models\Admin\Series;
use App\Models\OrderAnalyticsReport;
use App\Models\Orders;
use App\Models\Payment;
use App\Models\SettingGeneral;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Auth;
use Mail;

use function GuzzleHttp\json_decode;

class PaymentController extends Controller
{


    public function newPaymentCreateOrder(Request $request)
    {
        try {
            $batch_id = json_encode($request->batch_id,true);
            foreach ($request->batch_id as  $value) {
                 $ids[] = Crypt::decrypt($value);
            }


        } catch (DecryptException $e) {
            return response()->json(['status' => 666, 'error' => 'Value Mismatched']);

        }
        $order_id = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 2) . date('y') . date('m') . '00' . substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 2);
        // Note:  status:1=success,0=fail,payment_type:1=razorpay,0=cash
        // $id = json_encode($ids,true);
        // $payment_data =  [
        //     'payment_id' => $request->payment_id,///
        //     'order_id' => $order_id,
        //     'amount' => $request->totalAmount,
        //     'date' => date('Y-m-d'),
        //     'payment_type' => 1,
        //     'user_id' => Auth::id(),
        //     'batch_id' => $id,
        //     'status' => 0,
        //     'course_id' => $request->course_id,
        // ];
        // foreach ($ids as $key => $id) {
            $payment_data =  [
                'amount' => $request->totalAmount,
                'order_id' => $order_id,

                'date' => date('Y-m-d'),
                'payment_type' => 1,
                'status' => 1,
                'user_id' => Auth::id(),
                'course_id' => $request->course_id, //1-IAS 2-QB 3-PYQ
            ];

            // $analytics_data =  [
            //     'amount' => $request->totalAmount,
            //     'order_id' => $order_id,
            //     'date' => date('Y-m-d'),
            //     'user_id' => Auth::id(),
            //     'course_id' => $request->course_id, //1-IAS 2-QB 3-PYQ
            //     'utm_source' => $request->cookie('utm_source'),
            //     'utm_medium' => $request->cookie('utm_medium'),
            //     'utm_id' => $request->cookie('utm_id'),
            //     'utm_campaign' => $request->cookie('utm_campaign'),
            //     'utm_term' => $request->cookie('utm_term'),
            //     'utm_content' => $request->cookie('utm_content'),
            // ];

        return response()->json(['status' => 200, 'payment' => $payment_data]);

    }



    //Note:  Course Code:1=ias,2=question bank,3=previous year question


    public function createOrder(Request $request)
    {
        $order_id = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 2) . date('y') . date('m') . '00' . substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 2);
        // Note:  status:1=success,0=fail,payment_type:1=razorpay,0=cash

        $payment_data =  [
            'payment_id' => $request->payment_id,
            'order_id' => $order_id,
            'amount' => $request->totalAmount,
            'date' => date('Y-m-d'),
            'payment_type' => 1,
            'user_id' => Auth::id(),
            'status' => 0,
            'course_id' => $request->course_id,
        ];
        Payment::create($payment_data);
        return response()->json(['status' => 200, 'payment' => $payment_data]);
    }

    public function newQuestionBank(Request $request)
    {

        $logo =SettingGeneral::first();
        $SITE_URL  = $logo->website;


        try {
            $batch_id = json_encode($request->batch_id,true);
            foreach ($request->batch_id as  $value) {
                 $ids[] = Crypt::decrypt($value);
            }


        } catch (DecryptException $e) {
            return response()->json(['status' => 666, 'error' => 'Value Mismatched']);

        }
            $amount_values = [] ;
            $amount_check = 0 ;
             foreach ($ids as $key => $id) {
                if (QuestionBankSubject::where('id',$id)->exists()) {
                     $amount_values  = QuestionBankSubject::where('id',$id)->pluck('price')->first();
                    $amount_check += intval($amount_values);
                    $subject_names[] = QuestionBankSubject::where('id',$id)->pluck('subject')->first();
                }
                else{
                    return response()->json(['status' => 666, 'error' => 'Value Mismatched']);
                }
            }
            if ($amount_check == $request->amount) {

                $data =  [
                    'response' => json_encode($request->response),
                    'order_id' => $request->order_id,
                    'payment_type' => 1,
                    'amount' => $request->amount,
                    'date' => date('Y-m-d'),
                    'status' => 1,
                    'user_id' => Auth::id(),
                    'payment_id' => $request->response['razorpay_payment_id'],
                    'course_id' => $request->course_id,
                    'batch_id' => json_encode($ids,true)
                ];
                Payment::create($data);

                $analytics_data =  [
                    'amount' => $request->amount,
                    'order_id' => $request->order_id,
                    'date' => date('Y-m-d'),
                    'user_id' => Auth::id(),
                    'course_id' => $request->course_id, //1-IAS 2-QB 3-PYQ
                    'utm_source' => strtolower($request->cookie('utm_source')),
                    'utm_medium' => $request->cookie('utm_medium'),
                    'utm_id' => $request->cookie('utm_id'),
                    'utm_campaign' => $request->cookie('utm_campaign'),
                    'utm_term' => $request->cookie('utm_term'),
                    'utm_content' => $request->cookie('utm_content'),
                ];
                OrderAnalyticsReport::create($analytics_data);
                foreach ($ids as $key => $values) {

                    $order_data =  [
                        'amount' => $request->amount,
                        'order_id' => $request->order_id,
                        'batch_id' => $values,
                        'date' => date('Y-m-d'),
                        'payment_type' => 1,
                        'status' => 1,
                        'user_id' => Auth::id(),
                        'course_id' => $request->course_id, //1-IAS 2-QB 3-PYQ
                    ];
                    Orders::create($order_data);
                    $course_list[] = QuestionBankSubject::where('id',$values)->select('subject','price','image')->first();
                    $user_count = Orders::where([['batch_id', $values], ['user_id', Auth::id()], ['course_id', 2]])->count();
                    $values = ['usercount' => $user_count,];
                    QuestionBankSubject::where('id', $values)->update($values);
                }

                if (isset(Auth::user()->city->name)&&!empty(Auth::user()->city->name)) {
                    $city =   Auth::user()->city->name;
                   }else{
                       $city = '' ;
                   }
                   if (isset(Auth::user()->state->name)&&!empty(Auth::user()->state->name)) {
                    $state =   Auth::user()->state->name;
                   }else{
                       $state = '';
                   }
                   if (isset(Auth::user()->address1)&&!empty(Auth::user()->address1)) {
                    $address1 =   Auth::user()->  address1;
                   }else{
                       $address1 = '';
                   }
                   if (isset(Auth::user()->address2)&&!empty(Auth::user()->address2)) {
                    $address2 =   Auth::user()->address2;
                   }else{
                       $address2 = '';
                   }

                   $email_data = array(
                       'name' => Auth::user()->fname,
                       'email' => Auth::user()->email,
                       'amount' => $request->amount,
                        'order_id' =>$request->order_id ,
                       'image_path' => $SITE_URL .'/'.$logo->logo ,
                       'date' => date('d-m-Y H:i:s'),
                       'url' => $SITE_URL,
                       'favicon' =>$SITE_URL.'/'.$logo->logo,
                       'address1' =>  $address1,
                       'address2' =>  $address2,
                       'city' => $city,

                       'state' =>  $state,
                       'order_date' => date('d-F-Y'),
                       'fb' => $logo->facebook,
                       'ig' => $logo->instagram,
                       'twitter' => $logo->twitter,
                       'linkedin' => $logo->linkedin,
                       'course_list' => $course_list,
                   );
                    event(new QbPaymentMail($email_data));

                // Mail::send('mail.mail-qb', $email_data, function ($message) use ($email_data) {
                //     $message->to($email_data['email'], $email_data['name'])
                //         ->subject('Payment Success Notification')
                //         ->from(config('app.mail_from_address'));
                // });
                // $encrypted_id = Crypt::encryptString($request->batch_id);
                $razorpay_id = Crypt::encrypt($request->response['razorpay_payment_id']);
                return response()->json(['msg' => 'Payment successful.', 'status' => true, 'thankyou' => route('qb_thankyou', [ 'razorpay_id' => $razorpay_id])]);

            } else {
                return response()->json(['status' => 666, 'error' => 'Value Mismatched']);
            }


    }


    public function pyq_thank_you( $razorpay_id)
    {
        try {

            $payment_id = Crypt::decrypt($razorpay_id);
            $datas =Payment::where('payment_id',$payment_id)->first();

                    $decoded_id = json_decode($datas->batch_id,true);
           foreach ($decoded_id as $key => $data) {
               $course_list[] = PreviousYearSubject::where('id',$data)->select('name','price')->first();
           }
            return view('website.pyq-payment')->with(compact('payment_id','decoded_id','datas','course_list'));


        } catch (DecryptException $e) {
            return redirect()->route('home');
        }

    }

    public function qb_thank_you( $razorpay_id)
    {
        try {

            $payment_id = Crypt::decrypt($razorpay_id);
            $datas =Payment::where('payment_id',$payment_id)->first();

                    $decoded_id = json_decode($datas->batch_id,true);
           foreach ($decoded_id as $key => $data) {
               $course_list[] = QuestionBankSubject::where('id',$data)->select('subject','price')->first();
           }
            return view('website.qb-payment')->with(compact('payment_id','decoded_id','datas','course_list'));

        } catch (DecryptException $e) {
            return redirect()->route('home');
        }

    }

    public function newPYQ(Request $request)
    {

        $logo =SettingGeneral::first();
        $SITE_URL  = $logo->website;


        try {
            $batch_id = json_encode($request->batch_id,true);
            foreach ($request->batch_id as  $value) {
                 $ids[] = Crypt::decrypt($value);
            }


        } catch (DecryptException $e) {
            return response()->json(['status' => 666, 'error' => 'Value Mismatched']);

        }
            $amount_values = [] ;
            $amount_check = 0 ;
             foreach ($ids as $key => $id) {
                if (PreviousYearSubject::where('id',$id)->exists()) {
                     $amount_values  = PreviousYearSubject::where('id',$id)->pluck('price')->first();
                    $amount_check += intval($amount_values);
                    $subject_names[] = PreviousYearSubject::where('id',$id)->pluck('name')->first();
                }
                else{
                    return response()->json(['status' => 666, 'error' => 'Value Mismatched']);
                }
            }
            if ($amount_check == $request->amount) {

                $data =  [
                    'response' => json_encode($request->response),
                    'order_id' => $request->order_id,
                    'payment_type' => 1,
                    'amount' => $request->amount,
                    'date' => date('Y-m-d'),
                    'status' => 1,
                    'user_id' => Auth::id(),
                    'payment_id' => $request->response['razorpay_payment_id'],
                    'course_id' => $request->course_id,
                    'batch_id' => json_encode($ids,true)
                ];
                Payment::create($data);
                $analytics_data =  [
                    'amount' => $request->amount,
                    'order_id' => $request->order_id,
                    'date' => date('Y-m-d'),
                    'user_id' => Auth::id(),
                    'course_id' => $request->course_id, //1-IAS 2-QB 3-PYQ
                    'utm_source' => strtolower($request->cookie('utm_source')),
                    'utm_medium' => $request->cookie('utm_medium'),
                    'utm_id' => $request->cookie('utm_id'),
                    'utm_campaign' => $request->cookie('utm_campaign'),
                    'utm_term' => $request->cookie('utm_term'),
                    'utm_content' => $request->cookie('utm_content'),
                ];
                OrderAnalyticsReport::create($analytics_data);
                foreach ($ids as $key => $values) {

                    $order_data =  [
                        'amount' => $request->amount,
                        'order_id' => $request->order_id,
                        'batch_id' => $values,
                        'date' => date('Y-m-d'),
                        'payment_type' => 1,
                        'status' => 1,
                        'user_id' => Auth::id(),
                        'course_id' => $request->course_id, //1-IAS 2-QB 3-PYQ
                    ];
                    Orders::create($order_data);
                    $course_list[] = PreviousYearSubject::where('id',$values)->select('name','price','image')->first();
                    $user_count = Orders::where([['batch_id', $values], ['user_id', Auth::id()], ['course_id', 3]])->count();
                    $values = ['usercount' => $user_count,];
                    PreviousYearSubject::where('id', $values)->update($values);
                }
                // $email_data = array(
                //     'name' => Auth::user()->fname,
                //     'email' => Auth::user()->email,
                //     'batch_name' => $subject_names,
                //     'image_path' => $SITE_URL .'/'.$logo->logo ,
                //     'date' => date('d-m-Y H:i:s'),
                //     'order_id' =>$request->order_id ,
                //     'amount' => $request->amount,
                //     'url' => $SITE_URL,
                // );
                if (isset(Auth::user()->city->name)&&!empty(Auth::user()->city->name)) {
                 $city =   Auth::user()->city->name;
                }else{
                    $city = '' ;
                }
                if (isset(Auth::user()->state->name)&&!empty(Auth::user()->state->name)) {
                 $state =   Auth::user()->state->name;
                }else{
                    $state = '';
                }
                if (isset(Auth::user()->address1)&&!empty(Auth::user()->address1)) {
                 $address1 =   Auth::user()->  address1;
                }else{
                    $address1 = '';
                }
                if (isset(Auth::user()->address2)&&!empty(Auth::user()->address2)) {
                 $address2 =   Auth::user()->address2;
                }else{
                    $address2 = '';
                }

                $email_data = array(
                    'name' => Auth::user()->fname,
                    'email' => Auth::user()->email,
                    'amount' => $request->amount,
                     'order_id' =>$request->order_id ,
                    'image_path' => $SITE_URL .'/'.$logo->logo ,
                    'date' => date('d-m-Y H:i:s'),
                    'url' => $SITE_URL,
                    'favicon' =>$SITE_URL.'/'.$logo->logo,
                    'address1' =>  $address1,
                    'address2' =>  $address2,
                    'city' => $city,

                    'state' =>  $state,
                    'order_date' => date('d-F-Y'),
                    'fb' => $logo->facebook,
                    'ig' => $logo->instagram,
                    'twitter' => $logo->twitter,
                    'linkedin' => $logo->linkedin,
                    'course_list' => $course_list,
                );
                event(new PyqPaymentMail($email_data));

                // Mail::send('mail.mail-pyq', $email_data, function ($message) use ($email_data) {
                //     $message->to($email_data['email'], $email_data['name'])
                //         ->subject('Payment Success Notification')
                //         ->from(config('app.mail_from_address'));
                // });
                // $encrypted_id = Crypt::encryptString($request->batch_id);
                $razorpay_id = Crypt::encrypt($request->response['razorpay_payment_id']);
                return response()->json(['msg' => 'Payment successful.', 'status' => true, 'thankyou' => route('pyq_thankyou', [ 'razorpay_id' => $razorpay_id])]);

            } else {
                return response()->json(['status' => 666, 'error' => 'Value Mismatched']);
            }


    }

    public function premiumthankyou($order_id)
    {
        try {
            $decrypted_id = Crypt::decrypt($order_id);
            return view('website.premium-payment-thankyou')->with(compact('decrypted_id'));

        } catch (\Throwable $e) {
            return view('errors.404');
        }
    }

    public function premium(Request $request)
    {
      $primeamount = SettingGeneral::where('id',1)->pluck('primeamount')->first();
        if ($primeamount == $request->amount) {
            $data =  [
                'response' => json_encode($request->response),
                'order_id' => $request->order_id,
                'payment_type' => 1,
                'amount' => $request->amount,
                'date' => date('Y-m-d'),
                'status' => 1,
                'user_id' => Auth::id(),
                'payment_id' => $request->response['razorpay_payment_id'],
                'course_id' => $request->course_id,
            ];

            $order_data =  [
                'amount' => $request->amount,
                'order_id' => $request->order_id,
                'batch_id' => $request->batch_id,
                'date' => date('Y-m-d'),
                'payment_type' => 1,
                'status' => 1,
                'user_id' => Auth::id(),
                'course_id' => $request->course_id, //1-IAS 2-QB 3-PYQ
            ];
            $analytics_data =  [
                'amount' => $request->amount,
                'order_id' => $request->order_id,
                'date' => date('Y-m-d'),
                'user_id' => Auth::id(),
                'course_id' => $request->course_id, //1-IAS 2-QB 3-PYQ
                'utm_source' => strtolower($request->cookie('utm_source')),
                'utm_medium' => $request->cookie('utm_medium'),
                'utm_id' => $request->cookie('utm_id'),
                'utm_campaign' => $request->cookie('utm_campaign'),
                'utm_term' => $request->cookie('utm_term'),
                'utm_content' => $request->cookie('utm_content'),
            ];
            OrderAnalyticsReport::create($analytics_data);
            Payment::create($data);
            Orders::create($order_data);
            User::where('id',Auth::user()->id)->update([
                'is_prime' => 1 ,
                'prime_start_date' => date('Y-m-d'),
            ]);

            return response()->json(['msg' => 'Payment successful.', 'status' => true, 'thankyou' => route('thankyou.premium',Crypt::encrypt($request->order_id) )]);
        }else{
            return response()->json(['banned' => 1 ,]);
        }

    }

    public function paysuccess(Request $request)
    {
        //Update Payment Status
        $series_id = Batch::where('id', $request->batch_id)->pluck('series_id')->first();
        $batch_amount = [];
        if($request->course_id == 1){
            $batch_data = Batch::where('id', $request->batch_id)->first();
            $batch_amount = ($batch_data->price)-(($batch_data->price)*($batch_data->discount/100));
        }elseif($request->course_id == 3){
            if ($request->batch_id == 'PREMIUM') {
                $batch_amount =     ($originial_amount =PreviousYearSubject::where('status',1)->get()->sum('price')) - (($originial_amount)*0.40) ;
            } else {
                $batch_data = PreviousYearSubject::where('id', $request->batch_id)->first();
                $batch_amount = ($batch_data->price);
                 }
        }elseif($request->course_id == 2){
            if ($request->batch_id == 'PREMIUM') {
                $batch_amount =     ($originial_amount =QuestionBankSubject::where('status',1)->get()->sum('price')) - (($originial_amount)*0.40) ;
            } else {
                $batch_data = QuestionBankSubject::where('id', $request->batch_id)->first();
                $batch_amount = ($batch_data->price);
                 }

        }

        $receive_data_amount = $request->amount;

        if ($batch_amount == $receive_data_amount) {
            $data =  [
                'response' => json_encode($request->response),
                'order_id' => $request->order_id,
                'payment_type' => 1,
                'amount' => $request->amount,
                'date' => date('Y-m-d'),
                'status' => 1,
                'user_id' => Auth::id(),
                'payment_id' => $request->response['razorpay_payment_id'],
                'course_id' => $request->course_id,
            ];

            $order_data =  [
                'amount' => $request->amount,
                'order_id' => $request->order_id,
                'batch_id' => $request->batch_id,
                'date' => date('Y-m-d'),
                'payment_type' => 1,
                'status' => 1,
                'user_id' => Auth::id(),
                'course_id' => $request->course_id, //1-IAS 2-QB 3-PYQ
            ];
            $analytics_data =  [
                'amount' => $request->amount,
                'order_id' => $request->order_id,
                'date' => date('Y-m-d'),
                'user_id' => Auth::id(),
                'course_id' => $request->course_id, //1-IAS 2-QB 3-PYQ
                'utm_source' => strtolower($request->cookie('utm_source')),
                'utm_medium' => $request->cookie('utm_medium'),
                'utm_id' => $request->cookie('utm_id'),
                'utm_campaign' => $request->cookie('utm_campaign'),
                'utm_term' => $request->cookie('utm_term'),
                'utm_content' => $request->cookie('utm_content'),
            ];
            OrderAnalyticsReport::create($analytics_data);
            Payment::create($data);
            Orders::create($order_data);

            $logo =SettingGeneral::first();
            $SITE_URL  = $logo->website;


            if ($request->course_id == 1) {
                $user_count = Orders::where([['batch_id', $request->batch_id], ['user_id', Auth::id()], ['course_id', 1]])->count();
                $values = ['usercount' => $user_count,];
                Batch::where('id', $request->batch_id)->update($values);
            } elseif ($request->course_id == 2) {
                $user_count = Orders::where([['batch_id', $request->batch_id], ['user_id', Auth::id()], ['course_id', 2]])->count();
                $values = ['usercount' => $user_count,];
                QuestionBankSubject::where('id', $request->batch_id)->update($values);
            } else {
                $user_count = Orders::where([['batch_id', $request->batch_id], ['user_id', Auth::id()], ['course_id', 3]])->count();
                $values = ['usercount' => $user_count,];
                PreviousYearSubject::where('id', $request->batch_id)->update($values);
            }

            if (isset(Auth::user()->city->name)&&!empty(Auth::user()->city->name)) {
                $city =   Auth::user()->city->name;
               }else{
                   $city = '' ;
               }
               if (isset(Auth::user()->state->name)&&!empty(Auth::user()->state->name)) {
                $state =   Auth::user()->state->name;
               }else{
                   $state = '';
               }
               if (isset(Auth::user()->address1)&&!empty(Auth::user()->address1)) {
                $address1 =   Auth::user()->address1;
               }else{
                   $address1 = '';
               }
               if (isset(Auth::user()->address2)&&!empty(Auth::user()->address2)) {
                $address2 =   Auth::user()->address2;
               }else{
                   $address2 = '';
               }


            if ($request->course_id == 1) {
                $email_data = array(
                    'name' => Auth::user()->fname,
                    'email' => Auth::user()->email,
                    'amount' => $request->amount,
                    'batch_name' => Batch::where('id', $request->batch_id)->pluck('name')->first(),
                     'order_id' =>$request->order_id ,
                    'series_name' => Series::where('id', $series_id)->pluck('name')->first(),
                    'image_path' => $SITE_URL .'/'.$logo->logo ,
                    'date' => date('d-m-Y H:i:s'),
                    'url' => $SITE_URL,
                    'favicon' =>$SITE_URL.'/'.$logo->logo,
                    'address1' =>  $address1,
                    'address2' =>  $address2,
                    'city' => $city,
                    'state' =>  $state,
                    'order_date' => date('d-F-Y'),
                    'batch_image' => Series::where('id', $series_id)->pluck('image')->first(),
                    'fb' => $logo->facebook,
                    'ig' => $logo->instagram,
                    'twitter' => $logo->twitter,
                    'linkedin' => $logo->linkedin,
                );
                event(new IasPaymentMail($email_data));

                // Mail::send('mail.ias-payment', $email_data, function ($message) use ($email_data) {
                //     $message->to($email_data['email'], $email_data['name'])
                //         ->subject('Payment Success Notification')
                //         ->from(config('app.mail_from_address'));
                // });
            } elseif ($request->course_id == 3) {
                if($request->batch_id == "PREMIUM"){
                    $batch_name_pyq = "Previous Year Courses/Package Bundle";
                }else{
                    $batch_name_pyq = PreviousYearSubject::where('id', $request->batch_id)->pluck('name')->first();
                }
                $email_data = array(
                    'name' => Auth::user()->fname,
                    'email' => Auth::user()->email,
                    'batch_name' =>$batch_name_pyq ,
                    'image_path' => $SITE_URL .'/'.$logo->logo ,
                    'date' => date('d-m-Y H:i:s'),
                    'order_id' =>$request->order_id ,
                    'amount' => $request->amount,
                    'url' => $SITE_URL,
                );

                Mail::send('mail.payment', $email_data, function ($message) use ($email_data) {
                    $message->to($email_data['email'], $email_data['name'])
                        ->subject('Payment Success Notification')
                        ->from(config('app.mail_from_address'));
                });
            } else {

                if($request->batch_id == "PREMIUM"){
                    $batch_name_qb = "Question Bank/Package Bundle";
                }else{
                    $batch_name_qb = QuestionBankSubject::where('id', $request->batch_id)->pluck('subject')->first();
                }

                $email_data = array(
                    'name' => Auth::user()->fname,
                    'email' => Auth::user()->email,
                    'batch_name' => $batch_name_qb,
                    'image_path' => $SITE_URL .'/'.$logo->logo ,
                    'date' => date('d-m-Y H:i:s'),
                    'order_id' =>$request->order_id ,
                    'amount' => $request->amount,
                    'url' => $SITE_URL,            );
                Mail::send('mail.payment', $email_data, function ($message) use ($email_data) {
                    $message->to($email_data['email'], $email_data['name'])
                        ->subject('Payment Success Notification')
                        ->from(config('app.mail_from_address'));
                });
            }
            $encrypted_id = Crypt::encryptString($request->batch_id);
            $order_id = $request->order_id;
            //Send Response
            // $arr = array('msg' => 'Payment successful.', 'status' => true, 'thankyou' => route('thankyou', $encrypted_id, $order_id));
            return response()->json(['msg' => 'Payment successful.', 'status' => true, 'thankyou' => route('thankyou', ['encrypted_id' => $encrypted_id, 'order_id' => $order_id])]);
        }else{
            return response()->json(['banned' => 1 ,]);
        }



    }

    public function payfailure(Request $request)
    {
        //Update Payment Status
        $data =  [
            'response' =>  json_encode($request->response),
            'order_id' => $request->order_id,
            'payment_type' => 1,
            'date' => date('Y-m-d H:i'),
            'amount' => $request->amount,
            'user_id' => Auth::id(),
            'status' => 0,
            'payment_id' => $request->response['metadata']['payment_id'],
            'course_id' => $request->course_id,

        ];
        Payment::create($data);
    }

    public function thankyou($encrypted_id, $order_id)
    {
        try {
            $decrypt_id =  Crypt::decryptString($encrypted_id);
            $course_id = Orders::where([['order_id', $order_id], ['user_id', Auth::user()->id]])->pluck('course_id')->first();
            if ($course_id == 1) {

                $datas = Orders::where([['batch_id', $decrypt_id], ['user_id', Auth::user()->id], ['course_id', 1]])->first();
                $batch = Batch::where('id', $decrypt_id)->with('series')->first();
                return view('website.payment_thankyou', compact('datas', 'batch'));
            } elseif ($course_id == 3) {
                if (Orders::where([['order_id', $order_id], ['user_id', Auth::user()->id]])->where('batch_id', 'PREMIUM')->first()) {
                    $datas = Orders::where([['batch_id', 'PREMIUM'], ['user_id', Auth::user()->id], ['course_id', 3]])->first();
                    $previous_year_subject = PreviousYearSubject::all();
                    return view('website.payment_thankyou', compact('datas', 'previous_year_subject', 'decrypt_id'));
                } else {
                    $datas = Orders::where([['batch_id', $decrypt_id], ['user_id', Auth::user()->id], ['course_id', 3]])->first();
                    $previous_year_subject = PreviousYearSubject::where('id', $decrypt_id)->first();
                    return view('website.payment_thankyou', compact('datas', 'previous_year_subject'));
                }
            } elseif ($course_id == 2) {
                if (Orders::where([['order_id', $order_id], ['user_id', Auth::user()->id]])->where('batch_id', 'PREMIUM')->first()) {
                    $datas = Orders::where([['batch_id', $decrypt_id], ['user_id', Auth::user()->id], ['course_id', 2]])->first();
                    $question_bank = QuestionBankSubject::all();
                    $questionbank_first = QuestionBankSubject::first();
                    return view('website.payment_thankyou', compact('datas', 'question_bank', 'decrypt_id', 'questionbank_first'));
                } else {
                    $datas = Orders::where([['batch_id', $decrypt_id], ['user_id', Auth::user()->id], ['course_id', 2]])->first();
                    $question_bank = QuestionBankSubject::where('id', $decrypt_id)->first();
                    return view('website.payment_thankyou', compact('datas', 'question_bank'));
                }
            }
        } catch (DecryptException $e) {
            return redirect('/');
        }
    }
}
