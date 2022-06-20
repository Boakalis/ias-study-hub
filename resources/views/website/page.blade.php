@extends('website.website-layout.master')
@section('content')
<div class="page-title-content text-center bg-default-3">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-7">
          <h2 class="page-title-content__heading">{{ ucwords($page->title) }}</h2>
          
        </div>
      </div>
    </div>
    <div class="shape">
      <img class="w-100" src="{{ asset('website/image/png/inner-banner-shape.png') }}" alt="">
    </div>
  </div>
<div class="terms-area bg-default-7">
    <div class="container">
      
      <div class="row justify-content-center">
        <div class="col-xxl-12 col-xl-12 col-lg-12">
          <div class="terms-content">
            <p class="terms-content__text">
                {!! $page->page_content !!}
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
