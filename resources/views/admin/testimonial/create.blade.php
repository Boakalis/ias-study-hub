@extends('admin.layouts.master') @section('content')

<div class="row">
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title">
            Testimonial - Add New<a href="{{route('testimonial.index')}}" class="btn btn-secondary btn-rounded float-right"> <em class="icon ni ni-chevrons-left"></em> Back</a>
        </h3>
    </div>
</div>

<!-- Session Message  -->

<div class="table">
    @include('admin.layouts.error')
</div>

<div class="card card-preview">
    <div class="card-inner">
        <div class="card-body">


            <form class="mb-5" action="{{ route('testimonial.store') }}" method="POST"  enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="pb-4">

                    <div class="form-group row">
                        <label class="form-label col-md-3" for="file">Name</label>
                        <div class="col-md-9">
                           <input type=" text" class="form-control" name="name" placeholder="Enter Name" >
                           @if ($errors->has('name'))
                           <span class="text-danger">{{ $errors->first('name') }}</span>
                           @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-md-3" for="file">Designation</label>
                        <div class="col-md-9">
                           <input type=" text" class="form-control" name="designation" placeholder="Enter Designation" >
                           @if ($errors->has('designation'))
                           <span class="text-danger">{{ $errors->first('designation') }}</span>
                           @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-md-3" for="inputEmail4">Description<span  class="required text-danger">*</span></label>
                        <div class="col-md-9">
                            <textarea name="description"  class="form-control tinymce-editor" placeholder="Enter Description"></textarea>
                            @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="form-label col-md-3" for="inputEmail4">Profile Photo<span  class="required text-danger">*</span></label>
                        <div class="col-md-9">
                           <input type="file" class="form-control" name="profile_photo">

                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="form-label col-md-3">Select Rating<span  class="required text-danger">*</span></label>
                        <div class="col-md-9">
                            <div class="form-control-wrap">
                                <select class="form-select" data-search="on" name="rating">
                                    <option value="1"> 1</option>
                                    <option value="2"> 2</option>
                                    <option value="3"> 3</option>
                                    <option value="4"> 4</option>
                                    <option value="5"> 5</option>
                                </select>
                            </div>
                            @if ($errors->has('rating'))
                            <span class="text-danger">{{ $errors->first('rating') }}</span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="form-label col-md-3" for="status ">Status<span  class="required text-danger">*</span></label>
                        <div class="col-md-9">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input {{ $errors->has('status')?'is-invalid':'' }}" type="radio" name="status" value="1" checked id="status_active" />
                                <label class="custom-control-label" for="status_active">Active</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input {{ $errors->has('status')?'is-invalid':'' }}" type="radio" name="status" value="0"  id="status_inactive" />
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
@endsection
