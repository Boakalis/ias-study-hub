<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use Auth;
use Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\AddressBook;
use Session;
use File;
use App\Models\Admin\Helper;
use Carbon\Carbon;
class UserController extends Controller
{
    public function settings()
    {
        return view('website.Users.settings');
    }

    public function passwordchange()
    {
        return view('website.Users.passwordupdate');
    }

    public function chkCurrentPassword(Request $request)
    {
        $data = $request->all();

        if (Hash::check($data['current_pwd'], Auth::user()
            ->password))
        {
            echo "true";
        }
        else
        {
            echo "false";
        }
    }





    public function passwordupdate(Request $request)
    {

        $data = $request->all();
        if ($data['password'] == $data['confirm_pwd'])
        {
            User::where('id', Auth::user()
                ->id)
                ->update(['password' => bcrypt($data['password']),
                           'password_status' => Carbon::now(),
            ]);
                return response()->json(['status'=>'200']);
        }else{
            return response()->json(['status'=>'403']);
        }
    }

    public function profileupdate(Request $request)
    {
 $request->all();
        $this->validate($request,[
           'phone'=>'required|numeric|min:10|unique:users',
           'phone' =>  [ 'required',Rule::unique('users','phone')->ignore(Auth::user()->id,'id')],
           'dob'=>'required',
           'fname'=> 'required',
           'lname' => 'required',
        ],['fname.required'=> 'Please Enter First Name', 'lname.required'=> 'Please Enter Last Name', 'dob.required'=> 'Please Select Date of Birth', 'phone.required'=> 'Mobile Number is required for instant support','phone.numeric'=> 'Mobile Number must be number','phone.min'=> 'Enter Correct Mobile Number ', ]
    );

    if($request->has('fullname')) {
        $fullname = $request->input('fullname');
   }
   else {
        $fullname = 0;
   }

   $path = null;
   if($request->hasFile('image') )
   {
        $file_name = str_replace(" ", "-", $request->image->getClientOriginalName());
        if (file_exists($file_name)) {
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $base_name = pathinfo($file_name, PATHINFO_FILENAME);
            $file_name = $base_name . '_' . date('i_s') . '.' . $ext;
        }
        $path = "/images/profile/".$file_name;
        $request->image->move(public_path("/images/profile/"), $file_name);
   }

   $datas = [
    'fname' => $request -> fname ,
    'lname' => $request -> lname ,
    'dob' => Carbon::parse(request('dob'))->format('Y-m-d H:i:s'),
    'phone' => $request -> phone ,
    'fullname' => $fullname,
    'image' => $path

   ];

   if($path == null){
        unset($datas['image']);
   }

    User::where('id',Auth::user()->id)->update($datas);
    return redirect()->back()->with(Session::flash('alert-success','Profile Updated Successfully'));

    }

    public function profileImageUpdate( Request $request)
    {
        $path = null;
        if($request->hasFile('image') )
        {
            $file_name = str_replace(" ", "-", $request->image->getClientOriginalName());
            $file_arr  = Helper::upload_file($file_name,'image');
            $request->image->move($file_arr['path'], $file_arr['file_name']);
            $path = $file_arr['db_path'];
        }

        $datas = [
            'image' => $path,
        ];
        User::where('id',Auth::user()->id)->update($datas);
        return redirect()->back()->with(Session::flash('alert-success','Profile Updated Successfully'));
    }


    public function addressupdate(Request $request)
    {
        $address_tab = [] ;
        $this->validate($request,[
            'address1'=>'required',
            'state_id'=>'required',
            'country_id'=>'required',
            'city_id'=>'required',
        ],['address1.required'=> 'Address Field is Required','country_id.required'=>'Please Select Country','state_id.required'=>'Please Select State','city_id.required'=>'Please Select City'

        ]
    );
        $datas = $request->except('_token');

        User::where('id',Auth::user()->id)->update($datas);
        return redirect()->back()->with(Session::flash('alert-success','Profile Updated Successfully'));
    }

    public function index(Request $request)
    {
        $data['countries'] = Country::get(["name","id"]);
        return view('website.Users.profile',$data);
    }


}
