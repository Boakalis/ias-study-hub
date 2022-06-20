<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Admin\Helper;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index()
    {
        $datas = Page::get();
        return view('admin.pages.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(request('slug') != null){
            $request['slug']  = str_slug(request('slug'),'-');
        }else{
            $request['slug']  = str_slug(request('title'),'-');
        }

        $this->validate(request(),[
            'slug' => 'required|unique:landing_pages,slug|unique:pages,slug',
        ]);

        $path = null;
        if( $request->hasFile('page_banner_image'))
        {
            $file_name = str_replace(" ", "-", $request->page_banner_image->getClientOriginalName());
            $file_arr  = Helper::upload_file($file_name,'page_banner_image');
            $request->page_banner_image->move($file_arr['path'], $file_arr['file_name']);
            $path = $file_arr['db_path'];
        }

        $datas = [
            'title' =>request('title'),
            'slug'  => $request['slug'],
            'page_content' => request('page_content'),
            'meta_title' => request('meta_title'),
            'meta_keywords' => request('meta_keywords'),
            'meta_description' => request('meta_description'),
            'status' => request('status'),
            'page_banner_image' => $path
        ];

        Page::create($datas);
        return redirect()->route('page.index')->with('success','Page Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas = Page::find($id);
        return view('admin.pages.edit',compact('datas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(request('slug') != null){
            $request['slug']  = str_slug(request('slug'),'-');
        }else{
            $request['slug']  = str_slug(request('title'),'-');
        }

        $this->validate(request(),[
            'slug' => 'required|unique:landing_pages,slug|unique:pages,slug,'.$id,
        ]);

        $path =null;

        if( $request->hasFile('page_banner_image') )
        {
            $file_name = str_replace(" ", "-", $request->page_banner_image->getClientOriginalName());
            $file_arr  = Helper::upload_file($file_name,'page_banner_image');
            $request->page_banner_image->move($file_arr['path'], $file_arr['file_name']);
            $path = $file_arr['db_path'];
        }

        $datas = [
            'title' =>request('title'),
            'slug'  => $request['slug'],
            'page_content' => request('page_content'),
            'meta_title' => request('meta_title'),
            'meta_keywords' => request('meta_keywords'),
            'meta_description' => request('meta_description'),
            'status' => request('status'),
            'page_banner_image' => $path
        ];

        if($path ==null){
            unset($datas['page_banner_image']);
        }

        Page::where('id',$id)->update($datas);
        return redirect()->route('page.index')->with('success','Page Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Page::find($id)->delete();
        return redirect()->route('page.index')->with('success','Page Deleted Successfully');
    }
}
