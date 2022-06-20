<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Orders;
use App\Models\Payment;

class UserReportController extends Controller
{

    public function index()
    {
        $username = User::get();
        return view('admin.report.user-report.index')->with(compact('username'));
    }


    public function userShow($id)
    {
        $datas = User::findOrFail($id);
        $fullname = $datas->fname . ' ' . $datas->lname;
        if ($datas->country_id != null) {
            $get_country = Country::where('id',($datas->country_id))->first();
            $country_name = $get_country->name;
        } else {
           $country_name = "NA" ;
        }
        if ($datas->state_id != null) {

        $get_state = State::where('id',($datas->state_id))->first();
        $state_name = $get_state->name;
        } else {
            $state_name = "NA" ;
        }
        if ($datas->city_id != null) {

            $get_city = City::where('id',($datas->city_id))->first();
            $city_name = $get_city->name;
            } else {
                $city_name = "NA" ;
            }



        $courses = Orders::where('user_id',$id)->with('users:id,fname,lname','type:id,name','batch:id,name,series_id','batch.series:id,name','qbbatch:id,subject')->get();
        $payments =Payment::where('user_id',$id)->with('type')->get();

        // foreach($payments as $payment){
        //     if($payment->response !== null){
        //         $response =  json_decode($payment->response,true);
        //           $response ['code'];
        //     }
        // }

        return view('admin.report.user-report.show')->with(compact('datas','fullname','country_name','state_name','city_name','courses','payments'));

    }



}
