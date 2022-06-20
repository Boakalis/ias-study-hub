<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class CountryStateCityController extends Controller
{


    public function getState(Request $request)
    {
        $states= State::where("country_id",$request->country_id)
                    ->get(["name","id"]);
        return response()->json(['status'=>200,'states'=>$states]);
    }
    public function getCity(Request $request)
    {
        $cities = City::where("state_id",$request->state_id)
                    ->get(["name","id"]);
        return response()->json(['status'=>200,'cities'=>$cities]);
    }

}
