<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Helper;
use App\Models\Testimonial;
use Auth;

class TestimonialController extends Controller
{
    public function create()
    {
        return view('admin.testimonial.create');
    }
    public function index()
    {
     $datas = Testimonial::orderBy('id','DESC')->get();
     return view('admin.testimonial.index',compact('datas'));
    }
    public function store(Request $request)
    {
     $this->validate($request,[
         'name'=>'required',
         'designation'=>'required',
         'description'=>'required',
         'rating'=>'required',
         'profile_photo'=>'image|nullable|max:1999',
     ]);
     $path = null;
     if($request->hasFile('profile_photo'))
     {
         $file_name = str_replace(" ", "-", $request->profile_photo->getClientOriginalName());
         $file_arr  = Helper::upload_file($file_name,'Testimonial_profile_photo');
         $request->profile_photo->move($file_arr['path'], $file_arr['file_name']);
         $path = $file_arr['db_path'];
     }

     $datas=new Testimonial();
     $datas->name=request('name');
     $datas->designation=request('designation');
     $datas->description=request('description');
     $datas->rating=request('rating');
     $datas->profile_photo=$path;
     $datas->status=request('status');
     $datas->save();
         return redirect()->route('testimonial.index')->with('success','Testimonial Created Successfully');
    }

    public function edit($id)
    {
         $datas=Testimonial::findOrFail($id);
         return view('admin.testimonial.edit',compact('datas'));
    }

    public function update(Request $request,$id)
    {
        $this->validate(request(),[
             'name'=>'required|unique:testimonials,name,'.$id,
             'designation'=>'required',
             'description'=>'required',
             'rating'=>'required',
             'profile_photo'=>'image|nullable|max:1999',
        ]);
         $datas = Testimonial::find($id);
         $datas->name=request('name');
         $datas->designation=request('designation');
         $datas->description=request('description');
         $datas->rating=request('rating');
         $datas->status=request('status');
          if($request->hasFile('profile_photo'))
         {
              //add new images
             $file_name = str_replace(" ", "-", $request->profile_photo->getClientOriginalName());
             $file_arr  = Helper::upload_file($file_name,'Testimonial_profile_photo');
             $request->profile_photo->move($file_arr['path'], $file_arr['file_name']);
             $path = $file_arr['db_path'];

             $oldphoto=$datas->profile_photo;
             if(isset($oldphoto) && !empty($oldphoto) && file_exists($oldphoto)){
                 unlink($oldphoto);
             }

             $datas->profile_photo=$path;
         }
           $datas->save();
           return redirect()->route('testimonial.index')->with('success','Testimonial Updated Successfully');
    }

    public function delete($id)
    {
         Testimonial::find($id)->delete();
         return back()->with('success','Testimonial Deleted Successfully');
    }
}
