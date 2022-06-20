@extends('website.website-layout.master')
@section('content')
@php($generalSetting = \App\Models\SettingGeneral::first())
 <div class="page-title-content text-center bg-default-3">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-7">
          <h2 class="page-title-content__heading">Contact Us</h2>

        </div>
      </div>
    </div>
    <div class="shape">
      <img class="w-100" src="{{ asset('website/image/png/inner-banner-shape.png') }}" alt="">
    </div>
  </div>
<div class="contact-section contact-inner-1 bg-default border-bottom border-default-color-3">
    <div class="container">
      <div class="row">
        <div class="col-xl-7 col-lg-7 mb-7 mb-lg-0">
          <div class="section-title section-title--l3 text-left mb-5 mb-md-7" data-aos="fade-up" data-aos-duration="500" data-aos-once="true">
            <h6 class="section-title__sub-heading">Contact Us</h6>
            <h2 class="section-title__heading mb-4">
              Send A Message
            </h2>
            <p class="section-title__description"></p>
          </div>
                @foreach (['danger', 'warning', 'success', 'info'] as $msg) @if(Session::has('alert-' . $msg))
        <div class="alert alert-warning alert-dismissible fade show alert-secondary" role="alert">
            <strong></strong>{{ Session::get('alert-' . $msg) }}
        </div>
        @endif @endforeach @if (Session::has('error_message'))
        <div class="alert alert-warning fade show alert-secondary " role="alert">
            {{Session::get('error_message')}}
        </div>
        @endif
          <form action="{{ route('saveContact') }}" method="POST" class="contact-form" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300" data-aos-once="true">
@csrf
            <div class="row">
              <div class="col-lg-6 mb-4">
                <div class="form-floating">
                  <input class="form-control" name="email" placeholder="Enter Email" id="floatinginput" required>
                  <label for="floatinginput">Your Email</label>
                    @error('email')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
              </div>
              <div class="col-lg-6 mb-4">
                <div class="form-floating">
                  <input class="form-control" name="mobile" placeholder="Enter Mobile" id="floatinginput2" required>
                  <label for="floatinginput2">Phone number</label>
                  @error('mobile')
                    <span>{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-floating">
                  <textarea class="form-control" name="message" placeholder="Leave a comment here" id="floatingTextarea3" style="height: 100px" required></textarea>
                  <label for="floatingTextarea3">Your Message Here </label>
                    @error('message')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
              </div>
              <div class="col-lg-12">
                <div class="row align-items-center mt-3">
                  <div class="col-md-6">
                    <button class="btn btn-primary shadow--primary-4 btn--lg-2 rounded-55 text-white">Send Message</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="col-xl-4 offset-xl-1 col-lg-5" data-aos="fade-left" data-aos-duration="500" data-aos-delay="400" data-aos-once="true">
          <div class="contact-widget-box">
            <div class="contact-widget-box__title-block">
              <h2 class="widget-box__title">Get In Touch</h2>
              <p class="widget-box__paragraph"></p>
            </div>
            <div class="contact-widgets-wrapper row">
              <div class="widget widget--contact col-lg-12 col-sm-6 active" >
                <div class="widget-icon widget-icon--circle">
                  <i class="fas fa-envelope"></i>
                </div>
                <div class="widget-body">
                  <h3 class="widget-body--title">Mail :</h3>
                <p style=" font-size: 15px; opacity: 1; ">{{ $generalSetting->email }}</p>
                </div>
              </div>
              <div class="widget widget--contact col-lg-12 col-sm-6 active">
                <div class="widget-icon widget-icon--circle">
                  <i class="fas fa-phone-alt"></i>
                </div>
                <div class="widget-body">
                  <h3 class="widget-body--title">Phone :</h3>
                  <p style=" font-size: 15px; opacity: 1; ">{{ $generalSetting->phone_no }}</p>
                </div>
              </div>
              <div class="widget widget--contact col-lg-12 col-sm-6 active">
                <div class="widget-icon widget-icon--circle">
                  <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="widget-body">
                  <h3 class="widget-body--title">Corporate Address :</h3>
                  <p style=" font-size: 15px; opacity: 1; ">{!! $generalSetting->address !!}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

