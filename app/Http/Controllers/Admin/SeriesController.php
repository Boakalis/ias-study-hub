<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Series;
use Auth;
use Session;
use Image;
use File;
use Illuminate\Validation\Rule;
use App\Models\Admin\Helper;

class SeriesController extends Controller
{
    public function series()
    {
        $datas = Series::orderBy('order', 'ASC')->paginate(50);
        return view('admin.ias.series.index')
            ->with(compact('datas'));
    }

    public function createSeries()
    {
        return view('admin.ias.series.create');

    }
    public function seriesEdit($id)
    {
         $datas = Series::find($id);
        return view('admin.ias.series.edit')->with(compact('datas'));
    }

    public function seriesStore(Request $request)
    {
        if (request('slug') != null)
        {
            $request['slug'] = str_slug(request('slug') , '-');
        }
        else
        {
            $request['slug'] = str_slug(request('name') , '-');
        }
        $this->validate(request() , [
            'slug' => 'required|unique:series,slug',
            'name' => 'required|unique:series',
            'description' => 'required', 'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000', ], ['name.required' => 'Name is required', 'description.required' => 'Description Field is required', 'image.required' => 'Image is required', 'image.mimes' => 'Please Upload Image Only ', ]);
        $datas = $request->all();
        $rules = ['name' => 'required|max:255', 'description' => 'required', 'image' => 'image', ];
        $customMessages = ['name.required' => 'Please enter your Name ', 'mobile.mobile' => ' Please enter Numeric value only', 'image.image' => ' Please Choose only Image', ];
        $this->validate($request, $rules, $customMessages);

        //Image
        $imageName = null;

        if($request->hasFile('image') )
        {
            $file_name = str_replace(" ", "-", $request->image->getClientOriginalName());
            $file_arr  = Helper::upload_file($file_name,'image');
            $request->image->move($file_arr['path'], $file_arr['file_name']);
            $imageName = $file_arr['db_path'];
        }

        $values = ['name' => $datas['name'], 'description' => $datas['description'], 'image' => $imageName, 'slug' => $request['slug'], 'status' => $datas['status']];

        if($imageName == null){
            unset($values['image']);
        }

        Series::create($values);
        return redirect()->route('create_series')
            ->with(Session::flash('alert-success', 'Series Added Successfully'));
    }

    public function seriesUpdate(Request $request, $id)
    {
        $datas = $request->all();
        if (request('slug') != null)
        {
            $request['slug'] = str_slug(request('slug') , '-');
        }
        else
        {
            $request['slug'] = str_slug(request('name') , '-');
        }

        $this->validate(request() , [
            'name' => [ 'required',Rule::unique('series','name')->ignore($id)],
            'slug' => [ 'required',Rule::unique('series','slug')->ignore($id)],
            'description' =>[ 'required'],
            'image' => ['mimes:jpeg,jpg,png,gif|max:10000']],
            ['name.required' => 'Name is required',
            'description.required' => 'Description Field is required',
            'image.required' => 'Image is required',
            'image.mimes' => 'Please Upload Image Only ',

        ]);

         $imageName = null;

        if($request->hasFile('image') )
        {
            $file_name = str_replace(" ", "-", $request->image->getClientOriginalName());
            $file_arr  = Helper::upload_file($file_name,'image');
            $request->image->move($file_arr['path'], $file_arr['file_name']);
            $imageName = $file_arr['db_path'];
        }

        $values = ['name' => $datas['name'], 'description' => $datas['description'], 'image' => $imageName,'slug' => $request['slug'] ,'status' =>  $datas['status']];

        if($imageName == null){
            unset($values['image']);
        }

        Series::where('id', $id)->update($values);
        return redirect()->route('series')
            ->with(Session::flash('alert-success', 'Series Updated Successfully'));
    }


    public function orderchange(Request $request)
    {
        $series = Series::all();
        foreach ($series as $data) {
            foreach ($request->order as $order) {
                if ($order['id'] == $data->id) {
                    $data->update(['order' => $order['position']]);
                }
            }
        }
        return response(['status' => 200]);
    }

    public function seriesShow($id)
    {
        $datas = Series::find($id);
        return view('admin.ias.series.show')->with(compact('datas'));
    }

    public function seriesDestroy($id)
    {
        $datas = Series::with('batch')->findOrFail($id);
        if ($datas
            ->batch
            ->isEmpty())
        {
            $datas->delete();
            return redirect()
                ->route('series')
                ->with(Session::flash('alert-danger', 'Series Deleted Successfully'));;
        }
        else
        {
            return redirect()
                ->route('series')
                ->with(Session::flash('alert-danger', 'Series Assigned to some Batch'));
        }
    }
}

