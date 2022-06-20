<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;

class SubcsriptionReportController extends Controller
{
    public function index()
    {
     $datas =   Orders::with('type','batch.series','pyqbatch','qbbatch','user')->get();
     return view('admin.report.subscription-report.index')->with(compact('datas'));
    }

}
