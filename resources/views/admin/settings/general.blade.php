@extends('admin.layouts.master')
@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="">
                    <!-- .nk-block -->

                    <!-- .nk-block -->
                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h4 class="title nk-block-title">Settings</h4>
                                <div class="nk-block-des">
                                </div>
                            </div>
                        </div>
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="card-head">
                                    <h5 class="card-title">Website Setting</h5>
                                </div>
                                <form method="POST" action="{{ route('setting.generalUpdate') }}" id="create" enctype="multipart/form-data" class="gy-3">
                                    @csrf
                                    <div class="form-horizontal">
                                        <input type="hidden" name="id" value="{{ @$data->id }}" />

                                        <div class="form-group row">
                                            <label class="control-label col-md-4 required">Name</label>
                                            <div class="col-md-8"><input type="text" value="{{ @$data->name}}" name="name" class="form-control" /></div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-4 required">Title</label>
                                            <div class="col-md-8"><input type="text" value="{{ @$data->title }}" class="form-control" name="title" /></div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-4 required">Description</label>
                                            <div class="col-md-8"><textarea class="form-control tinymce-editor" name="description">{{ @$data->description }}</textarea></div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-4 required">Email</label>
                                            <div class="col-md-8"><input type="text" value="{{ @$data->email }}" class="form-control" name="email" /></div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-4 required">Address</label>
                                            <div class="col-md-8"><textarea  class="form-control tinymce-editor " name="address" value="">{{ @$data->address }}</textarea></div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-4 required">Footer Text</label>
                                            <div class="col-md-8"><input type="text" class="form-control" name="footer_text" value="{{ @$data->footer_text }}"></div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-4">Logo</label>
                                            <div class="col-md-8"><input type="file" class="form-control" name="logo" />
                                                @if(isset($data->logo) && !empty($data->logo))
                                                <img src="{{ asset($data->logo) }}" height="50px">
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-4">Favicon</label>
                                            <div class="col-md-8"><input type="file" class="form-control" name="favicon" />
                                                @if(isset($data->favicon) && !empty($data->favicon))
                                                <img src="{{ asset($data->favicon) }}" height="30px">
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-4 required">Phone No</label>
                                            <div class="col-md-8"><input type="text" value="{{ @$data->phone_no }}" class="form-control" name="phone_no" /></div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-4 required">Landline</label>
                                            <div class="col-md-8"><input type="text" value="{{ @$data->landline }}" class="form-control" name="landline" /></div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-4 required">Website</label>
                                            <div class="col-md-8"><input type="text" value="{{ @$data->website }}" class="form-control" name="website" /></div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="control-label col-md-4 required">Facebook</label>
                                            <div class="col-md-8"><input type="text" value="{{ @$data->facebook }}" class="form-control" name="facebook" /></div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-4 required">Twitter</label>
                                            <div class="col-md-8"><input type="text" value="{{ @$data->twitter }}" class="form-control" name="twitter" /></div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-4 required">Linkedin</label>
                                            <div class="col-md-8"><input type="text" value="{{ @$data->linkedin }}" class="form-control" name="linkedin" /></div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-4 required">Youtube</label>
                                            <div class="col-md-8"><input type="text" value="{{ @$data->youtube }}" class="form-control" name="youtube" /></div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-4 required">Pinterest</label>
                                            <div class="col-md-8"><input type="text" value="{{ @$data->pinterest }}" class="form-control" name="pinterest" /></div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-4 required">Instagram</label>
                                            <div class="col-md-8"><input type="text" value="{{ @$data->instagram }}" class="form-control" name="instagram" /></div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-4 required">Whatsapp</label>
                                            <div class="col-md-8"><input type="text" value="{{ @$data->whatsapp }}" class="form-control" name="whatsapp" /></div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-4 required">Cokkies Eanabled ?</label>
                                            <div class="col-md-8">
                                                <select class="form-control select_2" name="is_cookies_enabled">
                                                    <option value="1" {{ (@$data->is_cookies_enabled == 1)?'selected':'' }} >Yes</option>
                                                    <option value="0" {{ (@$data->is_cookies_enabled == 0)?'selected':'' }} >No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-4 required">Cookies Message</label>
                                            <div class="col-md-8"><textarea class="form-control tinymce-editor" name="cookies_message"> {{ @$data->cookies_message }}</textarea></div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-4 required">Header Script</label>
                                            <div class="col-md-8"><textarea class="form-control tinymce-editor" name="header_script">{{ @$data->header_script }}</textarea></div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-4 required">Footer Script</label>
                                            <div class="col-md-8"><textarea class="form-control tinymce-editor" name="footer_script">{{ @$data->footer_script }}</textarea></div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-4 required">Meta Title</label>
                                            <div class="col-md-8"><input type="text" value="{{ @$data-> meta_title}}" class="form-control" name="meta_title" /></div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-4 required">Meta Description</label>
                                            <div class="col-md-8"><input type="text" value="{{ @$data->meta_description }}" class="form-control" name="meta_description" /></div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-4 required">Meta Keywords</label>
                                            <div class="col-md-8"><input type="text" value="{{ @$data->meta_keywords }}" class="form-control" name="meta_keywords" /></div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-4 required">Prime Amount</label>
                                            <div class="col-md-8"><input type="text" value="{{ @$data->primeamount }}" class="form-control" name="primeamount" /></div>
                                        </div>

                                        {{-- <div class="form-group row">
                                            <label class="control-label col-md-4 required">Razorpay-ID</label>

                                            <div class="col-md-8"><input type="text" value="{{ @$data->razorpay_id }}" class="form-control" name="razorpay_id" /></div>
                                        </div> --}}


                                        <div class="form-group row">
                                            <label class="control-label col-md-4"></label>
                                            <div class="col-md-8">
                                                <button type="submit" class="btn btn-dark m-r-5 m-b-5 ladda-button" data-color="mint" data-style="expand-right" data-size="l">
                                                    <span class="ladda-label">Submit</span><span class="ladda-spinner"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- card -->
                    </div><!-- .nk-block -->
                </div><!-- .components-preview -->
            </div>
        </div>
    </div>
</div>
@endsection
