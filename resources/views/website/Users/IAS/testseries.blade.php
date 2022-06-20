@extends('website.Layout.master')
 @section('title','IAS Test Series') @section('content')
<!-- content @s -->
<div class="nk-content px-0">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-borderless">
                        <div class="card-aside-wrap">
                            <div class="card-inner card-inner-md">
                                <div class="nk-block-head nk-block-head-md">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content col-lg-12 px-0">
                                            <h4 class="nk-block-title text-uppercase float-left ">IAS Test Series</h4>
                                            <a href="{{url()->previous()}}" class="float-right " ><em class="icon ni ni-arrow-left backarrow"></em> </a>

                                        </div>
                                    </div>
                                </div>
                                <!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row">
                                        @if(!$datas->isEmpty()) @foreach($datas as $key => $data)
                                        <div class="col-xl-4">
                                            <div class="card card-borderless box-shadow-test">
                                                @if(isset($data->image) && !empty($data->image))
                                                <a href="{{route('testoverview',$data->slug)}}"><img src="{{ asset($data->image) }}" class="card-img-top" /></a>
                                                @else
                                                <a href="{{route('testoverview',$data->slug)}}"> <img src="{{asset('images/others/testseries-1.jpg')}}" class="card-img-top" /></a>
                                                @endif
                                                <div class="card-inner card-sm p-2">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 ">
                                                            <a class="" href="{{route('testoverview',$data->slug)}}">
                                                                <span>
                                                                    <h6 class="mt-3 mb-3">{{strtoupper($data->name)}}</h6>
                                                                </span>
                                                            </a>

                                                        </div>

                                                        {{--<div class="col-xs-3 col-lg-3 col-md-3 col-sm-3 ">
                                                            <div class="block mt-3 mb-3 float-right ">
                                                                <div class="dropleft">
                                                                    <button class="btn  btn-light btn-xs dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class=" text-dark fas fa-eye"></i>&nbsp;
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                        @foreach($data->batch as $batch)
                                                                        @if ($batch->isClosed == 1)
                                                                        <a class="dropdown-item "  href="javascript:void(0)">
                                                                            {{$batch->name}} &nbsp;|&nbsp; {{ $batch->test->count().' Tests' }} &nbsp;| &nbsp; <span class="text-danger" >BATCH CLOSED </span>
                                                                        </a>

                                                                        @else
                                                                        <a class="dropdown-item "  href="{{route('testoverview',['series_slug' => $data->slug,'batch_slug' => $batch->slug])}}">
                                                                            {{$batch->name}} &nbsp;|&nbsp; {{ $batch->test->count().' Tests' }} &nbsp;| &nbsp; {{ date('d-M',strtotime($batch->start_date)) }}
                                                                        </a>

                                                                        @endif
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="dropdown">
                                                                    <a href="#" class="dropdown-toggle btn btn-success btn-xs" data-toggle="dropdown" aria-expanded="false">View All Batches<em class="icon ni ni-chevron-down float-right"></em></a>
                                                                    <div class="dropdown-menu" style="">
                                                                        <ul class="list-tidy">
                                                                            @foreach($data->batch as $batch)
                                                                            <span style="width: 100%;" class="font-weight-bold">
                                                                                <li>
                                                                                    <a
                                                                                        style="border: 0px; width: 100%;"
                                                                                        href="{{route('testoverview',['series_slug' => $data->slug,'batch_slug' => $batch->slug])}}"
                                                                                        class="btn btn-light btn-xs text-uppercase"
                                                                                    >
                                                                                        {{$batch->name}} &nbsp;|&nbsp; {{ $batch->test->count().' Tests' }} &nbsp;| &nbsp; {{ date('d-M',strtotime($batch->start_date)) }}
                                                                                    </a>
                                                                                </li>
                                                                            </span>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>

                                                        </div>--}}
                                                    </div>
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
                                <!-- .nk-block -->
                            </div>
                        </div>
                        <!-- .card-aside-wrap -->
                    </div>
                    <!-- .card -->
                </div>
                <!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
<!-- content @e -->
@endsection



