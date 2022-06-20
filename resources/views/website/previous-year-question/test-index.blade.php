   @extends('website.Layout.master')
@section('meta_title')
 <!-- Fav Icon  -->
 <!-- Page Title  -->
@endsection
@section('title',$subject->category.'-'.''.'Previous Year Question')

@section('content')
<?php  use Illuminate\Support\Facades\Crypt; ?>

<div class="nk-content bg-white"  >
    @if ($subject->subject['isFree'] == 1)
    {{--<div class="alert alert-info alert-dismissible fade show" role="alert">

        <center><h5 class=" text-danger text-uppercase text-center flashit" style="justify-content: center;margin:0%;" >Limited Period Offer !!!.</h5> <span class="text-success text-uppercase"  > Access &nbsp; <span style="text-decoration: underline;" >{{$subject->subject['name']}}</span>  Course free</span>
        </center>

    </div>--}}

    @endif
     {{--<div class="nk-block-head nk-block-head-md">
        <div class="nk-block-between">
            <div class="nk-block-head-content col-lg-12 px-0 ">
                <h4 class="nk-block-title text-uppercase float-left ">{{$subject->category}} </h4>
                    <a href="{{url()->previous()}}" class="float-right " ><em class="icon ni ni-arrow-left backarrow"></em> </a>

            </div>
        </div>
    </div>--}}
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="row">
                        <div class="col-xl-4 p-1">

                            <div class="card card-bordered">
                                @if(isset($subject->subject->image) && !empty($subject->subject->image))
                                    <img style="" src="{{asset($subject->subject->image)}}" class="card-img-top" />
                                @else
                                    <img style="" src="{{asset('images/others/testseries-1.jpg')}}" class="card-img-top" />
                                @endif
                                {{-- <div class="card-inner card-sm p-1">
                                    <div class="block">
                                        <span class="float-left font-weight-bold text-danger"><em class="icon ni ni-file-fill"></em><span> {{$datas->count()}} TESTS</span></span>@if ($remaining_date  != -1)
										<button class="btn btn-sm dark float-right">Days Left : {{365-($remaining_date)}}</button>
										@endif
									</div>
                                    <div class="clear"></div>
                                    @if ($subject->subject['isFree'] == 1)
                                    <span>&nbsp;</span>
                                    @else
									@if ($subscribe_check == 0) --}}

                                        {{-- <div class="alert alert-success mt-3 mb-3 text-center">
                                            <span class="text-uppercase font-weight-bold">Buy {{$subject->subject['name']}} <br> ₹{{$subject->subject['price']}}  /-</span><br>
                                            <span class="text-uppercase text-danger font-weight-bold">Special Offer <br> Buy All @  ₹{{ $discounted_amount = intval($sumofamount - (($sumofamount)*0.40))}}/-</span>
                                        </div> --}}
                                        {{-- <a class="btn btn-block btn-readical-red text-white pay_now text-uppercase btn-lg" href="javascript:void(0)" data-batch-id="{{$subject->subject['id']}}"  data-amount="{{$subject->subject['price']}}" data-id="{{(Auth::user()==null)? "" : (Auth::User()->id) }}"><i class="fas fa-shopping-cart"></i>&nbsp;Buy Now</a> --}}
										{{-- <a class="btn btn-block btn-primary pay_all_now text-uppercase btn-lg" href="javascript:void(0)" data-batch-id="{{$subject->subject['id']}}" data-amount="{{$discounted_amount}}" data-id="{{(Auth::user()==null)? "" : (Auth::User()->id) }}">PURCHASE ALL</a> --}}
                                    {{-- @else
                                        <button class="btn btn-block btn-primary ">Purchased</button>

                                    @endif
                                    @endif
                                    <a href="https://api.whatsapp.com/send?phone=916385752831"
                                    class="btn btn-block btn-outline-success text-uppercase text-uppercase"  target="_blank"> <i
                                        class="fab fa-whatsapp fa-lg "></i> &nbsp; +916385752831 </a>

								</div> --}}
							</div>


						</div><!-- .col -->
                        <div class="col-xl-8 p-1">
                            <div class="card bg-transparent test-details-page">
                                <div class="card-inner card-inner-md p-1" >
                                    <a href="{{url()->previous()}}" class="float-right " ><em class="icon ni ni-arrow-left backarrow"></em> </a>

                                    @include('admin.layouts.error')

                                    <ul class="nav nav-tabs">

                                        <li class="nav-item">
                                            <a class="nav-link active  text-uppercase pl-0 py-0 pb-1" data-toggle="tab" href="#testtab"><em class="icon ni ni-file-edit"></em><span>TEST DETAILS</span></a>
										</li>

									</ul>
                                    <div class="tab-content">

                                        <div class="tab-pane active" id="testtab">
                                            <div class="nk-data data-list">
                                                <ul class="sp-pdl-list">
                                                    @foreach ($datas as $key => $data)
                                                <li class="sp-pdl-item">
                                                    <div class="sp-pdl-desc">

                                                        @if ($data->type==0)
                                                            <div class="sp-pdl-img"><em class="icon ni ni-play-circle font-35 text-primary"></em></div>
                                                            <div class="sp-pdl-info">
                                                            <h6 class="sp-pdl-title"><a href="{{route('previousYearTestIndex',['category' => $subject->subject->slug,'sub_category' => $subject->slug,'test_slug' => $data->slug])}}" class="sp-pdl-name {{Auth::check()?'':'test_attend'}}  text-dark">{{$data->name}}</a>
                                                            <span class="badge badge-dim badge-primary badge-pill">Free</span>
                                                        @else
                                                            <div class="sp-pdl-img"><em class="icon ni     ni-play-circle font-35 text-primary"></em></div>
                                                            <div class="sp-pdl-info">
                                                                @if ($subscribe_check == 1)
                                                                <h6 class="sp-pdl-title"><a href="{{route('previousYearTestIndex',['category' => $subject->subject->slug,'sub_category' => $subject->slug,'test_slug' => $data->slug])}}" class="sp-pdl-name  text-dark ">{{$data->name}}</a>
                                                                    <span class="badge badge-dim badge-primary badge-pill">Free</span>

                                                                @else
                                                                <h6 class="sp-pdl-title"><a class="sp-pdl-name text-uppercase pay_now text-dark" href="javascript:void(0)"    data-batch-id="{{$subject->subject['id']}}" data-amount="{{ $subject->subject['price']}}" data-id="{{(Auth::user()==null)? "" : (Auth::User()->id) }}">{{$data->name}}</a>
                                                                    <span class="badge badge-dim badge-primary badge-pill">Paid Test</span>

                                                                @endif
                                                        @endif
                                                            </h6>
                                                            <div class="sp-pdl-meta">
                                                                <span class="release">
																	@if(Auth::user())
																		@if ($data->type==0)
																			@if($data->getTestReports->count() != 0)
																				{{-- <span class="mt-1 badge badge-pill badge-outline-primary"> Attempt {{ $data->getTestReports->count() }}</span> --}}
																			@endif
																		@elseif ($subscribe_check ==1)
																			<span class="text-soft">Subscribed: </span> <span>Yes</span>
																		@else
																			<span class="text-soft">Subscribed: </span> <span>No</span>
																		@endif
																	@endif
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sp-pdl-btn">
                                                        @if ($data->type==0)
                                                            <a href="{{route('previousYearTestIndex',['category' => $subject->subject->slug,'sub_category' => $subject->slug,'test_slug' => $data->slug])}}" class=" {{Auth::check()?'':'test_attend'}} btn btn-primary text-uppercase">Take Test</a>
                                                        @elseif($subscribe_check ==1)
                                                            <a href="{{route('previousYearTestIndex',['category' => $subject->subject->slug,'sub_category' => $data->slug,'test_slug' => $data->slug])}}" class="btn btn-primary text-uppercase">Take Test</a>
                                                        @else
                                                            <a class="btn btn-danger text-uppercase pay_now"  style="color: white" data-batch-id="{{$subject->subject['id']}}" data-amount="{{ $subject->subject['price']}}" data-id="{{(Auth::user()==null)? "" : (Auth::User()->id) }}"><i class="fas fa-shopping-cart"></i>&nbsp;Buy</a>
                                                        @endif
                                                    </div>
                                                </li>


												@endforeach
											</ul>
										</div><!-- data-list -->
									</div>

								</div>



							</div>
						</div>
					</div><!-- .col -->

				</div><!-- .row -->
			</div>
		</div>
	</div>
</div>
</div>

<div class="modal fade" tabindex="-1" id="paymentModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header" style="align-self: center">
                    <h5 class="text-uppercase">Select Course</h5>
                </div>

                <div class="modal-body">
                    <form action="#" id="form_calc" class="form-validate is-alter">

                    <span class="text-danger" id="alert" style="display: none"><i class="fas fa-info-circle"></i>&nbsp;Atleast Select One Course</span>
                    <div id="contentdiv"></div>
                    <input type="hidden" id="course_ids" data-value="" value="">
                    <input type="hidden" id="course_price" value="">
                </div>

                <div class=" text-center bg-success">
                    <center>
                        <button id="price" type="submit" style=" width:100%; cursor: pointer"
                            class="text-dark pt-3 pb-3 text-center btn-success sub-text">Pay Rs.&nbsp;<span>0</span>/-
                        </button>
                    </center>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('javascript')
@auth()
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    jQuery(document).ready(function ($) {

        $("#form_calc").change(function () {

            var totalPrice = 0,
                values = [];
            ids = [];
            $('input[type=checkbox], input[type=radio]').each(function () {
                if ($(this).is(':checked')) {
                    values.push($(this).attr('data-price'));
                    ids.push($(this).val());
                    totalPrice += parseInt($(this).attr('data-price'));
                }
            });
            $("#price span").text(totalPrice);
            $('#course_price').val(totalPrice);
            $('#course_ids').data('value', ids);
        });

    });

</script>

{{-- display a show modal) --}}
<script>
    $(document).on("click", ".pay_now", function (event) {
        $('#course_ids').val('');
        $('#course_price').val('');
        $("#price span").text('0');
        let href = "{{route('pyq-course-list')}}";
        var emailCheck = '{{!empty(Auth::user()->email)?'200':'400'}}'
        var phoneCheck = '{{!empty(Auth::user()->phone)?'200':'400'}}'
        if ( phoneCheck == 400 || emailCheck == 400 )  {
            $('#profileDetailError').html("");
            document.getElementById('profileDetailsForm').reset();
            $('#profileDetailsModal').modal('show')
         }else{

        $.ajax({
            url: href,
            // return the result
            success: function (result) {
                $("#paymentModal").modal("show");
                document.getElementById('contentdiv').innerHTML = "";
                var result = (result.html);
                var indexdiv = $('#contentdiv'); //create wrapper element
                indexdiv.append(result); //move element into wrapper
                $("#contentdiv").html(result).append();
            },
            complete: function () {
                $("#loader").hide();
            },
            error: function (jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $("#loader").hide();
            },
            timeout: 8000,
        });
         }
    });

</script>




<script>
    var SITEURL = '{{URL::to('/')}}';
    $('#form_calc').on('submit', function (e) {
        e.preventDefault();
        checked = $("input[type=checkbox]:checked").length;
        if (!checked) {
            $('#alert').show()
            $('#alert').fadeOut(2000)
            return false;
        }
        $("#paymentModal").modal('hide');
        var totalAmount = $('#course_price').val();
        var batchid = $('#course_ids').data('value');
        var course_id = 3;
        var id = $(this).attr("data-id");
        var order_id = '';
        // var encrypted_id = '{{Crypt::encryptString($subject->id)}}';
        // console.log(batchid);
        $.ajax({
            url: '{{ route('checkboxMethodPayment')}}',
            type: 'post',
            data: {
                '_token': '{{csrf_token()}}',
                'totalAmount': totalAmount,
                'batch_id': batchid,
                'course_id': course_id,
            },
            success: function (response) {
                if (response.status == 200) {
                    order_id = response.payment.order_id;

                }
                if (response.status === 666) {
                    Swal.fire({
                        text: 'Our Secutiy System Detected something strange.',
                        imageUrl: SITEURL+'/images/ban.jpg',
                        imageWidth: 500,
                        imageHeight: 400,
                        imageAlt: 'SECURITY BREACH',
                    });
                    location.reload(true);
                }
            }
        });


        var options = {
            "key": "{{Config::get('app.razorpay_key')}}",
            "amount": (totalAmount * 100), // 2000 paise = INR 20
            "currency": "INR",
            "email": "{{Auth::user()->email}}",
            "name": "{{ Auth::User()->name }}",
            "image": "{{ asset(@$globalSettings->logo) }}",
            "handler": function (response) {
                $("#loader").show();
                $.ajax({
                    url: "{{route('buyAnyPYQ')}}",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        'payment_id': response.razorpay_payment_id,
                        'amount': totalAmount,
                        'response': response,
                        'batch_id': batchid,
                        '_token': '{{csrf_token()}}',
                        'order_id': order_id,
                        'course_id': 3,
                    },
                    success: function (msg) {
                        if (msg.status == true) {
                            $('#payment-loader').css('display', 'none')
                            window.location.href = msg.thankyou;
                        }
                        if (msg.status === 666) {
                    Swal.fire({
                        text: 'Our Secutiy System Detected something strange.',
                        imageUrl: SITEURL+'/images/ban.jpg',
                        imageWidth: 500,
                        imageHeight: 400,
                        imageAlt: 'SECURITY BREACH',
                    });
                    location.reload(true);
                }
                    }
                });
            },
            "prefill": {
                "contact": '{{ Auth::user()->phone }}',
                "email": '{{ Auth::user()->email }}'
            },
            "theme": {
                "color": '#B94A5D'
            }
        };
        var rzp1 = new Razorpay(options);

        rzp1.open();

        rzp1.on('payment.failed', function (response) {
            var err = (response.error);

            $.ajax({
                url: "{{route('payfailure')}}",
                type: 'post',
                data: {
                    payment_id: response.razorpay_payment_id,
                    amount: totalAmount,
                    response: response.error,
                    batch_id: batchid,
                    order_id: order_id,
                    _token: '{{csrf_token()}}',
                    course_id: 3,
                },

            });

        });
    });

    $('.pay_all_now').on('click', function () {

        var totalAmount = $(this).attr("data-amount");
        var batchid = "PREMIUM";
        var course_id = 2;
        var id = $(this).attr("data-id");
        var order_id = '';
        var encrypted_id = '{{Crypt::encryptString($subject->id)}}';
        $.ajax({
            url: '{{ route('createOrder')}}',
            type: 'post',
            data: {
                '_token': '{{csrf_token()}}',
                'totalAmount': totalAmount,
                'batch_id': batchid,
                'course_id': course_id,
            },
            success: function (response) {
                if (response.status == 200) {
                    order_id = response.payment.order_id;

                }
            }
        });


        var options = {
            "key": "{{Config::get('app.razorpay_key')}}",
            "amount": (totalAmount * 100), // 2000 paise = INR 20
            "currency": "INR",
            "name": "{{ Auth::User()->name }}",
            "image": "{{ asset('/images/logo.png') }}",
            "handler": function (response) {
                $("#loader").show();
                $.ajax({
                    url: SITEURL + '/payment/pay-success',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        'payment_id': response.razorpay_payment_id,
                        'amount': totalAmount,
                        'response': response,
                        'batch_id': batchid,
                        '_token': '{{csrf_token()}}',
                        'order_id': order_id,
                        'course_id': 2,
                    },
                    success: function (msg) {
                        if (msg.status == true) {
                            $('#payment-loader').css('display', 'none')
                            window.location.href = msg.thankyou;
                        } else if (msg.banned == 1) {
                            Swal.fire({
                                text: 'Our Secutiy System Detected something strange.',
                                imageUrl: SITEURL + '/images/ban.jpg',
                                imageWidth: 500,
                                imageHeight: 400,
                                imageAlt: 'SECURITY BREACH',
                            })
                        }
                    }
                });

            },
            "prefill": {
                "contact": '{{ Auth::user()->phone }}',
                "email": '{{ Auth::user()->email }}'
            },
            "theme": {
                "color": '#B94A5D'
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();

        rzp1.on('payment.failed', function (response) {
            var err = (response.error);

            $.ajax({
                url: SITEURL + '/payment/pay-failure',
                type: 'post',
                data: {
                    payment_id: response.razorpay_payment_id,
                    amount: totalAmount,
                    response: response.error,
                    batch_id: batchid,
                    order_id: order_id,
                    _token: '{{csrf_token()}}',
                    course_id: 2,
                },

            });

        });
    });

</script>
@endauth

<script>
    var url = window.location.href;

    if (url.search("razorpay") >= 0) {
        $('.pay_now').click();
    }
 </script>

  <script>
    var url = window.location.href;

    if (url.search("payment_gateways") >= 0) {
        $('.pay_all_now').click();
    }
 </script>

<script>
    $(window).on("load", function () {
        Tawk_API.onLoad = function(){
Tawk_API.hideWidget();
};
    });
</script>

@endsection
