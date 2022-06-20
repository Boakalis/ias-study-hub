
@if (isset($datas)&& !empty($datas))

@foreach ($datas as $key => $data)


<ul class="nk-nav nav nav-tabs">

    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#personal"><span class="text-dark text-uppercase" >Attempted on  <span class="text-danger" >{{\Carbon\Carbon::parse($data->date)->format('d-F-Y H:i:s')}} </span> </span> :   </a>
    </li>
    <li class="nav-item">
    </li>
</ul><!-- .nav-tabs -->
<div class="tab-content">
    <div class="tab-pane active" id="personal">
        <div class="nk-block">

            <div class="row gy-gs">
                <div class="col-md-3 col-lg-3">
                    <div class="nk-wg-card is-s1 card card-bordered bg-success ">
                        <div class="card-inner">

                            <div class="nk-iv-wg2">
                                <div class="nk-iv-wg2-title">
                                    <h6 class="title text-white">Correct<em class="icon ni ni-check"></em></h6>
                                </div>
                                <div class="nk-iv-wg2-text">
                                    <div class="nk-iv-wg2-amount text-white"> {{$data->correct}} </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .card -->
                </div><!-- .col -->
                <div class="col-md-3 col-lg-3">
                    <div class="nk-wg-card is-s1 card card-bordered bg-danger">
                        <div class="card-inner">
                            <div class="nk-iv-wg2">
                                <div class="nk-iv-wg2-title text-white">
                                    <h6 class="title text-white">Incorrect <em class="icon ni ni-cross"></em></h6>
                                </div>
                                <div class="nk-iv-wg2-text">
                                    <div class="nk-iv-wg2-amount text-white"> {{$data->incorrect}}</div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .card -->
                </div><!-- .col -->
                <div class="col-md-3 col-lg-3">
                    <div class="nk-wg-card is-s1 card card-bordered bg-info">
                        <div class="card-inner">
                            <div class="nk-iv-wg2">
                                <div class="nk-iv-wg2-title">
                                    <h6 class="title text-white">Un-Attempt <em class="icon ni ni-stop"></em></h6>
                                </div>
                                <div class="nk-iv-wg2-text">
                                    <div class="nk-iv-wg2-amount text-white"> {{$data->unattempt}}</div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .card -->
                </div><!-- .col -->
                <div class="col-md-3 col-lg-3">
                    <div class="nk-wg-card is-s1 card card-bordered bg-warning">
                        <div class="card-inner">
                            <div class="nk-iv-wg2">
                                <div class="nk-iv-wg2-title">
                                    <h6 class="title text-white">Review <em class="icon ni ni-info"></em></h6>
                                </div>
                                <div class="nk-iv-wg2-text">
                                    <div class="nk-iv-wg2-amount text-white"> {{$data->review}}</div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .card -->
                </div><!-- .col -->
            </div><!-- .row -->
            <div class="row gy-gs">
                <div class="col-md-12 col-lg-12">
                    <div class="nk-wg-card alert-info card card-bordered">
                        <div class="card-inner">
                            <div class="nk-iv-wg2 text-center">
                                <div class="nk-iv-wg2-title">
                                    <h6 class="title">Your Result <em class="icon ni ni-info"></em></h6>
                                </div>
                                <div class="nk-iv-wg2-text text-center">
                                    <div class="nk-iv-wg2-amount d-block"> {{ $data->marks_obtained}}/{{($data->total_marks)}} </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .card -->
                    @php
                        $parameter =[
                            'id' =>$data->id,
                        ];
                    $parameter= Crypt::encrypt($parameter);
                    @endphp
                    <div class="text-center">
                        {{-- <a class="btn btn-primary mt-2" target="_blank" href="{{route('show_solution',$parameter)}}">View Solutions</a> --}}
                        <form action="{{route('generatePDF',['parameter' => $parameter , 'encrypted_user_id' =>Crypt::encrypt(Auth::user()->id)])}}" method="get"  class="d-inline-block">
                            @csrf

                            <input type="hidden" name="test" value="{{@$data->test['name']}}">
                            <input type="hidden" name="batch" value="{{@$data->batch['name']}}">
                            <input type="hidden" name="course_id" value="1">
                            <input type="hidden" name="test_id" value ="{{@$data->id}}">
                            <input type="hidden" name="series" value="{{@$data->batch['series']['name']}}">
                            <button class="btn btn-dim  btn-warning p-1 mt-2" href="" title="download"><i class="fas fa-cloud-download-alt"></i>&nbsp;Download</button>
                        </form>


                    </div>
                </div><!-- .col -->
            </div><!-- .row -->
        </div>
    </div><!-- .tab-pane -->

</div>

<hr class="hr-4">


@endforeach

@else

<ul class="nk-nav nav nav-tabs">

    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#personal"><span class="text-dark text-uppercase" >Reports  <span class="text-danger" ></span> </span> :   </a>
    </li>
    <li class="nav-item">
    </li>
</ul><!-- .nav-tabs -->
<div class="tab-content">
    <div class="tab-pane active" id="personal">
        <div class="nk-block">

            <div class="row gy-gs">
                <div class="col-md-3 col-lg-3">
                    <div class="nk-wg-card is-s1 card card-bordered bg-success ">
                        <div class="card-inner">

                            <div class="nk-iv-wg2">
                                <div class="nk-iv-wg2-title">
                                    <h6 class="title text-white">Correct<em class="icon ni ni-check"></em></h6>
                                </div>
                                <div class="nk-iv-wg2-text">
                                    <div class="nk-iv-wg2-amount text-white"> {{$data->correct}} </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .card -->
                </div><!-- .col -->
                <div class="col-md-3 col-lg-3">
                    <div class="nk-wg-card is-s1 card card-bordered bg-danger">
                        <div class="card-inner">
                            <div class="nk-iv-wg2">
                                <div class="nk-iv-wg2-title text-white">
                                    <h6 class="title text-white">Incorrect <em class="icon ni ni-cross"></em></h6>
                                </div>
                                <div class="nk-iv-wg2-text">
                                    <div class="nk-iv-wg2-amount text-white"> {{$data->incorrect}}</div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .card -->
                </div><!-- .col -->
                <div class="col-md-3 col-lg-3">
                    <div class="nk-wg-card is-s1 card card-bordered bg-info">
                        <div class="card-inner">
                            <div class="nk-iv-wg2">
                                <div class="nk-iv-wg2-title">
                                    <h6 class="title text-white">Un-Attempt <em class="icon ni ni-stop"></em></h6>
                                </div>
                                <div class="nk-iv-wg2-text">
                                    <div class="nk-iv-wg2-amount text-white"> {{$data->unattempt}}</div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .card -->
                </div><!-- .col -->
                <div class="col-md-3 col-lg-3">
                    <div class="nk-wg-card is-s1 card card-bordered bg-warning">
                        <div class="card-inner">
                            <div class="nk-iv-wg2">
                                <div class="nk-iv-wg2-title">
                                    <h6 class="title text-white">Review <em class="icon ni ni-info"></em></h6>
                                </div>
                                <div class="nk-iv-wg2-text">
                                    <div class="nk-iv-wg2-amount text-white"> {{$data->review}}</div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .card -->
                </div><!-- .col -->
            </div><!-- .row -->
            <div class="row gy-gs">
                <div class="col-md-12 col-lg-12">
                    <div class="nk-wg-card alert-info card card-bordered">
                        <div class="card-inner">
                            <div class="nk-iv-wg2 text-center">
                                <div class="nk-iv-wg2-title">
                                    <h6 class="title">Your Result <em class="icon ni ni-info"></em></h6>
                                </div>
                                <div class="nk-iv-wg2-text text-center">
                                    <div class="nk-iv-wg2-amount d-block"> {{ $data->marks_obtained}}/{{($data->total_marks)}} </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .card -->
                    @php
                        $parameter =[
                            'id' =>$data->id,
                        ];
                    $parameter= Crypt::encrypt($parameter);
                    @endphp
                    <div class="text-center">
                        {{-- <a class="btn btn-primary mt-2" target="_blank" href="{{route('show_solution',$parameter)}}">View Solutions</a> --}}
                        <form action="{{route('generatePDF',['parameter' => $parameter , 'encrypted_user_id' =>Crypt::encrypt(Auth::user()->id)])}}" method="get"  class="d-inline-block">
                            @csrf

                            <input type="hidden" name="test" value="{{$data->test['name']}}">
                            <input type="hidden" name="batch" value="{{$data->batch['name']}}">
                            <input type="hidden" name="course_id" value="1">
                            <input type="hidden" name="test_id" value ="{{$data->id}}">
                            <input type="hidden" name="series" value="{{$data->batch['series']['name']}}">
                            <button class="btn btn-dim  btn-warning p-1 mt-2" href="" title="download"><i class="fas fa-cloud-download-alt"></i>&nbsp;Download</button>
                        </form>


                    </div>
                </div><!-- .col -->
            </div><!-- .row -->
        </div>
    </div><!-- .tab-pane -->

</div>

<hr class="hr-4">





@endif


