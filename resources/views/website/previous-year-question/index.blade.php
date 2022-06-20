@extends('website.Layout.master')
@section('meta_title')
 <!-- Fav Icon  -->
 <!-- Page Title  -->
@endsection
@section('title','Previous Year Questions')
@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-borderless">
                        {{-- <div class="card-aside-wrap"> --}}
                            <div class="card-inner card-inner-md">
                                <div class="nk-block-head nk-block-head-md">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content col-lg-12 px-0">
                                            <h4 class="nk-block-title text-uppercase float-left ">Previous Year Questions </h4>
                                            <a href="{{url()->previous()}}" class="float-right " ><em class="icon ni ni-arrow-left backarrow"></em> </a>
                                            <div class="nk-block-des">
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-block">
                                    <div class="row">
                                        @if(!$datas->isEmpty())
                                        @foreach ($datas as $data)
                                        <div class="col-xl-4">
                                            <div class="card card-bordered">
                                                @if(isset($data->image) && !empty($data->image))
                                                  <a href="{{route('previousYearTestIndex',['category' => $data->slug])}}"><img  src="{{asset($data->image)}}" class="card-img-top" /></a>
                                                @else
                                                   <a href="{{route('previousYearTestIndex',['category' => $data->slug])}}"> <img  src="{{asset('images/others/testseries-1.jpg')}}" class="card-img-top" /></a>
                                                @endif
                                                <div class="card-inner card-sm" style="padding:10px; ">
                                                <a class="" href="{{route('previousYearTestIndex',['category' => $data->slug])}}"><h6 class="mt-3 mb-3">{{strtoupper($data->name)}}</h6></a>
                                                    <div class="clear"></div>
                                                    {{-- <div class="block">
                                                        @if ($data->categorycount !=null)
                                                        <span class="float-left font-weight-bold text-danger"><em class="icon ni ni-file-fill"></em><span>{{$data->categorycount}} CATEGORIES</span></span>
                                                        @else
                                                        <span class="float-left font-weight-bold text-danger"><em class="icon ni ni-file-fill"></em><span>NA</span></span>
                                                        @endif
                                                        <span class="float-right font-weight-bold text-primary">
                                                            <a href="{{route('previousYearTestIndex',['category' => $data->slug])}}" class="btn btn-primary btn-xs">DETAILS</a>
                                                        </span>
                                                    </div> --}}
                                                    <div class="clear"></div>

                                                </div>
                                            </div>
                                        </div><!-- .col -->
                                        @endforeach
                                        @endif


                                    </div><!-- .row -->

                                </div><!-- .nk-block -->
                            </div>

                        </div><!-- .card-aside-wrap -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>

@endsection
