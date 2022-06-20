@extends('admin.layouts.master') @section('content')

<div class="row">
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title">
            Page- Add New<a href="{{route('page.create')}}" class="btn btn-secondary btn-rounded float-right"> <em class="icon ni ni-chevrons-left"></em> Back</a>
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


            <form class="mb-5" action="{{ route('page.store') }}" method="POST" id="question-form" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="pb-4">

                    <div class="form-group row">
                        <label class="form-label col-md-3" for="file">Title</label>
                        <div class="col-md-9">
                           <input type=" text" class="form-control" name="title" placeholder="Enter Title" >
                           @if ($errors->has('title'))
                           <span class="text-danger">{{ $errors->first('title') }}</span>
                           @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-md-3" for="file">Slug</label>
                        <div class="col-md-9">
                           <input type="text" class="form-control" name="slug" placeholder="Enter Slug" >
                           @if ($errors->has('slug'))
                           <span class="text-danger">{{ $errors->first('slug') }}</span>
                           @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-md-3" for="inputEmail4">Page Content<span  class="required text-danger">*</span></label>
                        <div class="col-md-9">
                            <textarea name="page_content"  class="form-control tinymce-editor"></textarea>
                            @if ($errors->has('page_content'))
                            <span class="text-danger">{{ $errors->first('page_content') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="form-label col-md-3" for="inputEmail4">Page Banner Image<span  class="required text-danger">*</span></label>
                        <div class="col-md-9">
                           <input type="file" class="form-control" name="page_banner_image">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="form-label col-md-3" for="file">Meta Title</label>
                        <div class="col-md-9">
                           <input type=" text" class="form-control" name="meta_title" placeholder="Enter Meta Title" >
                           @if ($errors->has('meta_title'))
                           <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                           @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-md-3" for="file">Meta Keywords</label>
                        <div class="col-md-9">
                           <input type="text" class="form-control" name="meta_keywords" placeholder="Enter Meta Keywords" >
                           @if ($errors->has('meta_keywords'))
                           <span class="text-danger">{{ $errors->first('meta_keywords') }}</span>
                           @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="form-label col-md-3" for="file">Meta Description</label>
                        <div class="col-md-9">
                           <input type="text" class="form-control" name="meta_description" placeholder="Enter Meta Description" >
                           @if ($errors->has('meta_description'))
                           <span class="text-danger">{{ $errors->first('meta_description') }}</span>
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
                                <input class="custom-control-input {{ $errors->has('status')?'is-invalid':'' }}" type="radio" name="status" value="0" id="status_inactive" />
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
