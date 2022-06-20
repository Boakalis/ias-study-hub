@extends('website.Layout.master')
@section('title','DAILY QUIZ')
@section('content')

<!-- content @s -->
<div class="nk-content ">

    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-aside-wrap">
                            <div class="card-inner card-inner-md">
                                <div class="nk-block-head nk-block-head-md">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h4 class="nk-block-title text-uppercase ">Daily Quiz</h4>

                                            <div class="nk-block-des">
                                                <p></p>
                                            </div>
                                        </div>
                                        <a href="{{url()->previous()}}" class="float-right " ><em class="icon ni ni-arrow-left backarrow"></em> </a>

                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block ">

                                    <div class="row">
                                        @if(!$years->isEmpty())
                                        @foreach($years as $key => $year)
                                        <div class="col-xl-3">
                                            <div class="card daily-quiz-box">
                                                {{-- <a class="" href="{{ route('getDailyQuizMonth',$year->year) }}">
                                                <img src="{{asset('images/calendar.jpg')}}" class="card-img-top" />
                                                <div class="card-inner card-sm p-1">
                                                    <h6 class="mt-3 mb-3">{{ $year->year }}</h6>
                                                    <div class="clear"></div>
                                                </div>
                                                </a> --}}
                                                <a href="{{route('getDailyQuizList',['year' => $year->year,'month' => $year->month])}}"
                                                    class="btn btn-hover color-1 text-center text-uppercase " style="border-radius:0%" >
                                                    @switch($year->month)
                                                        @case($year->month = 1)
                                                            <span class="text-center" > January&nbsp;{{$year->year}}</span>
                                                            @break
                                                        @case($year->month = 2)
                                                            <span class="text-center" > Febuary&nbsp;{{$year->year}}</span>
                                                            @break
                                                        @case($year->month = 3)
                                                            <span class="text-center" > March&nbsp;{{$year->year}}</span>
                                                            @break
                                                        @case($year->month = 4)
                                                            <span class="text-center" > April&nbsp;{{$year->year}}</span>
                                                            @break
                                                        @case($year->month = 5)
                                                            <span class="text-center" > May&nbsp;{{$year->year}}</span>
                                                            @break

                                                        @case($year->month = 6)
                                                            <span>June&nbsp;{{$year->year}}</span>
                                                            @break
                                                        @case($year->month = 7)
                                                            <span>July&nbsp;{{$year->year}}</span>
                                                            @break
                                                        @case($year->month = 8)
                                                            <span>August&nbsp;{{$year->year}}</span>
                                                            @break
                                                        @case($year->month = 9)
                                                            <span>September&nbsp;{{$year->year}}</span>
                                                            @break
                                                        @case($year->month = 10)
                                                            <span>October&nbsp;{{$year->year}}</span>
                                                            @break
                                                        @case($year->month = 11)
                                                            <span>November&nbsp;{{$year->year}}</span>
                                                            @break
                                                        @case($year->month = 12)
                                                            <span>December&nbsp;{{$year->year}}</span>
                                                            @break
                                                        @default
                                                            <span>Something went wrong, please try again</span>
                                                    @endswitch</a>
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
<!-- content @e -->
@endsection

@section('javascript')
<script>
    // display a modal (small modal)
    $(document).on("click", ".test-show", function (event) {
        event.preventDefault();

        let href = $(this).attr("data-attr");
        $.ajax({
            url: href,
            beforeSend: function () {
                $("#loader").show();
            },
            // return the result
            success: function (result) {
                $('#showTest').empty();

                var testdetails = (result.html);
                var indexdiv = $('#showTest'); //create wrapper element
                indexdiv.append(testdetails); //move element into wrapper

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
    });

</script>


<script>
    function scrollWin() {
        window.scrollBy(0, 200);
    }

</script>

<script>
    $(document).on("click", ".test-page", function (event) {
        event.preventDefault();

        let href = $(this).attr("data-attr");
        $.ajax({
            url: href,
            beforeSend: function () {
                $("#loader").show();
            },
            // return the result
            success: function (result) {
                $('#showTest').empty();

                var testdetails = (result.html);
                var indexdiv = $('#showTest'); //create wrapper element

                // testdetails.after(indexdiv); //insert wrapper after found element
                indexdiv.append(testdetails); //move element into wrapper
                // $("#showTest").append($("#test-index").html(result.html));

            },
            complete: function () {
                $("#loader").hide();
            },
            error: function (jqXHR, testStatus, error) {
                console.log(error);
                // alert("Page " + href + " cannot open. Error:" + error);
                $("#loader").hide();
            },
            timeout: 8000,
        });
    });

</script>

<script type="text/javascript">
    function submitDetailsForm() {

        event.preventDefault();
        let id = $("#id").val();

        $.ajax({
            url: "/home/daily-quiz/test-submit/" + id,
            type: 'post',
            data: $("#sessionupdate").serialize(),
            beforeSend: function () {
                $("#loader").show();
            },
            // return the result
            success: function (result) {
                $('#showTest').empty();

                var testdetails = (result.html);
                var indexdiv = $('#showTest'); //create wrapper element
                // testdetails.after(indexdiv); //insert wrapper after found element
                indexdiv.append(testdetails); //move element into wrapper
                // $("#showTest").append($("#test-index").html(result.html));

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

</script>

@endsection
