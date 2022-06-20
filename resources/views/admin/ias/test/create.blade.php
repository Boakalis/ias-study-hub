@extends('admin.layouts.master') @section('content')
<div class="row">
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title">
            Test Management - Add Test<a href="{{route('test')}}" class="btn btn-secondary btn-rounded float-right"> <em
            class="icon ni ni-chevrons-left"></em> Back</a>
        </h3>
    </div>
</div>
@include('admin.layouts.error')

<div class="card">
    <div class="card-inner">

        <form class="mb-5" action="{{ route('store_test') }}" method="POST" id="test-form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="">

                <div class="form-group row">
                    <label class="form-label col-md-3" for="name">Test Name<span  class="required text-danger">*</span></label>
                    <div class="col-md-9">
                        <div class="form-control-wrap">
                            <input type="text" name="name" class="form-control" />
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="form-label col-md-3" for="batch">Select Batch<span  class="required text-danger">*</span></label>
                    <div class="col-md-9">
                        <div class="form-control-wrap">
                            <select class="form-select " data-search="on" name="batch_id" id="batch">
                                @foreach ($batch as $value)

                                <option value="{{$value['id']}}">{{$value->series['name']}}--{{$value['name']}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('batch_id'))
                            <span class="text-danger">{{ $errors->first('batch_id') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="form-label col-md-3" for="duration">Test Duration (in minutes)<span  class="required text-danger">*</span></label>
                    <div class="col-md-9">
                        <div class="form-control-wrap">
                            <input type="text" name="duration" class="form-control" />
                            @if ($errors->has('duration'))
                            <span class="text-danger">{{ $errors->first('duration') }}</span>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="form-label col-md-3" for="mark">Mark<span  class="required text-danger">*</span></label>
                    <div class="col-md-9">
                        <div class="form-control-wrap">
                            <input type="text" name="mark" class="form-control" />
                            @if ($errors->has('mark'))
                            <span class="text-danger">{{ $errors->first('mark') }}</span>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="form-label col-md-3" for="negativemark">Negative mark<span  class="required text-danger">*</span></label>
                    <div class="col-md-9">
                        <input type="text" name="negativemark" value="0.6" class="form-control" />
                        @if ($errors->has('negativemark'))
                        <span class="text-danger">{{ $errors->first('negativemark') }}</span>
                        @endif

                    </div>
                </div>

                <div class="form-group row">
                    <label class="form-label col-md-3" for="startdate">Start Date<span  class="required text-danger">*</span></label>
                    <div class="col-md-9">
                        <input type="text" name="start_date"  data-date-format="yyyy-mm-dd" class="form-control date-picker" placeholder="Enter Starting Date" />
                        @if ($errors->has('start_date'))
                        <span class="text-danger">{{ $errors->first('start_date') }}</span>
                        @endif
                    </div>
                </div>



                <div class="form-group row">
                    <label class="form-label col-md-3" for="type">Select Type<span  class="required text-danger">*</span></label>
                    <div class="col-md-9">
                        <div class="form-control-wrap">
                            <select class="form-control" data-search="on" name="type" id="batch">
                                <option value="0">Free</option>
                                <option value="1">Paid</option>
                            </select>
                            @if ($errors->has('type'))
                            <span class="text-danger">{{ $errors->first('type') }}</span>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="form-label col-md-3" for="slug">Slug </label>
                    <div class="col-md-9">
                        <div class="form-control-wrap">
                            <input type="text" name="slug" class="form-control" />
                            @if ($errors->has('slug'))
                            <span class="text-danger">{{ $errors->first('slug') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="status" class=" form-label col-md-3">Status</label>
                    <div class="col-md-9">
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input {{ $errors->has('status')?'is-invalid':'' }}" type="radio" id="Active" name="status" checked value="1" />
                            <label class="custom-control-label" for="Active">Active</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input {{ $errors->has('status')?'is-invalid':'' }}" type="radio" id="InActive" name="status" value="0" />
                            <label class="custom-control-label" for="InActive">Inactive</label>
                        </div>
                    </div>

                </div>


                <div class="form-group row">
                    <label for="status" class=" form-label col-md-3"></label>
                    <div class="col-md-9">
                        <button type="submit" class="btn btn-lg btn-primary btn-xs">Add</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

