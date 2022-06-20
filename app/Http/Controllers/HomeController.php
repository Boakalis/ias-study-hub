<?php

namespace App\Http\Controllers;

use App\Models\Admin\PreviousYearSubject;
use App\Models\Admin\QuestionBankSubject;
use Illuminate\Http\Request;
use Auth;
use App\Models\Faq;
use App\Models\FaqCategory;
use App\Models\Page;
use App\Models\Contact;
use App\Mail\ContactusMail;
use App\Models\AddReferer;
use App\Models\SettingGeneral;
use Illuminate\Support\Facades\Mail;
use Session;
use App\Models\Admin\Series;
use App\Models\OrderAnalyticsReport;
use App\Models\User;
use App\Traits\SmsTrait;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Hash;
use Illuminate\Contracts\Auth\PasswordBroker;
use Exception;
use Config;
class HomeController extends Controller
{
    use SmsTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /*  public function __construct()
    {
        $this->middleware('auth');
    } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $categories = QuestionBankSubject::active()->get();
        return view('website.Users.dashboard')->with(compact('categories'));
    }

    public function checkLogin()
    {
        if(!empty(Auth::user()->id)){
            return redirect()->route('login');
        }
    }

    public function home()
    {
        $ias_series = Series::where('status',1)->with('batch')->orderBy('order', 'DESC')->take(6)->get();
        $previous_year_questions= PreviousYearSubject::active()->orderBy('id','ASC')->take(3)->get();
        $question_banks= QuestionBankSubject::active()->orderBy('id','ASC')->take(3)->get();
        return view('website.home',compact('ias_series','previous_year_questions','question_banks'));
    }



    public function otp(Request $request)
    {
        $validator = \Validator::make($request->all() ,             ['phone' => 'required|integer|bail'],
        [
            'phone.required' => 'The :attribute number cannot be empty.',
            'phone.exists' => 'There is no user registered with this Phone number.',
            'phone.integer' => 'Phone number should contain only numbers.',
        ],
);

        if ($validator->fails())
        {
            return response()
                ->json(['errors' => $validator->errors()
                ->all() ]);
        }
        // $this->validate(
        //     $request,
        //     ['phone' => 'required|integer|bail|exists:users,phone'],
        //     [
        //         'phone.required' => 'The :attribute cannot be empty.',
        //         'phone.exists' => 'There is no user registered with this Phone number.',
        //         'phone.integer' => 'Phone number should contain only numbers.',
        //     ],
        //     ['phone' => 'Phone number']
        // );


            $phone = $request->phone;
            $user = User::where('phone', $request->phone)->first();
            if ($user != null) {
                $otp = rand(1000, 9999);
                $user->otp = $otp;
                $user->save();
                $message = "Your OTP is " . $otp;
                $phone_number = "+91".($request->phone);
                $this->sendSMS($phone_number, $message);
                return response()->json(['status'=>200 ,'otpSuccess' => true ,'phone' => $request->phone]);
            }else{
                $newUser = User::create([
                    'fname' => 'User-'.substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,2).date('y').date('m').'00'.substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,2),
                    'phone' => $request->phone,
                    'userId'=>substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,2).date('y').date('m').'00'.substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,2)
                ]);
                $otp = rand(1000, 9999);
                $newUser->otp = $otp;
                $newUser->save();
                $message = "Your OTP is " . $otp;
                $phone_number = "+91".($request->phone);
                    $this->sendSMS($phone_number, $message);
                return response()->json(['status'=>200 ,'otpSuccess' => true ,'phone' => $request->phone]);

            }


    }


    public function faq()
    {
        $categories = FaqCategory::get();
        return view('website.faq',compact('categories'));
    }

    public function getCategoryFaq(Request $request)
    {
        $faqs =  Faq::where('category_id',$request->category)->get();
        $html =  view('website.faq-render',compact('faqs'))->render();
        return response()->json(['status' => TRUE,'html' => $html]);
    }

    public function getPage($slug)
    {
        $page = Page::where('slug',$slug)->first();
        if(!empty($page)){
            return view('website.page',compact('page'));
        }

        abort('404');
    }

    public function loginWithMail(Request $request)
    {

        $validator = \Validator::make($request->all() ,
        [
           'email'=> 'required|email|max:255',
           'password'=> 'required|max:255',
       ],
       [
           'name.required' => 'Name required.',
           'name.max' => 'Maximum characters exceeded.',
           'email.required' => 'Email required.',
           'email.max' => 'Maximum characters exceeded.',
           'password.required' => 'Password required.',
           'password.max' => 'Maximum characters exceeded.',
       ],
);

       if ($validator->fails())
       {
           return response()
               ->json(['errors' => $validator->errors()
               ->all() ]);
       }



        $user = User::where('email',$request->email)->first();
        if (!empty($user->password)) {
            if($check = User::where('email',$request->email)->exists()) {
                if (Hash::check($request->password, $user->password )){
                    Auth::login($user);
                    return response()->json([ 'status' => 200 , 'loginSuccess' => true]);
                }else{
                    return response()->json(['status' => 601 , 'loginFailure' => true]);
                }
            }
             else {
                return response()->json(['status' => 600 , 'loginFailure' => true]);

            }
        } else {
            return response()->json(['status' => 603 , 'loginFailure' => true]);
        }




    }

    public function registerWithMail(Request $request)
    {

        $validator = \Validator::make($request->all() ,
         ['name' => 'required|string|max:255',
            'email' => 'required|unique:users|email|max:255',
            'password'=> 'required|min:8|max:255',
        ],
        [
            'name.required' => 'Name required.',
            'name.max' => 'Maximum characters exceeded.',
            'email.required' => 'Email required.',
            'email.unique'=> 'Email already exists',
            'email.max' => 'Maximum characters exceeded.',
            'password.required' => 'Password required.',
            'password.min' => 'Password should contain minimum 8 characters.',
            'password.max' => 'Maximum characters exceeded.',
        ],
);

        if ($validator->fails())
        {
            return response()
                ->json(['errors' => $validator->errors()
                ->all() ]);
        }


         if (User::where('email',$request->email)->exists()) {
             return response()->json(['status'=> 601 , 'error'=> true]);
         } else if ($request->password != $request->confirm_password) {
            return response()->json(['status'=> 600 , 'error'=> true]);
         }else{
            $newUser = User::create([
                'fname' => $request->name,
                'email'=> $request->email,
                'password'=> bcrypt($request->password),
            ]);
            Auth::login($newUser);
            return response()->json(['status'=> 200 , 'success'=> true]);
         }




    }

    public function refererSignin(Request $request)
    {

        if ( AddReferer::where([['name',strtolower($request->name)],['is_referer',1]])->exists() ) {
            $refererdata = AddReferer::where([['name',strtolower($request->name)],['is_referer',1]])->first();
            if($refererdata->status == 1){
                if(Hash::check(($request->password), ($refererdata->password))){
                    $datas = OrderAnalyticsReport::where('utm_source',$refererdata->name)->get();
                     return view('admin.referal-dashboard')->with(compact('datas'));
                }else{
                    return redirect()->route('refererLogin')
                    ->with(Session::flash('alert-danger', 'Credentials Does not Matched '));
                }
            }
            else{
                return redirect()->route('refererLogin')
                ->with(Session::flash('alert-danger', 'User account suspended by Admin.Please contact Admin '));
            }

        } else {
            return redirect()->route('refererLogin')
            ->with(Session::flash('alert-danger', 'Account not exists.Please contact admin '));
         }


    }


//     public function forgotPassword(Request $request)
//     {

//         $validator = \Validator::make($request->all() ,
//         [
//            'email'=> 'required|email|max:255',

//        ],
//        [
//            'email.required' => 'Email required.',
//            'email.max' => 'Maximum characters exceeded.',
//        ],

// );

//        if ($validator->fails())
//        {
//            return response()
//                ->json(['errors' => $validator->errors()
//                ->all() ]);
//        }

//        $token = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,2).date('y').date('m').'00'.substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,2);
//        return     $encrypted_token = sha1($token);


//     }


    public function forgotPassword(Request $request, PasswordBroker $passwords)
    {
        if( $request->ajax() )
        {
            $this->validate($request, ['email' => 'required|email']);

            $response = $passwords->sendResetLink($request->only('email'));

            switch ($response)
            {
                case PasswordBroker::RESET_LINK_SENT:
                   return response()->json( [
                       'failedProcess'=>'false',
                       'msg'=>'A password link has been sent to your email address'
                   ]);

                case PasswordBroker::INVALID_USER:
                   return response()->json([
                       'status'=>600,
                       'msg'=>"We can't find a user with that email address"
                   ]);
            }
        }
        return false;
    }


    public function verifyOTP(Request $request)
    {
        $validator = \Validator::make($request->all() ,
        [
           'phone'=> 'required|numeric|digits_between:10,25',
       ],
       [
           'phone.required' => 'Phone Number required.',
           'phone.max' => 'Maximum characters exceeded.',

       ],
);

       if ($validator->fails())
       {
           return response()
               ->json(['errors' => $validator->errors()
               ->all() ]);
       }


       $check_user = User::where('phone', $request->phone)->first();
        if ($request->otp === $check_user->otp) {
            if($check_user)
               {
                Auth::login($check_user);
                 $last_visited_link = URL::to('/');
                return response()->json([ 'status' => 200 , 'last_visited_link' => $last_visited_link]);
               }
        } else{

            return response()->json([ 'status' => 401 , 'error' => true]);
           }



    }


    public function refererLogin()
    {
            return view('admin.new-login');
    }

    public function contact()
    {
        return view('website.contact-us');
    }

    public function profileDetails(Request $request)
    {

        $id=Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'email' =>  [ 'required',Rule::unique('users','email')->ignore($id,'id') ,'email'],
            'phone' =>  [ 'required',Rule::unique('users','phone')->ignore($id,'id'),'numeric','digits_between:10,25'],

        ]
,[
        'email.unique' => 'Email address already Exists',
        'phone.unique' => 'Phone number already Exists',
        'email.required' => 'Email address required',
        'phone.required' => 'Phone number required',

    ]);

        if ($validator->fails())
        {
            return response()
                ->json(['errors' => $validator->errors()
                ->all() ]);
        }

        User::where('id',Auth::user()->id)->update($request->except('_token'));

        return response()->json(['status'=> 200]);

    }

    public function saveContact()
    {
        $this->validate(request(),[
            'email' => 'required|max:255',
            'mobile' => 'required|numeric|digits_between:10,15',
            'message' => 'required|string|max:255'
        ]);

        $input =  [
            'email' => request('email'),
            'mobile' => request('mobile'),
            'message'=> request('message'),
        ];

        Contact::create($input);

        $site_setting = SettingGeneral::first();
        Mail::to(Config::get('app.mail_from_address'))->send(new ContactusMail($input));
        return back()->with(Session::flash('alert-success', 'Thanks for contacting us.We will reach us soon'));
    }

    public function aboutUs()
    {
        return view('website.about-us');
    }
}
