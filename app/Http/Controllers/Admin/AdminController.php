<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use Hash;
use App\Models\Admin;
use Image;
use App\Models\SettingGeneral;
use App\Models\Admin\Helper;
// use Analytics;
use App\Models\AddReferer;
use App\Models\OrderAnalyticsReport;
use App\Models\RazorpayCredentials;
use Config;
class AdminController extends Controller
{
    public function dashboard()
    {

        return view('admin.admin_dashboard');
    }

    public function orderAnalytics()
    {
        $orderAnalyticss = OrderAnalyticsReport::get();
        return view('admin.analytics.order')->with(compact('orderAnalyticss'));
    }


    // public function topReferers(Request $request)
    // {
    //     return Analytics::fetchTopReferrers(Period::days(1));
    //     $topReferrers = Analytics::fetchTopReferrers(Period::days($request->period));
    //     $html = view('admin.top-refer', compact('topReferrers'))->render();
    //     return response()
    //         ->json(['status' => true, 'html' => $html]);


    // }

    public function settings()
    {
        Auth::guard('admin')->user();
        return view('admin.admin_settings');
    }

    public function password()
    {

        return view('admin.admin_changepassword');
    }

    public function login(Request $request)
    {

        if(!empty(Auth::guard('admin')->user()->id)){
            return redirect()->route('admin_dashboard');
        }

        if ($request->isMethod('post'))
        {
            $data = $request->all();

            $rules = ['email' => 'required|email|max:255', 'password' => 'required', ];

            $customMessages = ['email.required' => 'Please enter your Email to Login ', 'email.email' => ' Please enter correct Email to login', 'password.required' => ' Please enter correct Password to login', ];

            $this->validate($request, $rules, $customMessages);

            if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']]))
            {
                return redirect('admin/dashboard');
            }
            else
            {
                Session::flash('error_message', 'Please Check Entered Credientials');
                return redirect()->back();
            }
        }
        return view('admin.admin_login');
    }

    public function logout()
    {
        Auth::guard('admin')
            ->logout();
        return redirect()->route('admin_login');
    }

    public function refererManagement()
    {
        $datas = AddReferer::get();
        return view('admin.analytics.management')->with(compact('datas'));
    }

    public function createReferer(Request $request)
    {

               $datas = [
                        'name' => strtolower($request->name),
                        'password' => bcrypt($request->password),
                        'status'=> 1,
                        'url'=>$request->url,
                        'is_referer'=>1,
                        ];
     AddReferer::create($datas);
     $request->session()->flash('message', 'Referer added successfully.');
     $request->session()->flash('message-type', 'success');
     return response()->json(['status'=>'Added']);

    }

    public function updateReferer(Request $request,$id)
    {

               $datas = [
                'name' => strtolower($request->name),
                        'status'=> $request->status,
                        'url'=>$request->url,
                        'is_referer'=>1
                        ];

            if (isset($request->password)) {
                $datas['password']=bcrypt($request->password) ;
            }
     AddReferer::where('id',$id)->update($datas);
     $request->session()->flash('message', 'Referer Updated successfully.');
     $request->session()->flash('message-type', 'success');
     return response()->json(['status'=>'Updated']);

    }

    public function editReferer(Request $request, $id)
    {

        $subject = AddReferer::findOrFail($id);
        return response()->json($subject);

    }


    public function profile()
    {
        return view('admin.admin_profile');
    }

    public function chkCurrentPassword(Request $request)
    {
        $data = $request->all();

        if (Hash::check($data['current_pwd'], Auth::guard('admin')->user()
            ->password))
        {
            echo "true";
        }
        else
        {
            echo "false";
        }
    }

    public function updateCurrentPassword(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die; Used For Data Check
            if (Hash::check($data['current_pwd'], Auth::guard('admin')->user()
                ->password))
            {
                if ($data['new_pwd'] == $data['confirm_pwd'])
                {
                    Admin::where('id', Auth::guard('admin')->user()
                        ->id)
                        ->update(['password' => bcrypt($data['new_pwd']) ]);
                    Session::flash('success_message', ' New Password is updated successfully!!!');
                }
                else
                {
                    Session::flash('error_message', ' Entered New and Confirm Password is not matched');
                }
            }
            else
            {
                Session::flash('error_message', ' Entered Current Password is not incorrect');
            }
            return redirect()->back();
        }
    }

    public function updateProfileData(Request $request)
    {
        $data = $request->all();
        $rules = ['name' => 'required|max:255', 'mobile' => 'required|numeric',

        ];

        $customMessages = ['name.required' => 'Please enter your Name ', 'mobile.mobile' => ' Please enter Numeric value only', 'image.image' => ' Please Choose only Image', ];

        $this->validate($request, $rules, $customMessages);
        $path = null;

        if($request->hasFile('image') )
        {
            $file_name = str_replace(" ", "-", $request->image->getClientOriginalName());
            $file_arr  = Helper::upload_file($file_name,'image');
            $request->image->move($file_arr['path'], $file_arr['file_name']);
            $path = $file_arr['db_path'];
        }

        $datas = [
            'name' => $request->name,
            'mobile' => $request->mobile,
            'image' => $path
        ];

        if(empty($path)){
            unset($datas['image']);
        }

        Admin::where('id',Auth::guard('admin')->user()->id)->update($datas);
        return redirect()->back();
    }

    public function generalSetting()
    {
       $data = SettingGeneral::first();
       return view('admin.settings.general',compact('data'));
    }

    public function payment()
    {
        $datas = RazorpayCredentials::where('id',1)->first();
        return view('admin.settings.payment')->with(compact('datas'));
    }

    public function razorpayKeyChange(Request $request)
    {
        $input = $request->except('_token');
        RazorpayCredentials::updateOrCreate(['id' => $request['id']],$input);

        \Artisan::call('config:clear');
        \Artisan ::call('config:cache');


        $oldValue = Config::get('app.razorpay_key');

        Helper::razorkey('RAZOR_KEY',$request->razorpay_id);
        Helper::razorsecret('RAZOR_SECRET',$request->razorpay_secret);
        \Artisan::call('config:clear');
        \Artisan ::call('config:cache');

        return redirect()->back()
            ->with(Session::flash('alert-success', 'Razorpay Credentials Updated Successfully'));
    }

    public function generalSettingUpdate(Request $request)
    {
        $request->validate([
            'name'                  => 'required',
            'title'               => 'required',
            'email'               => 'required',
            'phone_no'            => 'required',
        ]);

        $path = $favicon_path =null;

        if($request->hasFile('logo') )
        {
            $file_name = str_replace(" ", "-", $request->logo->getClientOriginalName());
            $file_arr  = Helper::upload_file($file_name,'logo');
            $request->logo->move($file_arr['path'], $file_arr['file_name']);
            $path = $file_arr['db_path'];
        }

        if($request->hasFile('favicon'))
        {
            $file_name = str_replace(" ", "-", $request->favicon->getClientOriginalName());
            $file_arr  = Helper::upload_file($file_name,'favicon');
            $request->favicon->move($file_arr['path'], $file_arr['file_name']);
            $favicon_path = $file_arr['db_path'];
        }

        $input = [
            'name' => request('name'),
            'title' => request('title'),
            'description' => request('description'),
            'email' => request('email'),
            'address' => request('address'),
            'phone_no' => request('phone_no'),
            'footer_text' => request('footer_text'),
            'landline' => request('landline'),
            'website' => request('website'),
            'logo' => $path ,
            'favicon' =>$favicon_path,
            'facebook' => request('facebook'),
            'twitter' => request('twitter'),
            'linkedin' => request('linkedin'),
            'instagram' => request('instagram'),
            'youtube' => request('youtube'),
            'pinterest' => request('pinterest'),
            'whatsapp' => request('whatsapp'),
            'instagram' => request('instagram'),
            'is_cookies_enabled' => request('is_cookies_enabled'),
            'cookies_message' => request('cookies_message'),
            'header_script' => request('header_script'),
            'footer_script' => request('footer_script'),
            'meta_title' => request('meta_title'),
            'meta_description' => request('meta_description'),
            'meta_keywords' => request('meta_keywords'),
            'primeamount' => $request->primeamount,
        ];

        if(empty($path)){
            unset($input['logo']);
        }

        if(empty($favicon_path)){
            unset($input['favicon']);
        }

        SettingGeneral::updateOrCreate(['id' => $request['id']],$input);

        return back()->with('success','General Settings Updated Successfully');
    }

    public function updateAdminTheme(Request $request)
    {
        Admin::where('id',Auth::guard('admin')->user()->id)->update(['theme' => $request->theme]);
        return response()->json(['status' => true,'Message' => 'Theme Updated Successfully']);
    }

}

