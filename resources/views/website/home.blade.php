@extends('website.website-layout.master') @section('content')
<!-- Hero Area -->
<div class="welcome-area welcome-area--l1 position-relative bg-default bg-gradient-primary">
    <div class="container">
        <div class="row">
            <!-- Welcome content Area -->
            <div class="col-xl-7 col-lg-7 col-md-7 col-xs-11 order-2 order-lg-1" data-aos="fade-right" data-aos-duration="500" data-aos-once="true">
                <div class="welcome-content welcome-content--l1">
                    <!-- <h1 class="welcome-content--l3__sub-title aos-init aos-animate mb-2" data-aos="fade-up" data-aos-duration="500" data-aos-once="true">Get Started</h1> -->
                    <h1 class="welcome-content__title">
                        Start Learning Your IAS Exam <br />
                        <span class="text-highlight highlight-text d-inline-block"></span>
                    </h1>
                    {{--<h2 class="welcome-content__subtitle">#1 Trusted Brand for IAS Exam Preparation</h2>--}}

                    <p class="welcome-content__descriptions mb-3 pt-3">With more than 50,000 registered users, IAS STUDY HUB is the ultimate mock exam platform in India. Our focus is to boost your Prelims marks within a short time!</p>
                    <p class="welcome-content__descriptions mb-3 pb-3">Join the best and most affordable online platform for your IAS examination needs</p>


                    {{--<div class="welcome-btn-group--l3">

                        <a class="btn btn--lg-2 btn-primary text-white shadow--primary rounded-50 me-2 me-sm-3 popup-btn" href="javascript:void(Tawk_API.toggle())">
                            Ask Your Doubt
                        </a>
                        <a
                            class="btn btn--lg-2 btn-electric-violet-2 shadow--electric-violet-2 rounded-50 me-2 me-sm-3 aos-init aos-animate"
                            href="{{ route('test-series') }}"
                            data-aos="fade-up"
                            data-aos-duration="500"
                            data-aos-delay="600"
                            data-aos-once="true"
                        >
                            Get Started
                        </a>

                    </div>--}}
                </div>
            </div>
            <!--/ .Welcome Content Area -->
            <!-- Home Quick Login -->
            <div class="col-xl-5 col-lg-5 col-md-5 order-1 order-lg-2 position-static banner-imge-hide">
                <!-- Appears after Login -->
                <div class="content-image-group content-image-group--l1_1 banner-img-alt {{isset(Auth::user()->id)&&!empty(Auth::user()->id)?'':'custom-hide'}} ">
                    <!-- Content Image -->
                    <img class="w-100" src="{{ asset('website/image/home-1/l1-contentOne-img-woman.png') }}" alt="" data-aos="fade-right" data-aos-duration="500" data-aos-once="true" />
                    <!-- Content Image -->
                    <div class="content-image-group__image content-image-group__image-1" data-aos="fade-bottom" data-aos-duration="500" data-aos-delay="300" data-aos-once="true">
                        <img class="w-100" src="{{ asset('website/image/home-1/purple-dots.png') }}" alt="" />
                    </div>
                    <!-- Content Image -->
                    <div class="content-image-group__image content-image-group__image-2" data-aos="fade-left" data-aos-duration="500" data-aos-delay="400" data-aos-once="true">
                        <img class="w-100" src="{{ asset('website/image/home-1/l1-contentOne-shape-1.png') }}" alt="" />
                    </div>
                    <!-- Content Image -->
                    <div class="content-image-group__image content-image-group__image-3" data-aos="fade-left" data-aos-duration="500" data-aos-delay="500" data-aos-once="true">
                        <img class="w-100" src="{{ asset('website/image/home-1/l1-contentOne-shape-2.png') }}" alt="" />
                    </div>
                    <!-- Content Image -->
                    {{--<div class="content-image-group__image content-image-group__image-4" data-aos="fade-up" data-aos-duration="500" data-aos-delay="500" data-aos-once="true">
                        <!-- Card Section -->
                        <div class="card card--content bg-primary dark-mode-texts">
                            <div class="card-head d-flex align-items-end">
                                <h2 class="card-head__count text-white">99%</h2>
                                <span class="card-head__icon">
                                    <i class="fa fa-arrow-up"></i>
                                </span>
                            </div>
                            <div class="card-body p-0">
                                <p class="card-body__description">highly qualified faculties of IAS STUDY HUB</p>
                            </div>
                        </div>
                        <!--/ .Card Section -->
                    </div>--}}
                </div>

                <!-- Login Div which appears before login -->
                <div class="home-login {{isset(Auth::user()->id)&&!empty(Auth::user()->id)?'custom-hide':''}}" >
                    <div class="card box-shadow-style">
                        <div class="card-body">
                            <div class="text-center">
                                <h4>Get Started with IAS Study Hub</h4>
                                <p>Boost your exam preparation with us</p>

                                <center>
                                    <div class="google-login-button"       data-moment_callback="continueWithNextIdp"
                                    id="g_id_onload" style="justify-content: center" >
                                    {{-- <div
                                        id="g_id_onload"
                                        data-client_id="455299481833-ie9gcgmnqqp3lj7v3p70d0s1p579nc2m.apps.googleusercontent.com"
                                        data-context="signin"
                                        data-prompt_parent_id="contain"

                                        data-ux_mode="popup"
                                        data-callback="handleCredentialResponse"
                                        data-auto_select="true"
                                        data-close_on_tap_outside="false"
                                    ></div> --}}

                                    {{-- <button
                                        type="button"
                                        class="btn d-block w-100 bg-sky-blue g_id_signin"
                                        data-type="standard"
                                        data-size="large"
                                        data-theme="outline"
                                        data-shape="rectangular"
                                        data-logo_alignment="left"
                                        data-text="signin_with"
                                    >
                                        <svg class="" viewBox="0 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="26" height="26" style="">
                                            <clipPath id="b">
                                                <path
                                                    id="a"
                                                    d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z"
                                                ></path>
                                            </clipPath>
                                            <path clip-path="url(#b)" fill="#fff" d="M0 37V11l17 13z"></path>
                                            <path clip-path="url(#b)" fill="#fff" d="M0 11l17 13 7-6.1L48 14V0H0z"></path>
                                            <path clip-path="url(#b)" fill="#fff" d="M0 37l30-23 7.9 1L48 0v48H0z"></path>
                                            <path clip-path="url(#b)" fill="#fff" d="M48 48L17 24l-4-3 35-10z"></path>
                                        </svg>
                                        Sign in with Google
                                    </button> --}}
                                </div>

                                </center>
                                {{-- <div class="">
                                    <p class="py-1 my-1">OR</p>
                                </div> --}}

                                {{-- <div class="mobile-login">
                                    <div class="alert alert-primary" style="display: none;"></div>
                                    <div class="alert alert-secondary" style="display: none" >OTP send successfully to your number</div>

                                    <form action="{{route('otp')}}" method="post" id="otpLogin">
                                        @csrf
                                        <div class="shimmer" id="otpLoader" style="display: none"  >
                                            <div class="wrapper">
                                              <div class="stroke animate title"></div>
                                              <div class="stroke animate link"></div>
                                              <div class="stroke animate description">    </div>
                                            </div>
                                          </div>
                                        <div id="phoneInput" >
                                            <div class=" input-group mb-3" >
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-white" id="basic-addon1">+91</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Enter 10 digit mobile number" name="phone" aria-label="" aria-describedby="" minlength="10" maxlength="10" />
                                            </div>

                                        </div>
                                        <input type="hidden" name="_token"  value="{{csrf_token()}}" >
                                        @include('admin.layouts.error')
                                        @if ($errors->has('phone'))
                                        <span class="text-primary">{{ $errors->first('phone') }}</span>
                                        @endif
                                        <button type="submit" id="otpSubmit"  class="btn btn-md w-100 text-white btn-readical-red"><span>Continue</span></button>

                                    </form>
                                    <form action="{{route('loginWithOTP')}}" method="post" style="display: none" id="verifyOtp">
                                        @csrf
                                        <div class="shimmer" id="otpVerifyLoader" style="display: none "  >
                                            <div class="wrapper">
                                              <div class="stroke animate title"></div>
                                              <div class="stroke animate link"></div>
                                              <div class="stroke animate description">    </div>
                                            </div>
                                          </div>

                                       <div id="otpInput" >
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-white" id="basic-addon1">ENTER OTP</span>
                                                </div>
                                                <input type="text" class="form-control" name="otp" />
                                                <input type="hidden" name="_token"  value="{{csrf_token()}}" >
                                                <input type="hidden"  name="phone"  id="hiddenPhoneInput" >

                                            </div>

                                        </div>
                                        <button type="submit" id="loginSubmit"   class="btn btn-md w-100 text-white btn-readical-red"><span>Login</span></button>
                                    </form>
                                </div> --}}

                                {{-- <div class="email-login mt-1 mb-3">

                                    <button type="button" onclick="loginModalOpen()" class="btn email-login-btn w-100 text-success">
                                        <svg class="db svg-sn svg-f-green" viewBox="0 0 37 37" style="" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32px" height="32px">
                                            <path
                                                fill-rule="nonzero"
                                                d="M26.253 11.706H11.124c-.962 0-1.745.783-1.745 1.746v10.474c0 .962.783 1.745 1.745 1.745h15.13c.962 0 1.745-.783 1.745-1.745V13.452c0-.963-.783-1.746-1.746-1.746zm0 1.164c.08 0 .154.016.223.045l-7.787 6.75-7.788-6.75a.58.58 0 0 1 .223-.045h15.13zm0 11.638H11.124a.582.582 0 0 1-.581-.582v-9.781l7.765 6.73a.581.581 0 0 0 .762 0l7.765-6.73v9.78c0 .322-.26.583-.582.583z"
                                            ></path>
                                        </svg>
                                        <span>Continue with Email</span>
                                    </button>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Home Quick Logi -->
        </div>
    </div>
</div>
<!--/ .Hero Area -->

<div class="content-section py-3 bg-default mt-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="section-title__heading d-block font-24 mb-5 text-uppercase" style="letter-spacing: normal;">
                    IAS Test Series <span class="float-right text-capitalize" style="font-weight: normal !important; font-size: 18px;"><a href="{{ route('test-series') }}">View All</a></span>
                </h2>
            </div>
        </div>
        <div class="row align-items-center justify-content-center">
            @if(!$ias_series->isEmpty()) @foreach($ias_series as $key => $data)
            <div class="col-xl-4">
                <div class="card box-shadow-course-list border-0 mb-5 course-list">
                    @if(isset($data->image) && !empty($data->image))
                    <a class="" href="{{route('test-series')}}"><img src="{{ asset($data->image) }}" class="card-img-top" /></a>
                    @else
                    <a class="" href="{{route('test-series')}}"><img src="{{asset('images/others/testseries-1.jpg')}}" class="card-img-top" /></a>
                    @endif
                    <div class="card-inner card-sm p-1">
                        <a class="" href="{{route('test-series')}}">
                            <h6 class="mt-3 mb-3">{{strtoupper($data->name)}}</h6>
                        </a>
                        <div class="clear"></div>
                        {{--
                        <div class="block">
                            <span class="float-left font-weight-bold text-danger"><em class="icon ni ni-file-fill"></em><span> </span></span>
                            @foreach($data->batch as $batch)
                            <span class="float-right font-weight-bold text-primary">
                                <span class="badge badge-primary badge-xs mr-2">
                                    <a href="{{route('testoverview',['series_slug' => $data->slug,'batch_slug' => $batch->slug])}}" class="btn btn-primary btn-xs text-uppercase">
                                        {{$batch->name}} - {{ $batch->test->count().' Tests' }} - {{ date('d-M-Y',strtotime($batch->updated_at)) }}
                                    </a>
                                </span>
                            </span>
                            @endforeach
                        </div>
                        --}}
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <!-- .col -->
            @endforeach @endif
        </div>
        <!-- .row -->
    </div>
</div>

<div class="content-section py-3 bg-default mt-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="section-title__heading d-block font-24 mb-5 text-uppercase" style="letter-spacing: normal;">
                    Previous Year Questions <span class="float-right text-capitalize" style="font-weight: normal !important; font-size: 18px;"><a href="{{ route('previousYearIndex') }}">View All</a></span>
                </h2>
            </div>
        </div>
        <div class="row align-items-center justify-content-center">
            @if(!$previous_year_questions->isEmpty()) @foreach ($previous_year_questions as $data)
            <div class="col-xl-4">
                <div class="card box-shadow-course-list border-0 mb-5 course-list">
                    @if(isset($data->image) && !empty($data->image))
                    <a class="" href="{{route('previousYearIndex')}}"><img src="{{asset($data->image)}}" class="card-img-top" alt="{{strtoupper($data->name)}}" /></a>
                    @else
                    <a class="" href="{{route('previousYearIndex')}}"><img src="{{asset('images/others/testseries-1.jpg')}}" alt="{{strtoupper($data->name)}}" class="card-img-top" /></a>
                    @endif
                    <div class="card-inner card-sm p-1">
                        <a class="" href="{{route('previousYearIndex')}}"><h6 class="mt-3 mb-3">{{strtoupper($data->name)}}</h6></a>
                        <div class="clear"></div>
                        {{--
                        <div class="block">
                            @if ($data->categorycount !=null)
                            <span class="float-left font-weight-bold text-danger"><em class="icon ni ni-file-fill"></em><span>{{$data->categorycount}} CATEGORIES</span></span>
                            @else
                            <span class="float-left font-weight-bold text-danger"><em class="icon ni ni-file-fill"></em><span>NA</span></span>
                            @endif
                            <span class="float-right font-weight-bold text-primary">
                                <a href="{{route('previousYearTestIndex',['category' => $data->slug])}}" class="btn btn-primary btn-xs">DETAILS</a>
                            </span>
                        </div>
                        --}}
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <!-- .col -->
            @endforeach @endif
        </div>
        <!-- .row -->
    </div>
</div>

{{-- <div class="content-section py-3 bg-default mt-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="section-title__heading d-block font-24 mb-5 text-uppercase" style="letter-spacing: normal;">
                    Question Bank <span class="float-right text-capitalize" style="font-weight: normal !important; font-size: 18px;"><a href="{{ route('questionBankIndex') }}">View All</a></span>
                </h2>
            </div>
        </div>
        <div class="row align-items-center justify-content-center">
            @if(!$question_banks->isEmpty()) @foreach ($question_banks as $data)
            <div class="col-xl-4">
                <div class="card box-shadow-course-list border-0 mb-5 course-list">
                    @if(isset($data->image) && !empty($data->image))
                    <a class="" href="{{route('getQuestionBankPages',$data->slug)}}"><img src="{{asset($data->image)}}" class="card-img-top" alt="{{strtoupper($data->subject)}}" /></a>
                    @else
                    <a class="" href="{{route('getQuestionBankPages',$data->slug)}}"><img src="{{asset('images/others/testseries-1.jpg')}}" alt="{{strtoupper($data->subject)}}" class="card-img-top" /></a>
                    @endif
                    <div class="card-inner card-sm p-1">
                        <a class="" href="{{route('getQuestionBankPages',$data->slug)}}"><h6 class="mt-3 mb-3">{{strtoupper($data->subject)}}</h6></a>
                        <div class="clear"></div>

                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <!-- .col -->
            @endforeach @endif
        </div>
        <!-- .row -->
    </div>
</div> --}}

<div class="content-section mt-5 py-5 bg-default mb-5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center pb-5">
            <div class="col-xxl-12">
                <div class="section-title section-title--l4 mb-0">
                    <!-- <h6 class="section-title__sub-heading text-electric-violet-3">Why Choose Us</h6> -->
                    <h2 class="section-title__heading text-theme-green">
                        Why IAS Study Hub?
                    </h2>
                    <p class="section-title__description">
                        Join the best and most affordable online platform for your IAS examination needs
                    </p>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-center pb-5">
            <div class="col-xxl-6 col-xl-6 col-lg-7 col-md-9 col-xs-11 order-2 order-lg-1">

                <div class="widgets">
                    <!-- Single Content Widgets -->
                    <div class="widgets__single d-flex">
                        <div class="widgets__single__icon">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="widgets__single__content">
                            <h4 class="widgets__single__heading">Extensive Online Test Series</h4>
                            <p class="widgets__single__content">
                                Extensive range of high-quality mock tests with thousands of questions and their solutions, as per latest exam pattern. Complete set of practice tests needed for all exams
                            </p>
                        </div>
                    </div>
                    <!--/ .Single Content Widgets -->
                    <!-- Single Content Widgets -->
                    <div class="widgets__single d-flex">
                        <div class="widgets__single__icon">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="widgets__single__content">
                            <h4 class="widgets__single__heading">Concept Building</h4>
                            <p class="widgets__single__content">
                                Sharpen your fundamentals through diversified Learning
                            </p>
                        </div>
                    </div>
                    <!--/ .Single Content Widgets -->
                    <!-- Single Content Widgets -->
                    <div class="widgets__single d-flex">
                        <div class="widgets__single__icon">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="widgets__single__content">
                            <h4 class="widgets__single__heading">Best quality content</h4>
                            <p class="widgets__single__content">
                                Our updated content is what brings 6,00,000 aspirants back to IAS STUDY HUB every time. We continuously research and outperform everyone else
                            </p>
                        </div>
                    </div>
                    <!--/ .Single Content Widgets -->
                    <!-- Single Content Widgets -->
                    <div class="widgets__single d-flex">
                        <div class="widgets__single__icon">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="widgets__single__content">
                            <h4 class="widgets__single__heading">Detailed solution</h4>
                            <p class="widgets__single__content">
                                Elaborate solutions to all questions help you understand your mistakes and in improving your marks
                            </p>
                        </div>
                    </div>
                    <!--/ .Single Content Widgets -->
                    <!-- Single Content Widgets -->
                    <div class="widgets__single d-flex">
                        <div class="widgets__single__icon">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="widgets__single__content">
                            <h4 class="widgets__single__heading">Affordable pricing</h4>
                            <p class="widgets__single__content">
                                We know money matters and that is why we have made our high-quality courses affordable for all with heavy discounts
                            </p>
                        </div>
                    </div>
                    <!--/ .Single Content Widgets -->
                </div>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-9 col-xs-10 order-1 order-lg-2">
                <div class="content-image-group content-image-group--l1_1">
                    <!-- Content Image -->
                    <img class="w-100" src="{{ asset('website/image/home-1/l1-contentOne-img-woman.png') }}" alt="" data-aos="fade-right" data-aos-duration="500" data-aos-once="true" />
                    <!-- Content Image -->
                    <div class="content-image-group__image content-image-group__image-1" data-aos="fade-bottom" data-aos-duration="500" data-aos-delay="300" data-aos-once="true">
                        <img class="w-100" src="{{ asset('website/image/home-1/purple-dots.png') }}" alt="" />
                    </div>
                    <!-- Content Image -->
                    <div class="content-image-group__image content-image-group__image-2" data-aos="fade-left" data-aos-duration="500" data-aos-delay="400" data-aos-once="true">
                        <img class="w-100" src="{{ asset('website/image/home-1/l1-contentOne-shape-1.png') }}" alt="" />
                    </div>
                    <!-- Content Image -->
                    <div class="content-image-group__image content-image-group__image-3" data-aos="fade-left" data-aos-duration="500" data-aos-delay="500" data-aos-once="true">
                        <img class="w-100" src="{{ asset('website/image/home-1/l1-contentOne-shape-2.png') }}" alt="" />
                    </div>
                    <!-- Content Image -->
                    {{--<div class="content-image-group__image content-image-group__image-4" data-aos="fade-up" data-aos-duration="500" data-aos-delay="500" data-aos-once="true">
                        <!-- Card Section -->
                        <div class="card card--content bg-primary dark-mode-texts">
                            <div class="card-head d-flex align-items-end">
                                <h2 class="card-head__count text-white">99%</h2>
                                <span class="card-head__icon">
                                    <i class="fa fa-arrow-up"></i>
                                </span>
                            </div>
                            <div class="card-body p-0">
                                <p class="card-body__description">highly qualified faculties of IAS STUDY HUB</p>
                            </div>
                        </div>
                        <!--/ .Card Section -->
                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</div>
{{--
<!-- Testimonial Area -->

<div class="testimonial-area testimonial-area--inner-1 bg-default-5 border-bottom border-default-color-3">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="section-title section-title--l4">
                    <h6 class="section-title__sub-heading text-torch-red">Testimonial</h6>
                    <h2 class="section-title__heading mb-4">How We are Care About Our Students</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center testimonial-mobile-slider--inner-1" data-aos="fade-up" data-aos-duration="500" data-aos-delay="400" data-aos-once="true">
            @php($testimonials = \App\Models\Testimonial::where('status',1)->get()) @if(!$testimonials->isEmpty()) @foreach ($testimonials as $testimonial)
            <div class="col-lg-4 col-md-12">
                <div class="card card-testimonial--l3">
                    <div class="card-image">
                        <img src="{{ asset($testimonial->profile_photo) }}" alt="" style="width: 64px;" />
                    </div>
                    <div class="card-body">
                        <p class="card-description">{{ $testimonial->description }}</p>
                        <div class="d-flex flex-wrap justify-content-between align-items-center card-user-block">
                            <div class="card-body__user mr-3">
                                <h3 class="card-title">{{ $testimonial->name }}</h3>
                                <p class="card-text--ext">{{ $testimonial->designation }}</p>
                            </div>
                            <ul class="review-star reviw-star--size-2 list-unstyled mb-0">
                                @php($i = 1) @for($i=1;$i<=$testimonial->rating;$i++)
                                <li class="review-star__single">
                                    <i class="fa fa-star"></i>
                                </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach @endif
        </div>
    </div>
</div>

<!--/ .Testimonial Area -->

<div class="cta-section cta-section--l2 bg-default">
    <div class="container">
        <div class="cta-section--l2__content bg-electric-violet dark-mode-texts">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h3 class="cta-section--l2__content__heading aos-init aos-animate" data-aos="fade-right" data-aos-duration="500" data-aos-once="true" style="font-size: 26px; letter-spacing: normal;">
                        150+ students have cracked UPSC with our test-series. These test-series have been specially prepared by faculty with decades of experience. These are just what you need to realise your dream!
                    </h3>
                </div>
                <div class="col-lg-5">
                    <div class="cta-section--l2__button text-center text-lg-end">
                        <a class="btn btn--190 btn-white rounded-55 aos-init aos-animate" href="{{route('home')}}" data-aos="fade-left" data-aos-duration="500" data-aos-once="true">Get Started For Free</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
--}}

{{-- Login Modal --}}
<div class="container mt-5">
    <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
<div class="modal-dialog modal-md modal-dialog-centered" >
  <div class="modal-content ">
    <div class=" container-login "  >
                <div class="container-login">
                  <div class="col-left-login">
                    <div class="login-text">
                      <h4 class="">Register with us</h4>
                      <p>  Create your account.It's takes <br> less than a minute.</p>
                      <a class="btn-login btn-readical-red"  onclick="otpModalOpen()"  href="javascript:void(0)"    >Register</a>                    </div>
                  </div>
                  <div class="col-right-login">
                    <div class="login-form">
                        {{-- <center>  <p class="text" > Login with your credentials</p></center> --}}

                      <form method="POST"  id="loginModalForm">
                        <div class="shimmer" id="loginLoader"  style="display: none" >
                            <div class="wrapper">
                              <div class="stroke animate title"></div>
                              <div class="stroke animate link"></div>
                              <div class="stroke animate description">    </div>
                            </div>
                          </div>
                         <div id="loginModalDiv" >
                            <div class="alert alert-primary" style="display: none;" id="loginError" ></div>
                            <p>
                                {{-- <label>Username or email address<span>*</span></label> --}}
                                <input type="text" placeholder="Email Address"  name="email" autocomplete="off" required>
                              </p>
                              <p>
                                {{-- <label>Password<span>*</span></label> --}}
                                <input type="password" placeholder="Password" name="password"  autocomplete="off"  required>
                              </p>
                              <p>
                                <input type="hidden" name="_token" value="{{csrf_token()}}" >
                                <input type="submit" value="Login" />
                              </p>
                              <p>
                                <a onclick="resetPassword()" href="javascript:void(0)">Forget Password?</a>
                              </p>

                         </div>
                      </form>
                    </div>
                  </div>
                </div>

        </form>
    </div>
  </div>
</div>
</div>

</div>

{{-- Register Modal --}}
<div class="container mt-5">
    <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
<div class="modal-dialog modal-md modal-dialog-centered" >
  <div class="modal-content ">
    <div class=" container-login "  >
                <div class="container-login">
                  <div class="col-left-login">
                    <div class="login-text">
                      <h4 class="">Login</h4>
                      <p>  Already have an account ? <br> Login with credentials.</p>
                      <a class="btn-login btn-readical-red"  onclick="loginModalOpen()"  href="javascript:void(0)"    >Login</a>                    </div>
                  </div>
                  <div class="col-right-login">
                    <div class="login-form">
                        {{-- <center>  <p class="text" > Login with your credentials</p></center> --}}

                      <form method="POST"  id="registerModalForm">
                        <div class="shimmer" id="registerLoader"  style="display: none" >
                            <div class="wrapper">
                              <div class="stroke animate title"></div>
                              <div class="stroke animate link"></div>
                              <div class="stroke animate description">    </div>
                            </div>
                          </div>
                         <div id="registerModalDiv" >
                            <div class="alert alert-primary" style="display: none;" id="registerError" ></div>
                            <p>
                                {{-- <label>Username or email address<span>*</span></label> --}}
                                <input type="text" placeholder="Enter Name"  name="name" autocomplete="off" required>
                              </p>
                            <p>
                                {{-- <label>Username or email address<span>*</span></label> --}}
                                <input type="text" placeholder="Email Address"  name="email" autocomplete="off" required>
                              </p>
                              <p>
                                {{-- <label>Password<span>*</span></label> --}}
                                <input type="password" placeholder="Password" name="password"  autocomplete="off"  required>
                              </p>
                              <p>
                                {{-- <label>Password<span>*</span></label> --}}
                                <input type="password" placeholder="Confirm Password" name="confirm_password"  autocomplete="off"  required>
                              </p>
                              <p>
                                <input type="hidden" name="_token" value="{{csrf_token()}}" >
                                <input type="submit" value="Register" />
                              </p>
                         </div>
                      </form>
                    </div>
                  </div>
                </div>
        </form>
    </div>
  </div>
</div>
</div>

</div>





{{-- Forget Password --}}
<!--modal-->
<div id="resetPasswordModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
            <center><h6>Reset Password</h6></center>
        </div>

        <div class="modal-body">
            <div class="col-md-12">
                  <div class="panel panel-default">
                    <div class="shimmer" id="resetPasswordLoader"  style="display: none" >
                        <div class="wrapper">
                          <div class="stroke animate title"></div>
                          <div class="stroke animate link"></div>
                        </div>
                      </div>
                      <div class="alert alert-primary" style="display: none;" id="resetPasswordError" ></div>
                                <div class="alert alert-secondary" style="display: none;" id="resetPasswordSuccess"></div>

                      <div class="panel-body" id="resetPasswordDiv" >
                        <form id="resetPasswordForm">
                              <fieldset class="login-form" >
                                      <div class="form-group">
                                          <input class="form-control input-lg" placeholder="E-mail Address" name="email"  required    type="email">
                                      </div><br>
                                      <center><input style="width: 90%;border-radius: 40px; color: #000;
                                        background-color: #2aa87e;
                                        border-color: #2aa87e;
                                        background-image: linear-gradient( 180deg ,#50b167,#1a806c);"  class="btn btn-primary btn-block btn-readical-red " value="Send Password Reset link" type="submit" id="resetPasswordButton" ></center>

                                  </fieldset>
                        </form>
                              </div>
                  </div>
              </div>
        </div>

    </div>
    </div>
  </div>
  {{-- <div class="modal fade" id="resetPasswordModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Login Form</h3>
        </div>
        <!-- body -->
        <div class="modal-header login-form ">
          <form id=resetPasswordForm>
            <div class="form-group">
              <input type="email" style="width: 100%" class="form-control" placeholder="Email"/>
            </div>
          </form>
        </div>
        <!-- footer -->
        <div class="modal-footer">
          <button class="btn btn-primary btn-block">Submit</button>
        </div>

      </div>
    </div>
  </div> --}}


@endsection


@section('javascript')
<script src="https://accounts.google.com/gsi/client"></script>

<script>


    function registerModalOpen() {
        document.getElementById('registerModalForm').reset();
        $('#loginModal').modal('hide');
        $('#registerModal').modal('show');
        $("#loginError").hide();
        $("#registerError").hide();

    }
    </script>

<script>
    function resetPassword() {
        document.getElementById('resetPasswordForm').reset();
        $('#loginModal').modal('hide');
        $('#resetPasswordModal').modal('show');
    }
</script>

    <script>

    function loginModalOpen() {
        document.getElementById('loginModalForm').reset();
        $('#loginModal').modal('show');
        $('#registerModal').modal('hide');
        $("#loginError").hide();
        $("#registerError").hide();

    }

</script>

<script>
    function otpModalOpen() {
        $("#loginModal").modal("hide");
        $("#registerModal").modal("hide");
        $("#otpWithGoogleModal").modal("show");
    }
</script>


<script>

    $('#loginModalForm').on('submit',function(e){
        e.preventDefault();
    $.ajax({
        url: "{{route('loginWithMail')}}",
        type: "GET",
        data: $("#loginModalForm").serialize(),
        beforeSend: function () {
            // Show image container
            $("#loginModalDiv").css('display','none');
            $("#loginLoader").css('display','block');

        },

        success: function (response) {
            if (response.errors) {
                $("#loginError").html("");
                $("#loginModalDiv").css('display','block');
                $("#loginLoader").css('display','none');

                $.each(response.errors, function (key, value) {
                    $("#loginError").show();
                    $("#loginError").append("<li>" + value + "</li>"  );
                });
            } else if(response.status === 601 ){
                $("#loginError").hide();
                Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Email/Password does not match !!!',
                        })
                $("#loginModalDiv").css('display','block');
                $("#loginLoader").css('display','none');

            }

            else if(response.status === 603 ){
                $("#loginError").hide();
                Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please use same login method during Register !!!',

                        })
                $("#loginModalDiv").css('display','block');
                $("#loginLoader").css('display','none');

            }

             else if(response.status === 600 ){
                $("#loginError").hide();
                Swal.fire({
                        icon : 'error',
                        title : 'Oops...' ,
                        text: ' Email not exists in our records',
                        width : 400 ,


                        })
                        $("#loginModalDiv").css('display','block');
                    $("#loginLoader").css('display','none');

            }else if(response.status === 200){
                location.reload(true)
            }
        },
        complete: function (response) {
            $("#loader").hide();
        },
        error: function (error) {
            console.log(error);
            //   alert('data not saved')
        },
    });

    });
</script>


<script>

    $('#resetPasswordForm').on('submit',function(e){
        e.preventDefault();
        $('#resetPasswordError').hide();
        $('#resetPasswordSuccess').hide();
    $.ajax({
        url: "{{route('forgotPasswordLink')}}",
        type: "GET",
        data: $("#resetPasswordForm").serialize(),
        beforeSend: function () {
            // Show image container
            $("#resetPasswordDiv").css('display','none');
            $("#resetPasswordLoader").css('display','block');

        },

        success: function (response) {
            if (response.status === 600) {
                 $("#resetPasswordError").html("");
                $("#resetPasswordDiv").css('display','block');
                $("#resetPasswordLoader").css('display','none');

                    $("#resetPasswordError").show();
                    $("#resetPasswordError").html("<span>" + response.msg + "</span>"  );

            } else if(response.status === 601 ){
                $("#loginError").hide();
                Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Email/Password does not match !!!',
                        })
                $("#loginModalDiv").css('display','block');
                $("#loginLoader").css('display','none');

            }  else if (response.failedProcess == 'false') {
                            // if (Cookies.get('test_cookie') === undefined ) {
                            //     location.reload(true);
                            // } else {
                            //     var cookie = Cookies.get('test_cookie');
                            //     window.location.href = cookie ;
                            //  }
                            $("#resetPasswordDiv").css('display','block');
                            $("#resetPasswordLoader").css('display','none');
                            $("#resetPasswordSuccess").show();
                            $("#resetPasswordSuccess").html("<span>" + "Password Reset Mail Send" + "</span>");
                            $("#resetPasswordDiv").hide();

                        }         else if (response.errors) {

                $("#resetPasswordError").html("");
                $("#resetPasswordDiv").css('display','block');
                $("#resetPasswordLoader").css('display','none');

                $.each(response.errors, function (key, value) {
                    $("#resetPasswordError").show();
                    $("#resetPasswordError").append("<li>" + value + "</li>");
                });
            }
        },
        complete: function (response) {
            $("#loader").hide();
        },
        error: function (error) {
            console.log(error);
            //   alert('data not saved')
        },
    });

    });
</script>



<script>

    $('#registerModalForm').on('submit',function(e){
        e.preventDefault();
    $.ajax({
        url: "{{route('registerWithMail')}}",
        type: "GET",
        data: $("#registerModalForm").serialize(),
        beforeSend: function () {
            // Show image container
            $("#registerModalDiv").css('display','none');
            $("#registerLoader").css('display','block');

        },

        success: function (response) {
            if (response.errors) {
                $("#registerError").html("");
                $("#registerModalDiv").css('display','block');
                $("#registerLoader").css('display','none');

                $.each(response.errors, function (key, value) {
                    $("#registerError").show();
                    $("#registerError").append("<li>" + value + "</li>");
                });
            } else if(response.status === 601 ){
                $("#registerError").hide();
                Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Email already exists. please use sign-in option to login  !!!',
                        })
                $("#registerModalDiv").css('display','block');
                $("#registerLoader").css('display','none');

            }else if(response.status === 600 ){
                $("#registerError").hide();
                Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Password and confirm password does not match  !!!',
                        })
                $("#registerModalDiv").css('display','block');
                $("#registerLoader").css('display','none');

            }
             else if(response.status === 200){
                location.reload(true)
            }
        },
        complete: function (response) {
            $("#loader").hide();
        },
        error: function (error) {
            console.log(error);
            //   alert('data not saved')
        },
    });

    });
</script>




<script>

        $('#otpLogin').on('submit',function(e){
            e.preventDefault();
        $.ajax({
            url: "{{route('otp')}}",
            type: "GET",
            data: $("#otpLogin").serialize(),
            beforeSend: function () {
                // Show image container
                $('#phoneInput').css('display','none')
                $('#otpSubmit').css('display','none')
                $("#otpLoader").css('display','block');

            },

            success: function (response) {
                if (response.errors) {
                    $(".alert-primary").html("");
                    $('#phoneInput').css('display','block')
                $('#otpSubmit').css('display','block')
                $("#otpLoader").css('display','none');

                    $.each(response.errors, function (key, value) {
                        $(".alert-primary").show();
                        $(".alert-primary").append("<span>" + value + "</span>");
                    });
                } else if(response.otpSuccess === true ){
                    $(".alert-primary").hide();
                    $(".alert-secondary").show();
                    $("#hiddenPhoneInput").val(response.phone)
                    $('#otpLogin').css('display','none')
                    // $('#otpInput').css('display','block')
                    $('#verifyOtp').css('display','block')
                    // $('#otpSubmit').css('display','none')
                    // // $("#otpLoader").css('display','none');
                    // location.reload(true);
                    // $('#otpInput').css('display','block');
                    $("#otpLoader").css('display','none');

                }
            },
            complete: function (response) {
                $("#loader").hide();
            },
            error: function (error) {
                console.log(error);
                //   alert('data not saved')
            },
        });

        });
</script>

<script>
    function continueWithNextIdp(notification) {
        if (notification.isNotDisplayed() || notification.isSkippedMoment()) {
            google.accounts.id.renderButton(g_id_onload, {
      theme: 'outline',
      size: 'large',
      shape: 'pill'
    });

        }
    }
  </script>



<script>

    $('#verifyOtp').on('submit',function(e){
        e.preventDefault();
    $.ajax({
        url: "{{route('loginWithOTP')}}",
        type: "GET",
        data: $("#verifyOtp").serialize(),
        beforeSend: function () {
            // Show image container
            $(".alert-secondary").hide();
            $(".alert-danger").hide();
            $("#otpInput").css('display','none')
            $("#otpVerifyLoader").css('display','block');

        },

        success: function (response) {
            if (response.status === 401) {
                $(".alert-primary").html("");
                  $('#otpInput').css('display','block')
                  $("#otpVerifyLoader").css('display','none');
                    $(".alert-primary").show();
                    $(".alert-primary").append("<span>" + "OTP INVALID" + "</span>");
            } else if(response.status === 200 ){
                // $(".alert-primary").hide();
                // $(".alert-secondary").show();
                // $('#phoneInput').css('display','none')
                // $('#otpInput').css('display','block')
                // $('#loginSubmit').css('display','block')
                // $('#otpSubmit').css('display','none')
                // $("#otpLoader").css('display','none');
                // location.reload(true);
                // $('#otpInput').css('display','block');
                // $("#otpLoader").css('display','none');
                location.reload(true)

            }
        },
        complete: function (response) {
            $("#loader").hide();
        },
        error: function (error) {
            console.log(error);
            //   alert('data not saved')
        },
    });

    });
</script>


<script>
    function parseJwt(token) {
        var base64Url = token.split(".")[1];
        var base64 = base64Url.replace(/-/g, "+").replace(/_/g, "/");
        var jsonPayload = decodeURIComponent(
            atob(base64)
                .split("")
                .map(function (c) {
                    return "%" + ("00" + c.charCodeAt(0).toString(16)).slice(-2);
                })
                .join("")
        );

        return JSON.parse(jsonPayload);
    }
</script>

<script>
    function handleCredentialResponse(response) {
        var decoded = JSON.stringify(parseJwt(response.credential));
        $.ajax({
            url: "{{ route('handlecallback') }}",
            type: "get",
            data: {
                _token: "{{csrf_token()}}",
                decoded: decoded,
                onetaplogin: 1,
            },
            beforeSend: function () {
                // Show image container
                $("#loader").show();
            },

            success: function (response) {
                cosole.log(response);
                if (response.errors) {
                    $(".alert-danger").html("");

                    $.each(response.errors, function (key, value) {
                        $(".alert-danger").show();
                        $(".alert-danger").append("<li>" + value + "</li>");
                    });
                    setTimeout(function () {
                        $(".alert-danger").hide();
                    }, 3000);
                } else if(response.status === 200) {
                    location.reload(true);
                }else if(response.status === 401){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please login with Email and password!!! Reloading page now ........',
                        })

                    setTimeout(function () {
                        location.reload(true)
                    }, 2000);

                }
            },
            complete: function (response) {
                $("#loader").hide();
            },
            error: function (error) {
                console.log(error);
            },
        });
    }
</script>

@guest



<script>
    window.onload = function () {
        google.accounts.id.initialize({
            client_id:'1048692094804-jlp2g78jh3s1km3fic556ntbbf7at8h5.apps.googleusercontent.com',
            callback: handleCredentialResponse ,
            cancel_on_tap_outside: false,
            prompt_parent_id: 'g_id_onload'
        });
        google.accounts.id.prompt((notification) => {
        if (notification.isNotDisplayed() || notification.isDismissedMoment()) {
        }
    });

    };
</script>

<script>
    const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
</script>


@endguest


@endsection
