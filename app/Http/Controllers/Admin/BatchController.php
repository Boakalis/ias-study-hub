<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Series;
use App\Models\Orders;
use App\Models\Admin\Batch;
use Session;
use Auth;
use App\Models\Admin\Helper;
use App\Models\Admin\PreviousYearSubject;
use Illuminate\Validation\Rule;



use function GuzzleHttp\json_decode;

class BatchController extends Controller
{
    public function batch()
    {
        $datas = Batch::with('series')->orderBy('id', 'DESC')->paginate(50);
        return view('admin.ias.batch.index')
            ->with(compact('datas'));
    }



    public function createBatch()
    {
        $series = Series::select('id', 'name')->get();
        return view('admin.ias.batch.create')
            ->with(compact('series'));
    }

    public function batchStore(Request $request)
    {
        if (request('slug') != null)
        {
            $request['slug'] = str_slug(request('slug') , '-');
        }
        else
        {
            $request['slug'] = str_slug(request('name') , '-');
        }

        $name = $request->name;
        $slug = $request->slug;

        if (    Batch::where([['series_id',$request->series_id],['name',$name]])->exists()) {
            return back()
            ->with(Session::flash('alert-danger', 'Series with same batch name exists.'));

        }elseif(Batch::where([['series_id',$request->series_id],['slug',$slug]])->exists()) {
            return back()
            ->with(Session::flash('alert-danger', 'Series with same batch slug exists.'));

        }else{
        $this->validate(request() , [
         'series_id' => 'required',
         'price' => 'required|numeric',
         'discount' => 'required|numeric',
          'description' => 'required',

            ],
           ['name.required' => 'Name is required', 'series_id.required' => 'Please Select Series', 'price.required' => 'Price is required', 'price.numeric' => 'Price must be numeric', 'discount.required' => 'Discount is required', 'discount.numeric' => 'Discount must be numeric', 'description.required' => 'Description Field is required', 'slug' => 'Slug is Required'

        ]
        );
        $datas = $request->except('_token');

        if($request->hasFile('schedule') )
        {
            $file_name = str_replace(" ", "-", $request->schedule->getClientOriginalName());
            $file_arr  = Helper::upload_file($file_name,'schedule');
            $request->schedule->move($file_arr['path'], $file_arr['file_name']);
            $scheduleName = $file_arr['db_path'];
            $datas['schedule'] = $scheduleName;
        }



        Batch::Create($datas);

        return redirect()->route('batch')
            ->with(Session::flash('alert-success', 'Batch Added Successfully'));
        }

    }

    public function batchShow(Request $request, $id)
    {
        $datas = Batch::with('series')->findOrFail($id);
        return view('admin.ias.batch.show')->with(compact('datas'));
    }

    public function batchEdit($id)
    {

        $series = Series::get();
        $datas = Batch::with('series')->findOrFail($id);
        return view('admin.ias.batch.edit')->with(compact('datas', 'series'));

    }

    public function batchUpdate(Request $request, $id)
    {

        if (request('slug') != null)
        {
            $request['slug'] = str_slug(request('slug') , '-');
        }
        else
        {
            $request['slug'] = str_slug(request('name') , '-');
        }

        $name = $request->name;
        $slug = $request->slug;
        if (    Batch::where([['series_id',$request->series_id],['name',$name]])->count() > 1 ) {
            return back()
            ->with(Session::flash('alert-danger', 'Series with same batch name exists.'));

        }elseif(Batch::where([['series_id',$request->series_id],['slug',$slug]])->count() > 1){
            return back()
            ->with(Session::flash('alert-danger', 'Series with same batch slug exists.'));

        }else {

        $this->validate(request() , [

             'series_id' => 'required',
             'price' => 'required|numeric',
              'discount' => 'required|numeric',
              'description' => 'required',
],
              ['name.required' => 'Name is required', 'series_id.required' => 'Please Select Series', 'price.required' => 'Price is required', 'price.numeric' => 'Price must be numeric', 'discount.required' => 'Discount is required', 'discount.numeric' => 'Discount must be numeric', 'description.required' => 'Description Field is required', 'slug' => 'Slug is Required'

        ]
        );
        $datas = $request->except('_token');

        if($request->hasFile('schedule') )
        {
            $file_name = str_replace(" ", "-", $request->schedule->getClientOriginalName());
            $file_arr  = Helper::upload_file($file_name,'schedule');
            $request->schedule->move($file_arr['path'], $file_arr['file_name']);
            $scheduleName = $file_arr['db_path'];
            $datas['schedule'] = $scheduleName;
        }

        Batch::where('id', $id)->update($datas);

        return redirect()->route('batch')
            ->with(Session::flash('alert-success', 'Batch Updated Successfully'));
    }
    }

    public function status(Request $request,$id ,$type )
    {
        if ($type == 1) {
            $value = Batch::where('id',$id)->pluck('status')->first();
            if ($value == 1) {
                Batch::where('id',$id)->update(['status' => 0]) ;
                $result = 0 ;
            }
            else{
             Batch::where('id',$id)->update(['status' => 1]) ;
             $result = 1;
         }

        }
        elseif($type == 3) {
            $value = PreviousYearSubject::where('id',$id)->pluck('isFree')->first();
            if ($value == 1) {

                PreviousYearSubject::where('id',$id)->update(['isFree' => 0]) ;
                $result = 0 ;
            } else{
             PreviousYearSubject::where('id',$id)->update(['isFree' => 1]) ;
             $result = 1;
        }}
        else {
            $value = Batch::where('id',$id)->pluck('isClosed')->first();
            if ($value == 1) {

                Batch::where('id',$id)->update(['isClosed' => 0]) ;
                $result = 0 ;
            } else{
             Batch::where('id',$id)->update(['isClosed' => 1]) ;
             $result = 1;
        }


        return response()->json(['status' => 200 ,'result' => $result, ]);
        }    }

    public function batchDestroy(Request $request,$id)
    {
        $datas = Batch::with('test')->findOrFail($id);

        if(Orders::where([['batch_id',$id],['course_id',1]])->exists()){
            $request->session()->flash('message', 'Batch was purchased.So cant delete it');
            $request->session()->flash('message-type', 'warning');
            return response()->json(['status'=>'Not Deleted']);
        }

        if ($datas
            ->test
            ->isEmpty())
        {

            $datas->delete();

            $request->session()->flash('message', 'Batch Deleted Successfully.');
            $request->session()->flash('message-type', 'danger');
            return response()->json(['status'=>'deleted']);

        }
        else
        {
        $request->session()->flash('message', 'Batch Assigned To Test.');
        $request->session()->flash('message-type', 'danger');
        return response()->json(['status'=>'Not Deleted']);
        }
    }

}

