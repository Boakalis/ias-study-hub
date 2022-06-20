@extends('admin.layouts.master')
@section('content')
<div class="row">
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title">
            Testimonial - Edit<a href="{{route('testimonial.index')}}" class="btn btn-secondary btn-rounded float-right"> <em class="icon ni ni-chevrons-left"></em> Back</a>
    </h3>
  </div>
</div>
@include('admin.layouts.error')
<div class="card card-preview ">
  <div class="card-inner">
        <div class="card-body">
      <div class="container-fluid">
        <form class="mb-5" action="{{ route('testimonial.update',$datas['id']) }}" method="POST"  enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="hidden" name="_method" value="PATCH">
          <div class="pb-5">
            <div class="form-group row">
                <label class="form-label col-md-3" for="file">Name</label>
                <div class="col-md-9">
                   <input type=" text" class="form-control" name="name" placeholder="Enter Name" value="{{ $datas->name }}">
                   @if ($errors->has('name'))
                   <span class="text-danger">{{ $errors->first('name') }}</span>
                   @endif
                </div>
            </div>
            <div class="form-group row">
                <label class="form-label col-md-3" for="file">Designation</label>
                <div class="col-md-9">
                   <input type=" text" class="form-control" name="designation" placeholder="Enter Designation" value="{{ $datas->designation }}">
                   @if ($errors->has('designation'))
                   <span class="text-danger">{{ $errors->first('designation') }}</span>
                   @endif
                </div>
            </div>
            <div class="form-group row">
                <label class="form-label col-md-3" for="inputEmail4">Description<span  class="required text-danger">*</span></label>
                <div class="col-md-9">
                    <textarea name="description"  class="form-control tinymce-editor" placeholder="Enter Description">{{ $datas->description }}</textarea>
                    @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label class="form-label col-md-3" for="inputEmail4">Profile Photo<span  class="required text-danger">*</span></label>
                <div class="col-md-9">
                   <input type="file" class="form-control" name="profile_photo">
                   @if(!empty($datas->profile_photo))
                   <img src="{{ asset($datas->profile_photo) }}" style="width:20%;">
                   @endif
                </div>
            </div>

            <div class="form-group row">
                <label class="form-label col-md-3">Select Rating<span  class="required text-danger">*</span></label>
                <div class="col-md-9">
                    <div class="form-control-wrap">
                        <select class="form-select" data-search="on" name="rating">
                            <option value="1" {{  ($datas->rating == 1)?'selected':'' }}> 1</option>
                            <option value="2" {{  ($datas->rating == 2)?'selected':'' }}> 2</option>
                            <option value="3" {{  ($datas->rating == 3)?'selected':'' }}> 3</option>
                            <option value="4" {{  ($datas->rating == 4)?'selected':'' }}> 4</option>
                            <option value="5" {{  ($datas->rating == 5)?'selected':'' }}> 5</option>
                        </select>
                    </div>
                    @if ($errors->has('rating'))
                    <span class="text-danger">{{ $errors->first('rating') }}</span>
                    @endif
                </div>
            </div>



            <div class="form-group row">
              <label class="form-label col-md-3" for="status ">Status<span style="color: red" class="required">*</span></label>
              <div class="col-md-9">
                <div class="custom-control custom-radio">
                  <input class="custom-control-input {{ $errors->has('status')?'is-invalid':'' }}" type="radio"  name="status" value="1" {{ ($datas['status'] == "1" )? 'checked' : ""  }} id="status_active">
                  <label class="custom-control-label" for="status_active">Active</label>
                </div>
                <div class="custom-control custom-radio">
                  <input class="custom-control-input {{ $errors->has('status')?'is-invalid':'' }}" type="radio" name="status" value="0" {{ ($datas['status'] == "0" )? 'checked' : ""  }} id="status_inactive">
                  <label class="custom-control-label" for="status_inactive">Inactive</label>
                </div>
                @if ($errors->has('status'))
                <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
              </div>
            </div>


            <div class="form-group row">
              <label class="form-label col-md-3">&nbsp;</label>
              <div class="col-md-9">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
