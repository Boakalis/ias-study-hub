<?php

namespace App\Http\Controllers;

use App\Models\Admin\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function download($id)
{
    $file = Batch::where('id', $id)->first();
    $headers = array('Content-Type: application/pdf',);
    $url = public_path().'/'.$file->schedule;

    return response()->download($url, $file->name.' '.'schedule.pdf',$headers);
}
}
