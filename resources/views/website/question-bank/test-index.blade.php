@extends('website.Layout.master')
<?php
 use Carbon\Carbon;
 ?>
@section('meta_title')
 <!-- Fav Icon  -->
 <!-- Page Title  -->
@endsection

@section('title',$subject->subject.'-'.''.'Question Banks')


@section('content')
<?php  use Illuminate\Support\Facades\Crypt; ?>
<div class="nk-content bg-white">
    {{--<div class="nk-block-head nk-block-head-md">
        <div class="nk-block-between">
            <div class="nk-block-head-content col-lg-12 px-0">
                <h4 class="nk-block-title text-uppercase float-left ">{{$subject->subject}} </h4>
                    <a href="{{url()->previous()}}" class="float-right " ><em class="icon ni ni-arrow-left text-light "></em> </a>

            </div>
        </div>
    </div>--}}

    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="row">
                        <div class="col-md-12" id="payment-loader" style="display: none;">
                            <div class="alert alert-primary">
                                <i class="fas fa-spinner fa-pulse"></i> Please wait, Payment is processing. Don't
                                refresh or close the page...
                            </div>
                        </div>
                        <div class="col-xl-4 p-1">

                            <div class="card card-bordered">
                                <img src="{{ asset($categoryimage) }}" class="card-img-top">
                                <div class="card-inner card-sm p-1">

                                    <div class="clear"></div>
                                    @if ($subscribe_check == 0)

                                    {{-- <div class="alert alert-info mt-3 mb-3 text-center">
                                        <span class="text-uppercase font-weight-bold">Buy {{$subject->subject}} <br> ₹{{$subject->price}}  /-</span><br>
                                        <span class="text-uppercase text-danger font-weight-bold">Special Offer <br> Buy All @  ₹{{ $discounted_amount = intval($sumofamount - (($sumofamount)*0.40))}}/-</span>
                                    </div> --}}

                                    <a class="btn btn-block btn-readical-red text-white pay_now text-uppercase " href="javascript:void(0)" data-batch-id="{{$subject->id}}" data-amount="{{$subject->price}}" data-id="{{(Auth::user()==null)? "" : (Auth::User()->id)}}"> BUY &nbsp;{{$subject->subject}}&nbsp;@&nbsp;&#8377;{{$subject->price}}</a>

                                        {{-- <a class=" btn-custom color-3  text-white premium_now text-uppercase btn-sm" href="javascript:void(0)" data-batch-id="{{$subject->id}}" data-amount="{{$subject->price}}" data-id="{{(Auth::user()==null)? "" : (Auth::User()->id)}}">VIEW PREMIUM BENEFITS</a> --}}

                                    {{-- <a class="btn btn-block btn-primary pay_all_now text-uppercase btn-lg" href="#" data-batch-id="{{$subject->id}}" data-amount="{{$discounted_amount}}" data-id="{{(Auth::user()==null)? "" : (Auth::User()->id)}}">Purchase ALL</a> --}}
                                    @elseif (Auth::user()->is_prime == 1 &&  Carbon::parse(Auth::user()->prime_start_date)->diffInDays(Carbon::now()) <= 365 )
                                    <a href="javascript:void(0)" class="btn btn-block btn-secondary "  >PREMIUM PLAN  </a>
                                    <span class="badge badge-dim-outline badge-outline-primary" >{{  365- Carbon::parse(Auth::user()->prime_start_date)->diffInDays(Carbon::now()) }}</span> Days Left

                                    @else
                                    <a href="javascript:void(0)" class="btn btn-block btn-primary "  >Purchased</a>
                                    @endif
                                    <a href="https://api.whatsapp.com/send?phone=916385752831"
                                    class="btn btn-block btn-outline-success text-uppercase text-uppercase"  target="_blank"> <i
                                        class="fab fa-whatsapp fa-lg "></i> &nbsp; +916385752831 </a>


                                </div>
                            </div>


                        </div><!-- .col -->
                        <div class="col-xl-8 p-1">
                            <div class="card bg-transparent">
                                <div class="card-inner card-inner-md p-1">
                                    <a href="{{url()->previous()}}" class="float-right " ><em class="icon ni ni-arrow-left backarrow"></em> </a>

                                    @include('admin.layouts.error')
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active nav-link pl-0 py-0 pb-1" data-toggle="tab"
                                                href="#tabItem6"><em class="icon ni ni-file-edit"></em><span>TESTS IN&nbsp;
                                                    {{$subject->subject}} </span> <span></span> </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">

                                        <div class="tab-pane active" id="tabItem6">
                                            <div class="nk-data data-list">
                                                <ul class="sp-pdl-list">
                                                    @foreach ($tests as $test)
                                                    <li class="sp-pdl-item">
                                                        <div class="sp-pdl-desc">
                                                            @if ($subscribe_check == 0)
                                                            @if ($test->type==1)
                                                            <div class="sp-pdl-img"><em
                                                                    class="icon ni ni-lock-fill font-35 text-danger"></em>
                                                            </div>
                                                            @else
                                                            <div class="sp-pdl-img"><em
                                                                    class="icon ni ni-play-circle font-35 text-primary"></em>
                                                            </div>
                                                            @endif
                                                            @else
                                                            <div class="sp-pdl-img"><em
                                                                    class="icon ni ni-play-circle font-35 text-primary"></em>
                                                            </div>
                                                            @endif

                                                            <div class="sp-pdl-info">
                                                                @if ($test->type==0)
                                                                <h6 class="sp-pdl-title"><a
                                                                        href="{{route('getQuestionBankPages',['category' => $subject->subject,'sub_category' => $test->category->slug,'test_slug' => $test->slug])}}"
                                                                        class="sp-pdl-name {{Auth::check()?'':'test_attend'}}  text-dark text-uppercase ">{{$test->name}}</a>
                                                                    <span
                                                                        class="badge badge-dim badge-primary badge-pill">Free</span>
                                                                    @elseif($subscribe_check == 1)
                                                                    <h6 class="sp-pdl-title"><a
                                                                            href="{{route('getQuestionBankPages',['category' => $subject->subject,'sub_category' => $test->category->slug,'test_slug' => $test->slug])}}"
                                                                            class="sp-pdl-name text-dark text-uppercase ">{{$test->name}}</a>
                                                                        <span
                                                                            class="badge badge-dim badge-primary badge-pill">Premium</span>
                                                                        @else
                                                                        <h6 class="sp-pdl-title"><a href="javascript:void(0)"
                                                                                class="sp-pdl-name text-uppercase pay_now  text-dark"
                                                                                data-batch-id="{{$subject->id}}"
                                                                                data-amount="{{$subject->price}}"
                                                                                data-id="{{(Auth::user()==null)? "" : (Auth::User()->id)}}">{{$test->name}}</a>
                                                                            <span
                                                                                class="badge badge-dim badge-primary badge-pill">Premium</span>
                                                                            @endif

                                                                        </h6>
                                                                        <div class="sp-pdl-meta">
                                                                            <span class="release">

                                                                                {{-- @if ($test->type==0)
                                                                        <span>Free</span><br>
                                                                        @for ($i = 0; $i < $attempt_count; $i++)
                                                                        <span class="mt-1 badge badge-pill badge-outline-primary"> Attempt {{$i+1}}</span>
                                                                            @endfor
                                                                            @elseif ($subscribe_check ==0)
                                                                            <span>No</span>
                                                                            @else
                                                                            <span>Yes</span>
                                                                            @endif --}}

                                                                            @if ($test->type==0)
                                                                            {{-- <span>Test Type : Free</span><br> --}}
                                                                            {{-- @if($data->getTestReports->count() != 0)
                                                                                <span class="mt-1 badge badge-pill badge-outline-primary"> Attempt {{ $data->getTestReports->count() }}</span>
                                                                            @endif --}}
                                                                            @elseif ($subscribe_check ==1)
                                                                            {{-- <span class="text-soft">Subscribed: </span>
                                                                            <span>Yes</span> --}}
                                                                            @else
                                                                            {{-- <span class="text-soft">Subscribed: </span>
                                                                            <span>No</span> --}}
                                                                            @endif

                                                                            </span>
                                                                        </div>
                                                            </div>
                                                        </div>
                                                        <div class="sp-pdl-btn">
                                                            @php
                                                            $encrypted_id =[
                                                            'id' =>$test->id,
                                                            ];
                                                            $encrypted_id= Crypt::encrypt($encrypted_id);
                                                            @endphp
                                                            @if ($subscribe_check == 0)
                                                            @if ($test->type==1)
                                                            <a id="take_test"
                                                                class="btn btn-block btn-primary text-uppercase  pay_now"
                                                                href="javascript:void(0)" data-batch-id="{{$subject->id}}"
                                                                style="color: white; opacity:0.5; " data-amount="{{$subject->price}}"
                                                                data-id="{{(Auth::user()==null)? "" : (Auth::User()->id)}}">&nbsp;&nbsp;TAKE TEST</a>
                                                            @else
                                                            <a href="{{route('getQuestionBankPages',['category' => $subject->subject,'sub_category' => $test->category->slug,'test_slug' => $test->slug])}}"
                                                                class="btn btn-primary {{Auth::check()?'':'test_attend'}} text-uppercase">Take Test</a>
                                                            @endif
                                                            @else
                                                            <a href="{{route('getQuestionBankPages',['category' => $subject->subject,'sub_category' => $test->category->slug,'test_slug' => $test->slug])}}"
                                                                class="btn btn-primary  text-uppercase">Take Test</a>

                                                            @endif
                                                        </div>
                                                    </li><!-- .sp-pdl-item -->
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
                {{-- <div class="modal-header" style="align-self: center">
                    <h5 class="text-uppercase">Purchase Section</h5>
                </div> --}}

                <div class="modal-body">
                    {{-- <div class="">
                        <h2>Darken</h2>
                      <div class="jumbotron bg-cover text-white" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.6) 0%,rgba(0,0,0,0.6) 100%), url(https://placeimg.com/1000/480/nature)">
                        <div class="container">
                        <h1 class="display-4">Hello, world!</h1>
                        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                        <hr class="my-4">
                        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                          </div>
                      <!-- /.container   -->
                      </div>
                    </div> --}}
                    <div class=" prime-modal-background bg-danger container h-auto text-light custom-text-font br-rd-15 py-5"  >
                        <div class="row">
                            <!-- <div class="col-md-12 text-center">
                                <span class="text-uppercase p-3  " > <center><h5 class="text-dark" >Premium Subscription</h5></center> </span>
                            </div> -->
                            <div class="col-md-8">


                            <li >Unlimited Access to All Question Bank For 1 year <br> <small>(Including the question bank which will br added after purchase )</small> </li>
                            <li>Instant Support in Telegram Channel which exclusive to Premium Users</li>
                            <li>Exclusive Monthly Magazine + 500 GradePoints</li>
                            {{-- <li>Exclusive Name Badge</li> --}}
                            <center class="p-3">
                                <a class="btn  btn-primary text-white premium text-uppercase btn-md" href="javascript:void(0)" data-batch-id="{{$subject->id}}" data-amount="{{@$globalSettings->primeamount}}" data-id="{{(Auth::user()==null)? "" : (Auth::User()->id)}}">&nbsp;Be a Premium member At&nbsp;&#8377; {{@$globalSettings->primeamount}}</a>

                            </center>

                            </div>
                            <div class="col-md-4">
                                <img src="{{ asset('website/image/premium-icon.png') }}">
                            </div>
                        </div>




                    </div>
                    <center class="p-20" ><span class="font-16  " >-------&nbsp;OR&nbsp;-------</span></center>
                    <form action="#" id="form_calc" class="form-validate is-alter">
                    <center><span class="font-16  " ><h5>BUY ANY COURSE</h5></span></center>

                    <span class="text-danger" id="alert" style="display: none"><i class="fas fa-info-circle"></i>&nbsp;Atleast Select One Course</span>
                    <div id="contentdiv"></div>
                    <input type="hidden" id="course_ids" data-value="" value="">
                    <input type="hidden" id="course_price" value="">
                </div>

                <div class=" text-center pb-3">
                    <center>
                        <button id="price" type="submit" style="cursor:pointer"
                            class="btn btn-readical-red text-white  text-center sub-text btn-lg font-24">Pay Rs.&nbsp;<span class="d-inline-block w-auto">0</span>/-
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
        let href = "{{route('qb-course-list')}}";
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
        var course_id = 2;
        var id = $(this).attr("data-id");
        var order_id = '';
        var encrypted_id = '{{Crypt::encryptString($subject->id)}}';
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
                        imageUrl: SITEURL + '/images/ban.jpg',
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
                    url: "{{route('buyAny')}}",
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
                        }
                        if (msg.status === 666) {
                    Swal.fire({
                        text: 'Our Secutiy System Detected something strange.',
                        imageUrl: SITEURL + '/images/ban.jpg',
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
        $('#take_test').click();
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

 <script>
    $(window).on("load", function () {
        Tawk_API.onLoad = function(){
Tawk_API.hideWidget();
};
    });
</script>

@auth
<script>
    $('.premium').on('click', function () {
    $("#paymentModal").modal('hide');
    var totalAmount = $(this).attr("data-amount");
    var batchid = "PREMIUM";
    var course_id = 2;
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
                        "image": "{{ asset(@$globalSettings->logo) }}",
                        "handler": function (response) {
                            $("#loader").show();
                            $.ajax({
                                url: '{{route('premiumorder')}}',
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



@endsection
