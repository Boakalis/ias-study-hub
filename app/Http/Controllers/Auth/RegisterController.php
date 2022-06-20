<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Illuminate\Notifications\Notifiable;
use App\Notifications\Telegram;
use Illuminate\Support\Facades\Config;
use App\Models\Admin\PreviousYearSubject;
use App\Models\Admin\QuestionBankSubject;
use App\Models\Admin\Series;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:255'],
            'lname'=>['required','string','max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required','unique:users','numeric'],
        ],[
            'fname.required' => 'First Name is Required','fname.string' => 'First Name must be String','lname.required' => 'Last Name is Required','phone.numeric' => 'Mobile Number must be Number'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user= User::create([
            'fname' => $data['fname'],
            'lname' =>$data['lname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'theme' => 1,
            'userId'=>substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,2).date('y').date('m').'00'.substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,2)
            ]);


            $email_data=array(
                'fname' => $data['fname'],
                'lname' => $data['lname'],
                'email' => $data['email'],
            );
             // send email with the template

            // Mail::send('auth.mail', $email_data, function ($message) use ($email_data) {
            //     $message->to($email_data['email'], $email_data['fname'])
            //         ->subject('Welcome to Leader IAS Academy')
            //         ->from(env('MAIL_FROM_ADDRESS'),'LeaderIASAcademy');
            // });


            return $user;
    }

    public function showRegistrationForm()
    {

        return redirect()->route('index');

    }


}
