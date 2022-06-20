@extends('admin.layouts.master') @section('content')
<div class="row">
    {{-- @include('website.Layout.breadcrumb') --}}
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title text-uppercase">
            Series Management - Edit<a href="{{route('series')}}" class="btn btn-secondary btn-rounded float-right"> <em class="icon ni ni-chevrons-left"></em> Back</a>
        </h3>
    </div>
</div>

<div class="card">
    <div class="card-inner">
        <form class="mb-5" action="{{ route('update_series',$datas->id) }}" method="POST" id="series-form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="">

                <div class="form-group row">
                    <label class="form-label col-md-3" for="name">Series Name<span  class="required text-danger">*</span></label>
                    <div class="col-md-9"><div class="form-control-wrap">
                        <input type="text" value="{{$datas->name}}" name="name" class="form-control" required oninvalid="this.setCustomValidity('Please Enter Series Name')" oninput="setCustomValidity('')" />
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="form-label col-md-3" for="image">Series Image <span class="required text-danger">*</span> </label>

                    <div class="col-md-9">
                        <div class="form-control-wrap">
                            <div class="input-group mb-3">
                                <div class="form-control-wrap">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="customFile" />
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    @if ($errors->has('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>
                                <input type="hidden" name="previousimage" value="{{ $datas->image }}" />

                                <div class="input-group-append">
                                    <span class="p-0" id="basic-addon1">
                                    <img src="{{ asset($datas->image) }}" class="img-thumbnail ml-2" width="30" /></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="form-label col-md-3" for="description">Series Description<span  class="required text-danger">*</span></label>
                    <div class="col-md-9">
                        <div class="form-control-wrap">
                            <textarea name="description" value="" rows="5" cols="40" class="form-control tinymce-editor" placeholder="Enter Description For Series">{{$datas->description}}</textarea>
                            @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="form-label col-md-3" for="slug">Series Slug</label>
                    <div class="col-md-9">
                        <div class="form-control-wrap">
                            <input class="form-control " type="text" name="slug" value="{{$datas->slug}}" />
                            @if ($errors->has('slug'))
                            <span class="text-danger">{{ $errors->first('slug') }}</span>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <label  for="status" class="form-label col-md-3 ">Status</label>

                    <div class="col-md-9">
                        <div class="form-control-wrap">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input {{ $errors->has('status')?'is-invalid':'' }}" type="radio" id="Active" name="status" value="1" {{ ($datas['status'] == "1" )? 'checked' : ""  }}  />
                                <label class="custom-control-label" for="Active">Active</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input {{ $errors->has('status')?'is-invalid':'' }}" type="radio" id="InActive" name="status" value="0" {{ ($datas['status'] == "0" )? 'checked' : ""  }} />
                                <label class="custom-control-label" for="InActive">Inactive</label>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <label  for="status" class="form-label col-md-3 "><span>&nbsp;</span></label>
                    <div class="col-md-9">
                        <button type="submit" class="btn btn-lg btn-primary btn-xs ">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
