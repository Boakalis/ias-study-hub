<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Config;
class Helper extends Model
{
    use HasFactory;

    public static function upload_file($file_name_raw, $module_name = '')
    {


        $path = public_path(UPLOAD_DIRECTORY . "/");

        $year_folder = $path . date("Y");
        $month_folder = $year_folder . '/' . date("m");
        $day_folder = $month_folder . '/' . date("d");



        !file_exists($year_folder) && mkdir($year_folder, 0777, true);
        !file_exists($month_folder) && mkdir($month_folder, 0777, true);
        !file_exists($day_folder) && mkdir($day_folder, 0777, true);




        if (empty($module_name)) {
            $file_name = $file_name_raw;
        } else {
            $file_name = $module_name . '_' . $file_name_raw;
        }


        $file_name = strtolower(str_replace(' ', '_', $file_name));

        $check_exist = $day_folder . '/' . $file_name;

        if (file_exists($check_exist)) {
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $base_name = pathinfo($file_name, PATHINFO_FILENAME);
            $file_name = $base_name . '_' . date('i_s') . '.' . $ext;
        }


        $db_path = UPLOAD_DIRECTORY . '/' . date("Y") . '/' . date("m") . '/' . date("d") . '/' . $file_name;

        return ['file_name' => $file_name, 'path' => $day_folder, 'db_path' => $db_path];
    }

    public static function razorkey($key, $value) {
        $path = base_path('.env');

        if(is_bool(Config::get('app.razorpay_key')))
        {
            $old = Config::get('app.razorpay_key')? 'true' : 'false';
        }
        elseif(Config::get('app.razorpay_key')===null){
            $old = 'null';
        }
        else{
            $old = Config::get('app.razorpay_key');
        }

        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                "$key=".$old, "$key=".$value, file_get_contents($path)
            ));
        }

     }
    public static function razorsecret($key, $value) {
        $path = base_path('.env');

        if(is_bool(Config::get('app.razorpay_secret')))
        {
            $old = Config::get('app.razorpay_secret')? 'true' : 'false';
        }
        elseif(Config::get('app.razorpay_secret')===null){
            $old = 'null';
        }
        else{
            $old = Config::get('app.razorpay_secret');
        }

        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                "$key=".$old, "$key=".$value, file_get_contents($path)
            ));
        }
         }



}
