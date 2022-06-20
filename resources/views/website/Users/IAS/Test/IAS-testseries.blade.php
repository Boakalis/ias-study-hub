@php($generalSetting = \App\Models\SettingGeneral::first())
@extends('website.TestLayout.master')
@section('title', $test_questions->name.'|'.$test_questions->batch->name.'|'.$test_questions->batch->series->name)
@section('content')

<!-- content -->
{{--<div class="navbar-area box-shadow-bottom bg-white">


    <div class="main-navbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-md navbar-light d-block text-center p-0">
                        <a class="navbar-brand" href="{{'/'}}">
                            <img style="height: 35px" src="{{ asset($generalSetting->logo) }}" alt="" class="light-version-logo">
                        </a>

                    </nav>
                </div>

            </div>
        </div>
    </div>


</div>--}}

<div class="nk-content p-0">
    <div class="container-fluid p-0">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                 <form action="{{route('sessionupdate',$test_questions->id)}}" method="POST" id="sessionupdate"  enctype="multipart/form-data" >
                    @csrf()
                    <div class="card card-bordered">
                        <div class="card-aside-wrap test-questions">
                            <div class="card-inner card-inner-lg p-0">


                                <!-- .nk-block-head -->
                                <div class="nk-block">


                                    <div class="card-header bg-white border-bottom position-fixed-top">
                                        <h5 class="text-primary text-uppercase"><span class=" current-exam-title">{{$test_questions->name}}</span>
                                            <div class="float-right">
                                                <span class="d-inline-block text-center">

                                                </span>

                                                <div class="d-lg-none d-inline-block">
                                                    <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside" id="custom-sidebar-toggle" ><em class="icon ni ni-menu-alt-r"></em></a>
                                                </div>
                                            </div>
                                            <span class="float-right min-remainig text-center  text-danger"><i class="far fa-clock"></i>
                                                <span id="time" class="" data-time="{{$test_questions->duration}}" >00:00
                                                </span>
                                            </span>

                                        </h5>
                                    </div>
                                    <div class="card-body mt-5">



                                        @if($question_count >0)
                                        @php($question_key = 1)
                                        @foreach($test_questions->questions as $key => $question)
                                        <div class="question-ans" data-id="{{ $question->question->id }}" data-simplebar
                                            style="display:{{ ($question_key ==1)?'block':'none'  }}" id="question-{{ $question_key }}">
                                            <div class="">
                                                <div class="test-questions w-100 d-block mb-4">
                                                    <h6 class="card-title" >Question {{ $question_key }}:

                                                    </h6>

                                                    <div class="card-text text-questions-details">{!! $question->question->question !!}</div>


                                                    <div class="custom-control custom-radio mr-3 p-0 text-left">
                                                        <input type="radio"  data-option="1" id="questans-{{ $question->question->id }}-1" name="questionans[{{$question->question->id}}]" class="custom-control-input option-answer" value="1" data-question-id="{{ $question_key }}">
                                                        <label class="custom-control-label w-100" for="questans-{{ $question->question->id  }}-1">{!! $question->question->option_1 !!}</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mr-3 p-0 text-left">
                                                        <input type="radio"  data-option="2" id="questans-{{ $question->question->id }}-2" name="questionans[{{$question->question->id}}]" class="custom-control-input option-answer" value="2" data-question-id="{{ $question_key }}">
                                                        <label class="custom-control-label w-100" for="questans-{{ $question->question->id }}-2">{!! $question->question->option_2 !!}</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mr-3 p-0 text-left">
                                                        <input type="radio"  data-option="3" id="questans-{{ $question->question->id }}-3" name="questionans[{{$question->question->id}}]" class="custom-control-input option-answer" value="3" data-question-id="{{ $question_key }}">
                                                        <label class="custom-control-label w-100" for="questans-{{ $question->question->id }}-3">{!! $question->question->option_3 !!}</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mr-3 p-0 text-left">
                                                        <input type="radio" data-option="4" id="questans-{{ $question->question->id }}-4" name="questionans[{{$question->question->id}}]" class="custom-control-input option-answer" value="4" data-question-id="{{ $question_key }}">
                                                        <label class="custom-control-label w-100" for="questans-{{ $question->question->id }}-4">{!! $question->question->option_4 !!}</label>
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        @php($question_key++)
                                        @endforeach
                                        @endif
                                        <div id="mark-as-review">

                                        </div>
                                        <input type="hidden" value="{{$test_questions->type}}" name="type"  >
                                        <input type="hidden"  name="course_id" value= "1">
                                        <input type="hidden" name="test_name" value="{{$test_questions['name']}}">
                                        <input type="hidden" name="series_name" value="{{$test_questions->batch->series['name']}}">
                                        <input type="hidden" name="batch_name" value="{{$test_questions->batch['name']}}">
                                        
                                        <input type="hidden" name="url" value="{{url()->previous()}}">

                                    </div>


                                    <div class="card-footer text-muted bg-white test-buttons border-top position-fixed-bottom">
                                        <button type="button" class="btn btn-outline-danger text-uppercase font-weight-bolder rounded-0" id="previous"><i class="icon ni ni-back-ios"></i> <span class="btn-label  " title="previous">Previous</span></button>
                                        <button type="button" class="btn btn-outline-danger text-uppercase font-weight-bolder rounded-0" id="clear"> <i class="icon ni ni-cross-circle"></i> <span class="btn-label" title="Clear">Clear</span></button>
                                        <button type="button" class="btn btn-outline-danger mark-for-review text-uppercase font-weight-bold rounded-0" title="Mark For Review"> <i class="icon ni ni-question-alt"></i> <span class="btn-label"> Mark For Review</span></button>
                                        <button type="button" class="btn btn-outline-danger text-uppercase font-weight-bolder rounded-0" id="next" title="Save & Next"><span class="btn-label">Save & Next</span> <i class="icon ni ni-forward-ios p-0"></i> </button>
                                        <button type="button"  class="btn btn-primary exam-submit text-uppercase font-weight-bolder rounded-0" title="Submit" data-toggle="modal" data-target="#submit-quiz"><i class="icon ni ni-check"></i> Submit</button>
                                    </div>

                                </div><!-- .nk-block -->
                            </div>
                            <div class="card-aside card-aside-right user-aside toggle-slide toggle-slide-left toggle-break-lg test-answers" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                                <div class="card-inner-group" data-simplebar>


                                    <div class="card-inner p-0  answer-bg">
                                        <div class="card-header bg-transparent">
                                            <div class="test-answers-info mb-2">
                                                <div class="btn-group btn-group-md d-block" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn btn-success rounded-0"><span id="answered_count" title="Answered">1 </span> Attempted</button>
                                                    <button type="button" class="btn btn-danger rounded-0"><span id="review_count" title="Not Answered">2 </span> Review</button>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="test-answers-list mb-5 ">
                                                <ul>
                                                    @if($question_count > 0)
                                                    @for($i=1;$i<=$question_count;$i++)
                                                    <li><span class=" btn btn-md {{ ($i ==1)?'btn-secondary':'btn-outline-secondary' }} question custom-click " title="Question" data-qno="{{ $i }}" id="question-button-{{$i}}">{{ $i }}</span></li>
                                                    <input type="hidden" name="questionarray[{{$i}}]" id="totalquestion" value="{{$i}}">
                                                    @endfor
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        {{--<div class="card-footer bg-white text-center">
                                            <button type="button"  class="btn btn-primary exam-submit text-uppercase font-weight-bolder rounded-0" title="Submit" data-toggle="modal" data-target="#submit-quiz"><i class="icon ni ni-send"></i> <span class="btn-label">Finish</span></button>
                                        </div>--}}
                                    </div>
                                    <!-- .card-inner -->
                                </div><!-- .card-inner-group -->
                            </div><!-- card-aside -->
                        </div><!-- .card-aside-wrap -->
                    </div><!-- .card -->
                </form>
            </div><!-- .nk-block -->
        </div>
    </div>
</div>
</div>

<!-- Modal Content Code -->
<div class="modal fade zoom submit-modal" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <!-- <div class="modal-header">
                <h5 class="modal-title">Complete Quiz</h5>
            </div> -->
            <div class="modal-body modal-body-md text-center">
                <h4 class="modal-title">Are you sure want to complete?</h4><br>
                <div class="row">
                    <div class="col-md-6"> <h6>Total Question : {{ $question_count }} </h6></div>
                    <div class="col-md-6"><h6 id="modal-answered-count">Answered : </h6></div>

                </div><br>
                <div class="row">
                    <div class="col-md-6"><h6 id="modal-review-count" name="review">Review :    </h6></div>
                    <div class="col-md-6"><h6 id="modal-not-attempt-count" name="not attempt">Not Attempt :    </h6></div>
                </div><br>
                <div class="text-center">
                    <button type="button" class="btn btn-danger close-modal" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-success" id="submit-test" >Yes</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- content @e -->

<div class="modal fade zoom" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row w-100">
                    <!-- <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 ">
                        <img style="width: 212px;height:92px;" src="{{asset($test_questions->batch->series['image'])}}" alt="">
                    </div> -->
                    <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9 ">
                        <h5 class="mt-2 mb-2 text-primary" >{{$test_questions->name}}</h5>
                        <span>SERIES : {{$test_questions->batch->series['name']}}</span><br>
                        <span>BATCH : {{$test_questions->batch['name']}}</span>
                    </div>
                    <div class="col-md-3 mt-2 mb-2 col-lg-3 col-sm-3 col-xs-3 ">
                        <a href="{{url()->previous()}}" class=" float-right  btn btn-light" >Back</a>
                    </div>
                </div>
            </div>

            <div class="modal-body" id="showBody">
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-xs-4 col-lg-4 ">
                        <div class="row">
                            <h5 class="col-md-12 col-sm-12 col-xs-12 col-lg-12" >Test Details:</h5>

                            <table class="table table-bordered table-md table-striped">
                                <tbody>
                                    <tr>
                                        <td><i class="far fa-clipboard fa-lg text-info font-24 mr-1"></i> Questions</td>
                                        <th>{{$test_questions->questions->count()}} </th>
                                    </tr>
                                    <tr>
                                        <td><i class="far fa-check-circle fa-lg text-danger font-24 mr-1"></i> Minutes</td>
                                        <th>{{$test_questions->duration}}</th>
                                    </tr>
                                    <tr>
                                        <td><i class="far fa-clipboard fa-lg text-success font-24 mr-1"></i> Total Marks</td>
                                        <th>{{($test_questions->questions->count())*($test_questions->mark)}}</th>
                                    </tr>
                                    <tr>
                                        <td><i class="far fa-clipboard fa-lg text-warning font-24 mr-1"></i> Negative Mark</td>
                                        <th>{{@$test_questions->negativemark}}</th>
                                    </tr>
                                </tbody>
                            </table>
                            {{--<div class="col-md-6 col-sm-6 col-xs-6 mt-2 mb-2 col-lg-6 ">
                                <i  style="font-size: 30px" class=" col-md-6 col-sm-6 col-xs-6 col-lg-6 float-left far fa-clipboard fa-lg text-info "></i>

                                <span class=" col-md-6 col-sm-6 col-xs-6 col-lg-6 float-left " >
                                    <span class=" float-right" style="font-size: 20px" >{{$test_questions->questions->count()}}</span><br>

                                    <span>Questions</span> </span>
                            </div>
                            <div class="col-md-6 col-sm-6 mt-2 mb-2 col-xs-6 col-lg-6 ">
                                <i  style="font-size: 30px" class=" text-danger col-md-6 col-sm-6 col-xs-6 col-lg-6 float-left far fa-clock fa-lg "></i>

                                <span class=" col-md-6 col-sm-6 col-xs-6 col-lg-6 float-left " >
                                    <span class=" float-right" style="font-size: 20px" >{{$test_questions->duration}}</span><br>

                                    <span>Minutes</span> </span>
                            </div>
                            <div class="col-md-6 mt-2 mb-2 col-sm-6 col-xs-6 col-lg-6 ">
                                <i  style="font-size: 30px" class=" col-md-6 text-success col-sm-6 col-xs-6 col-lg-6 float-left far fa-check-circle fa-lg "></i>

                                <span class=" col-md-6 col-sm-6 col-xs-6 col-lg-6 float-left " >
                                    <span class=" float-right" style="font-size: 20px" >{{($test_questions->questions->count())*($test_questions->mark)}}</span><br>

                                    <span>Total Marks</span> </span>
                            </div>
                            <div class="col-md-6 mt-2 mb-2 col-sm-6 col-xs-6 col-lg-6 ">
                                <i  style="font-size: 30px" class=" col-md-6 col-sm-6 col-xs-6 col-lg-6 float-left fas fa-minus-circle fa-lg "></i>

                                <span class=" col-md-6 col-sm-6 col-xs-6 col-lg-6 float-left " >
                                    <span class=" float-right" style="font-size: 20px" >{{@$test_questions->negativemark}}</span><br>
                                    <span>Negative Mark</span> </span>
                            </div>--}}
                        </div>
                    </div>
                   <div class="col-md-8 col-sm-8 col-xs-8 col-lg-8 list list-lg list-checked-circle list-success ">
                        <h5>Test Instructions:</h5>
                        <p>
                            <ul>
                                <li>
                                    The exam comprises of the following types of questions: - Multiple Choice Single Response (MCSR) - Multiple Choice Multiple Response (MCMR) <br>
                                </li>
                                 <li> There will be 0.6 negative marking for every wrong question .<br></li>
                                 <li>There is a timer at the upper-right corner of the exam screen that indicates the time remaining for the completion of the exam.</li>
                            </ul>

                        </p>
                    </div>
                  </div>
            </div>
            <div class="modal-footer" style="justify-content: center" >
                <a href="{{url()->previous()}}" class=" " data-dismiss="modal" aria-label="Close">
                    <button  class=" text-dark btn btn-success btn-lg">Proceed</button>
                </a>
            </div>
        </div>
    </div>
</div>


@endsection

@section('javascript')
<script type="text/javascript">

        //If User Reload tht page they must confirm the reload alert
        window.onbeforeunload = function() {
            return "Hey, you're leaving the site. Bye!";
        };

        var question_no = 1;
        var review_count = answered_count = 0;
        var not_attempt = "{{ $question_count }}";
        var mark_for_review = [];
        var question_id=$('.question-ans').data('id');

        $(function(){
          updateCount();
      })

        function updateCount(){
            $('#review_count').html(review_count);
            $('#answered_count').html(answered_count);
            $('#modal-review-count').html('Review : '+review_count);
            $('#modal-answered-count').html('Answered : '+answered_count);
            $('#modal-not-attempt-count').html('Not Attempt : '+not_attempt)
        }

        $('.question').on('click',function(){

            /** Change Question Button Color to Normal */
            $('#question-button-'+question_no+'.question').removeClass('btn-secondary');
            if($('#question-button-'+question_no+'.question').hasClass('btn-success') != 1){
                $('#question-button-'+question_no+'.question').addClass('btn-outline-secondary');
            }

            /** Hide All Questions */
            $('.question-ans').css('display','none');

            /** Change Button Color to Active */
            $(this).removeClass('btn-outline-secondary');

            if($(this).hasClass('btn-success') != 1){
                $(this).addClass('btn-secondary');
            }

            /** Show Question based on Number */
            question_no = $(this).data('qno');
            $('#question-'+question_no).css('display','block');
        })

        $('.option-answer').on('click',function(){

         /** Change Button Color to Answered */
         var question = $(this).data('question-id');
         $('#question-button-'+question+'.question').removeClass('btn-secondary');
         $('#question-button-'+question+'.question').removeClass('btn-danger');
         if($('#question-button-'+question_no+'.question').hasClass('btn-success') != 1){
            answered_count+=1;
            not_attempt-=1;
        }
        $('#question-button-'+question+'.question').addClass('btn-success');
        updateCount();

    })


        $('#next').on('click',function()
        {
            var count = "{{ $question_count }}";

            /** Change Question Button Color to Normal */
            $('#question-button-'+question_no+'.question').removeClass('btn-secondary');
            if($('#question-button-'+question_no+'.question').hasClass('btn-success') != 1 && $('#question-button-'+question_no+'.question').hasClass('btn-danger') != 1){
                $('#question-button-'+question_no+'.question').addClass('btn-outline-secondary');
            }

            question_no+=1;

                 /** Change Current question to Next question
                      If Last Question comes Disable the Next Button
                      */
                      if(count >= question_no){

                        /** Show Next Question */
                        $('.question-ans').css('display','none');
                        $('#question-'+question_no).css('display','block');

                        /** Change Button Color to Visited */
                        $('#question-button-'+question_no+'.question').removeClass('btn-outline-secondary');
                        if($('#question-button-'+question_no+'.question').hasClass('btn-success') != 1){
                            $('#question-button-'+question_no+'.question').addClass('btn-secondary');
                        }

                    }else{
                        question_no-=1;
                        /** Change Button Color to Visited */
                        $('#question-button-'+question_no+'.question').removeClass('btn-outline-secondary');
                        if($('#question-button-'+question_no+'.question').hasClass('btn-success') != 1){
                            $('#question-button-'+question_no+'.question').addClass('btn-secondary');
                        }
                        $('.submit-modal').modal('show');
                    }

                })

        $('.close-modal').click(function(){
            $('.submit-modal').modal('hide');
        })

        $('.exam-submit').click(function(){
            $('.submit-modal').modal('show');
        })

        $('#previous').on('click',function()
        {
            if(question_no != 1){

             /** Change Question Button Color to Normal */
             $('#question-button-'+question_no+'.question').removeClass('btn-secondary');
             if($('#question-button-'+question_no+'.question').hasClass('btn-success') != 1 && $('#question-button-'+question_no+'.question').hasClass('btn-danger') != 1){
                $('#question-button-'+question_no+'.question').addClass('btn-outline-secondary');
            }

            question_no-=1;

            /** Change Question Button Color to Normal */
            $('#question-button-'+question_no+'.question').removeClass('btn-outline-secondary');
            if($('#question-button-'+question_no+'.question').hasClass('btn-success') != 1 && $('#question-button-'+question_no+'.question').hasClass('btn-danger') != 1){
                $('#question-button-'+question_no+'.question').addClass('btn-secondary');
            }

            $('.question-ans').css('display','none');
            $('#question-'+question_no).css('display','block');

        }

    })

        $('.mark-for-review').on('click',function(){
            question_id=$('#question-'+question_no).data('id');

            if(jQuery.inArray(question_id, mark_for_review) == -1){
                review_count+=1;
                updateCount();
                mark_for_review.push(question_id);
                $('#mark-as-review').append('<input type="hidden" name="mark_as_review[]" value="'+question_id+'">');
            }

            /**Change Button Color to Review */
            $('#question-button-'+question_no+'.question').removeClass('btn-outline-secondary');
            if($('#question-button-'+question_no+'.question').hasClass('btn-success') != 1){
                $('#question-button-'+question_no+'.question').addClass('btn-danger');
            }

        })

        $('#clear').on('click',function()
        {
            $('#question-button-'+question_no+'.question').removeClass('btn-success');
            $('#question-button-'+question_no+'.question').addClass('btn-secondary');
            if(answered_count!=0)
            {
                answered_count-=1;
                not_attempt+=1;
                updateCount();
            }
            question_id=$('#question-'+question_no).data('id');
            $('#questans-'+question_id+'.option-answer').prop('checked',false);
            $('input[name="questionans['+question_id+']"]').prop('checked',false);
        })

        $('#submit-test').on('click',function(){
            window.onbeforeunload = null;
            $('form#sessionupdate').submit();
        })


    </script>


<script>
    $(window).on('load',function(){
        $('#showModal').modal('show');
     });
</script>

<script>
    $('#showModal').on('hidden.bs.modal', function () {
        let mint = $('#time').data('time');
        if ($('#time').length) {

            function countdown( elementName, minutes, seconds )
            {
                var element, endTime, hours, mins, msLeft, time;
                function twoDigits( n )
                {
                    return (n <= 9 ? "0" + n : n);
                }
                function updateTimer()
                {
                    msLeft = endTime - (+new Date);
                    if ( msLeft < 1000 ) {
                        element.innerHTML = "Time is up!";
                        window.onbeforeunload = null;
                        $('form#sessionupdate').submit();

                    } else {
                        time = new Date( msLeft );
                        hours = time.getUTCHours();
                        mins = time.getUTCMinutes();
                        element.innerHTML = (hours ? hours + ':' + twoDigits( mins ) : mins) + ':' + twoDigits( time.getUTCSeconds() );
                        setTimeout( updateTimer, time.getUTCMilliseconds() + 500 );
                    }
                }
                element = document.getElementById( elementName );
                endTime = (+new Date) + 1000 * (60*minutes + seconds) + 500;
                updateTimer();
            }

            countdown( "time", mint, 0 );
        }

});
</script>

<script>
    $('#sessionupdate').on('submit',function(){
        $('#test-loader').css('display','block');
    })
</script>

<script>
    $('.custom-click').on('click',function(){
        if($('.content-active').length >0 ){
            $('#custom-sidebar-toggle').click();
         }
    })
</script>

@endsection
