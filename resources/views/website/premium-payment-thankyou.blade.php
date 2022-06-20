@extends('website.Layout.master') @section('meta_title')
<!-- Fav Icon  -->
<!-- Page Title  -->
<title>Payment Success Page | IAS STUDY HUB</title>
<!-- StyleSheets  -->
<style type="text/css">
    .table-responsive > .table-bordered {
        border: 1px solid #dbdfea !important;
    }
</style>
@endsection
 @section('content')
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered card-stretch">
                        <div class="card-inner-group">
                            <!-- .card-inner -->
                            <!-- .card-inner -->
                            <div class="card-inner">
                                <div class="g-3">
                                    <div class="main-contents">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-lg table-striped">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2" class="text-center font-24 text-primary text-uppercase">Payment Completed</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>Order ID</th>
                                                        <td>{{$decrypted_id}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Product Name</th>
                                                        <td>Premium For 1 Year</td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td class="text-right">Amount</td>
                                                        <td class="text-success font-24"><b>&#8377;{{@$globalSettings->primeamount}}</b></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="text-center w-100 d-block my-3" >
                                        <a href="{{url()->previous()}}" class="btn btn-primary btn-sm text-center">Back</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .card-inner-group -->
                        </div>
                        <!-- .card -->
                    </div>
                    <!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
