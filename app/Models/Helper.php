<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\QuestionBankSubject;

class Helper extends Model
{
    use HasFactory;

    public static function getSubjectCategories()
    {
    	return QuestionBankSubject::active()->get();
    }

    public static function overWriteEnvFile($key, $value) {
        $path = base_path('.env');
        if (file_exists($path)) {
            $value = '"'.trim($value).'"';
            if(is_numeric(strpos(file_get_contents($path), $key)) && strpos(file_get_contents($path), $key) >= 0){
                file_put_contents($path, str_replace(
                    $key.'="'.env($key).'"', $key.'='.$value, file_get_contents($path)
                ));
            }
            else{
                file_put_contents($path, file_get_contents($path)."\r\n".$key.'='.$value);
            }
        }
    }




}
