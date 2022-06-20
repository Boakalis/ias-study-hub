<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\FaqCategory;
use Session;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::get();
        $categories = FaqCategory::get();
        return view('admin.faq',compact('faqs','categories'));
    }

    public function update(Request $request)
    {

        if(request('question') != null && count($request->question) > 0){
            $array_count = count($request->question);
            Faq::truncate();
            for($i=0;$i<$array_count;$i++){

                $datas = [
                    'question' =>   isset($request->question[$i])?$request->question[$i]:'',
                    'answer' =>  isset($request->answer[$i])?$request->answer[$i]:'',
                    'category_id' =>isset($request->category_id[$i])?$request->category_id[$i]:'',
                ];
                FAQ::create($datas);
            }

            return redirect()->route('faq.index')->with(Session::flash('alert-success', 'FAQ Updated Successfully'));
        }else{
            return back()->with(Session::flash('alert-danger', 'Enter atleast 1 question'));
        }
    }
}
