@extends('website.Layout.master')
@section('meta_title')
 <!-- Fav Icon  -->
 <!-- Page Title  -->
 <title>MYORDERS | IAS STUDYHUB</title>
@endsection
@section('content')
<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-aside-wrap">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head nk-block-head-lg">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h4 class="nk-block-title">My Orders #746F5K2</h4>

                                        </div>

                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">

                                    <div class="invoice">
                                        <div class="invoice-action">
                                            <a class="btn btn-icon btn-lg btn-white btn-dim btn-outline-primary" href="#" target="_blank"><em class="icon ni ni-printer-fill"></em></a>
                                        </div><!-- .invoice-actions -->
                                        <div class="invoice-wrap">
                                            <div class="invoice-brand text-center">
                                                <img src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="">
                                            </div>
                                            <div class="invoice-head">
                                                <div class="invoice-contact">
                                                    <span class="overline-title">Invoice To</span>
                                                    <div class="invoice-contact-info">
                                                        <h4 class="title">Rajkumar D</h4>
                                                        <ul class="list-plain">
                                                            <li><em class="icon ni ni-map-pin-fill"></em><span>No-1, Adyar, Chennai - 600001</span></li>
                                                            <li><em class="icon ni ni-call-fill"></em><span>+91 9876543210</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="invoice-desc">
                                                    <h3 class="title">Invoice</h3>
                                                    <ul class="list-plain">
                                                        <li class="invoice-id"><span>Invoice ID</span>:<span>746F5K2</span></li>
                                                        <li class="invoice-date"><span>Date</span>:<span>26 Jan, 2021</span></li>
                                                    </ul>
                                                </div>
                                            </div><!-- .invoice-head -->
                                            <div class="invoice-bills">
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead class="thead-dark" >
                                                            <tr>
                                                                <th scope="col" >Item ID</th>
                                                                <th scope="col" >Description</th>
                                                                <th scope="col" >Price</th>
                                                                <th scope="col" >Qty</th>
                                                                <th scope="col" >Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>24108054</td>
                                                                <td>Test Series</td>
                                                                <td><em class="icon ni ni-sign-inr"></em>40.00</td>
                                                                <td>1</td>
                                                                <td><em class="icon ni ni-sign-inr"></em>200.00</td>
                                                            </tr>

                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="2"></td>
                                                                <td colspan="2">Subtotal</td>
                                                                <td><em class="icon ni ni-sign-inr"></em>435.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"></td>
                                                                <td colspan="2">TAX</td>
                                                                <td><em class="icon ni ni-sign-inr"></em>43.50</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"></td>
                                                                <td colspan="2">Grand Total</td>
                                                                <td><em class="icon ni ni-sign-inr"></em>478.50</td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                    <div class="nk-notes ff-italic fs-12px text-soft"> Invoice was created on a computer and is valid without the signature and seal. </div>
                                                </div>
                                            </div><!-- .invoice-bills -->
                                        </div><!-- .invoice-wrap -->
                                    </div>

                                </div><!-- .nk-block -->
                            </div>
                        </div><!-- .card-aside-wrap -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
<!-- content @e -->
@endsection
