<?php

namespace App\Http\Controllers;

use App\Models\Admin\Test;
use App\Models\TestReport;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;
use Auth;
use Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use File;



class PdfController extends Controller
{
    public function generatePDF(Request $request,$parameter,$encrypted_user_id)
    {
          $id = Crypt::decrypt($parameter);
            $user_id =  Crypt::decrypt($encrypted_user_id) ;
            $datas = TestReport::where([['id',$id],['user_id',$user_id]])->with('course','batch.series','test'  )->first();

            $user_data = User::where('id',$user_id)->first();
            $pdfdata = [
            'title' => 'IAS STUDYHUB',
            'date' => date('Y-m-d H:i:s'),
            'fname' => $user_data->fname,
            'lname' => $user_data->lname,
            'email' => $user_data->email,
            'test' => $datas->test->name,
            'batch' =>$datas->batch->name,
            'series' => $datas['batch']['series']['name'],
            'course' => $datas->course->name,
            'test_id' => $datas->id,
            'correct' =>$datas->correct,
            'incorrect' =>$datas->incorrect,
            'unattempt' =>$datas->unattempt,
            'total' =>$datas->marks_obtained,
        ];

        if (!empty($datas->question_html)) {
            $pdfdata['solutions'] = json_decode($datas->question_html,true);
        } else {
            $pdfdata['solutions'] = null;
        }

        PDF::setOptions(['isPhpEnabled' => true]);
        $pdf = PDF::loadView('reportPDF', $pdfdata);
        $pdf->setPaper('L');

        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.1,"Multiply");
        $canvas->page_text($width/12, $height/1.8, '', null,
         60, array(0,0,0),2,2,-30);
        return $pdf->download('report.pdf');
    }
}
