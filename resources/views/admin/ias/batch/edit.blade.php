@extends('admin.layouts.master') @section('content')

<div class="row">
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title text-uppercase ">
            Batch Management - Edit Batch<a href="{{route('batch')}}" class="btn btn-secondary btn-rounded float-right"> <em class="icon ni ni-chevrons-left"></em> Back</a>
        </h3>
    </div>
</div>
@include('admin.layouts.error')
<div class="card">
    <div class="card-inner">
        <form class="mb-5" action="{{ route('update_batch', $datas['id']) }}" method="POST" id="edit-form" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="">

                <div class="form-group row">
                    <label class="form-label col-md-3" for="name">Batch Name<span  class="required text-danger">*</span></label>
                    <div class="col-md-9">
                        <div class="form-control-wrap">
                            <input type="text" name="name" value="{{$datas['name']}}" class="form-control" placeholder="Enter Name" required oninvalid="this.setCustomValidity('Please Enter Batch Name')" oninput="setCustomValidity('')" />
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="form-label col-md-3" for="series">Select Series<span  class="required text-danger">*</span></label>
                    <div class="col-md-9">
                        <div class="form-control-wrap">
                            <select class="form-select" name="series_id" data-search="on">
                                <option value="">Select</option>
                                @foreach ($series as $value)

                                <option value="{{$value['id']}}" {{ ( $datas->series['id'] == $value['id']) ? 'selected' : '' }}>{{$value->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('series_id'))
                            <span class="text-danger">{{ $errors->first('series_id') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="form-label col-md-3" for="price">Price<span  class="required text-danger">*</span></label>
                    <div class="col-md-9">
                        <div class="form-control-wrap input-group mb-3">
                            <input
                            type="text"
                            value="{{$datas['price']}}"
                            class="form-control"
                            placeholder="Enter Price"
                            id="price"
                            name="price"
                            required
                            oninvalid="this.setCustomValidity('Please Enter Price')"
                            oninput="setCustomValidity('')"
                            />
                            <div class="input-group-append">
                                <span class="input-group-text">₹</span>
                            </div>
                        </div>
                        @if ($errors->has('price'))
                        <span class="text-danger">{{ $errors->first('price') }}</span>
                        @endif
                    </div>
                </div>


                <div class="form-group row">
                    <label class="form-label col-md-3" for="discount">Discount<span  class="required text-danger">*</span></label>
                    <div class="col-md-9">
                        <div class="form-control-wrap input-group mb-3">
                            <input type="text" value="{{$datas['discount']}}" class="form-control" placeholder="Enter Discount" id="discount" name="discount" required
                            oninvalid="this.setCustomValidity('Please Enter Discount')" oninput="setCustomValidity('')" />
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                        @if ($errors->has('discount'))
                        <span class="text-danger">{{ $errors->first('discount') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label class="form-label col-md-3" for="description">Batch Description<span  class="required text-danger">*</span></label>
                    <div class="col-md-9">
                        <div class="form-control-wrap">
                            <textarea name="description" id="description" placeholder="Enter your Description" class="form-control tinymce-editor" cols="30" rows="10">{{$datas['description']}}</textarea>
                            @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="form-label col-md-3" for="slug">Starting Date</label>
                    <div class="col-md-9">
                        <div class="form-control-wrap">
                            <input type="text" name="start_date" data-date-format="yyyy-mm-dd" value="{{$datas->start_date}}"  class="form-control date-picker" placeholder="Enter Starting Date" />
                            @if ($errors->has('start_date'))
                            <span class="text-danger">{{ $errors->first('start_date') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="form-label col-md-3" for="schedule">Upload Schedule<span  class="required text-danger">*</span></label>
                    <div class="col-md-9"><div class="form-control-wrap">
                        <input type="file" class="form-control" name="schedule" id="schedule" />
                        @if ($errors->has('schedule'))
                        <span class="text-danger">{{ $errors->first('schedule') }}</span>
                        @endif
                    </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="form-label col-md-3" for="slug">Slug</label>
                    <div class="col-md-9">
                        <div class="form-control-wrap">
                            <input type="text" value="{{$datas['slug']}}" class="form-control" placeholder="Enter Slug" id="price" name="slug" />
                            @if ($errors->has('slug'))
                            <span class="text-danger">{{ $errors->first('slug') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label  for="status" class="form-label col-md-3 ">Status</label>
                    <div class="col-md-9">
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


                <div class="form-group row">
                    <label  for="" class="form-label col-md-3 "></label>
                    <div class="col-md-9">
                        <button type="submit" class="btn btn-lg btn-primary btn-xs ">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
