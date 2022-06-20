@extends('admin.layouts.master') @section('content')

<div class="row">
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title text-uppercase ">
            Series Management <a href="{{route('series')}}" class="btn btn-secondary btn-rounded float-right"> <em class="icon ni ni-chevrons-left"></em> Back</a>
        </h3>
    </div>
</div>

<div class="card">
    <div class="card-inner">
        <div class="card-head justify-content-center pb-1">
            <h5 class="justify-content-center text-uppercase ">Series Detailed view</h5>
        </div>

        <div class="form-group">
            <label class="form-label" for="name">Series Name </label>
            <input class="form-control" id="disabledInput" type="text" placeholder="" value="{{$datas->name}}" disabled />
        </div>
        <div class="form-group">
            <label class="form-label" for="description">Series Description </label>
            <textarea readonly name="description" value="" rows="5" cols="40" id="description" class="form-control "  placeholder="Enter Description For Series"  >{!!$datas->description!!}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label" for="image">Series Image</label>
            <div>
                <img style="width: 20%; height: auto;" src="{{ url('/images/admin_images/series_images/'.$datas->image) }}" alt="series_images" />
            </div>
        </div>
    </div>
</div>
@endsection


