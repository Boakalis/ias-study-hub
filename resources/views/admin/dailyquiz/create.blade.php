@extends('admin.layouts.master') @section('content')

<div class="row">
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title">
            Quiz Management <a href="{{route('daily_quiz')}}" class="btn btn-secondary btn-rounded float-right"> <em class="icon ni ni-chevrons-left"></em> Back</a>
        </h3>
    </div>
</div>
@foreach (['danger', 'warning', 'success', 'info'] as $msg) @if(Session::has('alert-' . $msg))
<div class="alert alert-success alert-dismissible fade show alert-{{ $msg }}" role="alert">
    <strong></strong>{{ Session::get('alert-' . $msg) }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
</div>
@endif @endforeach @if (Session::has('error_message'))
<div class="alert alert-danger fade show" role="alert">
    {{Session::get('error_message')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="card">
    <div class="card-inner">
        <div class="card-head justify-content-center pb-5">
            <h5 class="justify-content-center">Add Quiz</h5>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                @foreach ($errors->all() as $error)
                <li py-2>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form class="mb-5" action="{{ route('store_daily_quiz') }}" method="POST" id="test-form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label" for="name">Test Name</label>
                        <div class="form-control-wrap">
                            <input type="text" name="name" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label" for="name">Test Duration (in minutes)</label>
                        <div class="form-control-wrap">
                            <input type="text" name="duration" class="form-control" />
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label" for="phone-no-1">Select Date</label>
                        <div class="form-control-wrap">
                            <input class="form-control" data-date-format="yyyy-mm-dd" type="text" name="date" id="quizdate" />
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-label" for="name">Mark</label>
                        <div class="form-control-wrap">
                            <input type="text" name="mark" class="form-control" />
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <label for="status" class="d-block">Status</label>

                    <div class="custom-control custom-radio">
                        <input class="custom-control-input {{ $errors->has('status')?'is-invalid':'' }}" type="radio" id="Active" name="status" checked value="1" />
                        <label class="custom-control-label" for="Active">Active</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input {{ $errors->has('status')?'is-invalid':'' }}" type="radio" id="InActive" name="status" value="0" />
                        <label class="custom-control-label" for="InActive">Inactive</label>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label" for="name">Negative mark</label>
                        <div class="form-control-wrap">
                            <input type="text" name="negativemark" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label" for="name">Slug </label>
                        <div class="form-control-wrap">
                            <input type="text" name="slug" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-md btn-primary">Save </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection @section('javascript')
<script>
    $("#quizdate").datepicker().datepicker("setDate", new Date());
</script>
@endsection
