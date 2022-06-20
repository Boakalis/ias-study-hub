<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Hash;
use Str;
use App\Models\User;
use Validator;
use Auth;
use Exception;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Session;
use App\Models\Admin\PreviousYearSubject;
use App\Models\Admin\QuestionBankSubject;
use App\Models\Admin\Series;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest')->except('logout');

    }

    protected function authenticated(Request $request, $user)
{
    return redirect(session('link'));
}



    public function logout(Request $request)
    {
        $this->guard('auth')->logout();

        $request->session()->invalidate();
        return redirect('/');
    }

    public function showLoginForm()
{

    // $ias_series = Series::where('status',1)->with('batch')->orderBy('order', 'DESC')->take(6)->get();
    // $previous_year_questions= PreviousYearSubject::active()->orderBy('id','ASC')->take(3)->get();
    // $question_banks= QuestionBankSubject::active()->orderBy('id','ASC')->take(3)->get();
    return redirect()->route('index');
}

    public function facebooklogin()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookcallback()
    {
        $user=Socialite::driver('facebook')->user();

        $user=new User;
        $user->name=request('name');
        $user->email=request('email');
        $user->facebook_id=request('id');
        $user->password=encrypt(request('password'));
        Auth::login($user,true);
        return redirect()->route('myprofile');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {



	if(isset($request->onetaplogin)){
			$decoded_response = json_decode($request->decoded,true);
			$googleId = $decoded_response['sub'];
            if (User::where('email',$decoded_response['email'])->whereNull('googleId')->exists()) {
                $existing_user = ['googleId' => $decoded_response['sub'] ];
                 User::where('email',$decoded_response['email'])->whereNull('googleId')->update($existing_user);
                 $user = User::where('googleId', $googleId)->first();
                 Auth::login($user);
                return response()->json([ 'status' => 200 ]);

            }else{
            		$check_user = User::where('googleId', $googleId)->first();
		            if($check_user)
		               {
	                    Auth::login($check_user);

             			$last_visited_link = (session('link'));
                        return response()->json([ 'status' => 200 , 'last_visited_link' => $last_visited_link]);
                       }
		        else{
                    $fileContents =  file_get_contents($decoded_response['picture'] );
                    $path = 'images/profile/'. $decoded_response['email'].'.jpg';
                    file_put_contents($path,$fileContents);
                    $newUser = User::create([
                        'fname' => $decoded_response['name'],
                        'email' => $decoded_response['email'],
                        'googleId'=> $decoded_response['sub'],
                        'image' => $path,
                        'email_verified_at' => Carbon::now()->toDateTimeString(),
                        'userId'=>substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,2).date('y').date('m').'00'.substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,2)
                    ]);

                        Auth::login($newUser);

                        return response()->json([ 'status' => 200 ]);
	                }
                }

	}else{

        try {

            $user = Socialite::driver('google')->user();
            $finduser = User::where('googleId', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                      return redirect(session('link'));
            }
            elseif(User::where('email',$user->email)->exists()){
                return redirect()->route('login')->with(Session::flash('alert-danger','Google Login not allowed ,since you registered in Register Portal.'));
            }
            else{

                $newUser = User::create([
                    'fname' => $user->name,
                    'email' => $user->email,
                    'googleId'=> $user->id,
                    'image' => $this->getSocialAvatar($user,'images/profile/'),
                    'email_verified_at' => Carbon::now()->toDateTimeString(),
                    'userId'=>substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,2).date('y').date('m').'00'.substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,2)

                ]);

                Auth::login($newUser);

                return redirect('/home');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }}
    }

    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $create['name'] = $user->getName();
            $create['email'] = $user->getEmail();
            $create['facebookId'] = $user->getId();


            $userModel = new User;
            $createdUser = $userModel->addNew($create);
            Auth::loginUsingId($createdUser->id);


            return redirect()->route('dashboard');


        } catch (Exception $e) {


            return redirect('auth/facebook');


        }
    }



    function getSocialAvatar($user){

        $fileContents = file_get_contents($user->getAvatar());
        $path = 'images/profile/'. $user->getId().'.jpg';
        file_put_contents($path,$fileContents);
        return  $path;
    }

}
