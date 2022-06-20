@extends('website.Layout.master')
@section('title','DAILY QUIZ')
@section('content')
<?php  use Illuminate\Support\Facades\Crypt; ?>
<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="nk-block-head-content">
                        <div class="nk-block-des">
                            <p></p>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card card-bordered">

                                <div class="card-inner card-inner-md">
                                    <a href="{{url()->previous()}}" class="float-right " ><em class="icon ni ni-arrow-left backarrow"></em> </a>

                                    <h4 class="nk-block-title">Daily Free Quiz</h4>

                                    <div class="row">
                                        @if(!$quizs->isEmpty())
                                        @foreach($quizs as $quiz)
                                            <div class="col-xl-3">
                                                <div class="card daily-quiz-box">
                                                    {{-- <a class="" href="{{ route('getDailyQuizMonth',$year->year) }}">
                                                    <img src="{{asset('images/calendar.jpg')}}" class="card-img-top" />
                                                    <div class="card-inner card-sm p-1">
                                                        <h6 class="mt-3 mb-3">{{ $year->year }}</h6>
                                                        <div class="clear"></div>
                                                    </div>
                                                    </a> --}}
                                                    @php($encrypted_id= Crypt::encryptString($quiz->id))
                                                    <a href="{{  route('quizTestPage',$encrypted_id) }}" class=" {{Auth::check()?'':'test_attend'}} btn btn-hover color-1 text-uppercase font-16 text-white" style="border-radius:0%" > <span class="text-center" >{{$quiz->name}}</span> </a>
                                                </div>
                                            </div><!-- .col -->
                                            @endforeach
                                            @endif

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
<!-- content @e -->
@endsection
