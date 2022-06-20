@extends('website.Layout.master') @section('meta_title')
<!-- Fav Icon  -->
<!-- Page Title  -->
<title>Payment Success Page | IAS STUDY HUB</title>
<!-- StyleSheets  -->
<style type="text/css">
    .table-responsive > .table-bordered {
        border: 1px solid #dbdfea !important;
    }
</style>
@endsection
 @section('content')
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered card-stretch">
                        <div class="card-inner-group">
                            <!-- .card-inner -->
                            <!-- .card-inner -->
                            <div class="card-inner">
                                <div class="g-3">
                                    <div class="main-contents">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-lg table-striped">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2" class="text-center font-24 text-primary text-uppercase">Payment Completed</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>Order ID</th>
                                                        <td>{{$datas->order_id}}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Course Name</th>
                                                        <td>
                                                            @foreach($course_list as $course)
                                                            {{$course->subject}} <br> @endforeach
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td class="text-right">Total Amount</td>
                                                        <td class="text-success font-24"><b>&#8377;{{$datas->amount}}</b></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>

                                        {{--
                                        <div>
                                            <div class="success-icon">&#10004;</div>
                                            <div class="success-title">
                                                Payment Complete
                                            </div>
                                            <div class="order-details">
                                                <div class="order-number-label">Order ID</div>
                                                <div class="order-number">{{$datas->order_id}}</div>
                                            </div>
                                            @if ($datas->course_id == 1)
                                            <div class="order-details">
                                                <div class="order-number-label">Batch Name</div>
                                                <div class="order-number">{{$batch->name}}</div>
                                            </div>
                                            <div class="order-details">
                                                <div class="order-number-label">Series Name</div>
                                                <div class="order-number">{{$batch->series->name}}</div>
                                            </div>
                                            @elseif($datas->course_id ==3) @if(isset($decrypt_id)>0)
                                            <div class="order-details">
                                                <div class="order-number-label">Category Name</div>
                                                @foreach($previous_year_subject as $subject)
                                                <div class="order-number">{{$subject->name}}</div>
                                                @endforeach
                                            </div>
                                            @else
                                            <div class="order-details">
                                                <div class="order-number-label">Category Name</div>
                                                <div class="order-number">{{$previous_year_subject->name}}</div>
                                            </div>
                                            @endif @else @if(isset($decrypt_id)>0)
                                            <div class="order-details">
                                                <div class="order-number-label">Category Name</div>
                                                @foreach($question_bank as $question) {{$question->subject}} @endforeach
                                            </div>
                                            @else
                                            <div class="order-details">
                                                <div class="order-number-label">Category Name</div>
                                                <div class="order-number">{{$question_bank->subject}}</div>
                                            </div>
                                            @endif @endif

                                            <div class="order-details">
                                                <div class="order-number-label">Amount</div>
                                                <div class="order-number">{{$datas->amount}}</div>
                                            </div>
                                            <div class="order-footer">Thank you!</div>
                                        </div>
                                        --}}
                                        <div class="text-center w-100 d-block my-3" >

                                        <a href="{{url()->previous()}}" class="btn btn-primary btn-sm text-center">Back to Course Page</a>

                                        {{-- <a href="{{route('previousYearTestIndex',['category' => $previous_year_subject->slug])}}" class="btn btn-primary btn-sm text-center">Back to Course Page</a>
                                        @endif @elseif($datas->course_id == 2) @if(isset($decrypt_id)>0)

                                        <a href="{{route('getQuestionBankPages',['category' => $questionbank_first->slug])}}" class="btn btn-primary btn-sm text-center">Back to Course Page</a>
                                        @else

                                        <a href="{{route('getQuestionBankPages',['category' => $datas->qbbatch->slug])}}" class="btn btn-primary btn-sm text-center">Back to Course Page</a>
                                        @endif
                                        @endif --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .card-inner-group -->
                        </div>
                        <!-- .card -->
                    </div>
                    <!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
</div>

    @endsection
