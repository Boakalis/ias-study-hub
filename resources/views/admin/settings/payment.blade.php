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
                        @include('admin.layouts.error')
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="card-head">
                                    <h5 class="card-title">Payment Setting</h5>
                                </div>
                                <form method="POST" action="{{ route('razorpay-change') }}" id="create" enctype="multipart/form-data" class="gy-3">
                                    @csrf
                                    <div class="form-horizontal">
                                        <input type="hidden" name="id" value="{{ @$datas->id }}" />

                                        <div class="form-group row">
                                            <label class="control-label col-md-4 required">Razorpay-ID</label>


                                            <div class="col-md-8"><input type="text" value="{{ @$datas->razorpay_id }}" class="form-control" name="razorpay_id" /></div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-md-4 required">Razorpay-Secret</label>

                                            <div class="col-md-8"><input type="text" value="{{ @$datas->razorpay_secret }}" class="form-control" name="razorpay_secret" /></div>
                                        </div>


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
