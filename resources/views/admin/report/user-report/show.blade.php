@extends('admin.layouts.master') @section('content')

@inject('userShow', 'App\Http\Controllers\Admin\UserReportController')


@section('content')

<div class="row">
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title">
            Users Reports<a href="{{route('daily_quiz')}}" class="btn btn-secondary btn-rounded float-right"> <em class="icon ni ni-chevrons-left"></em> Back</a>
        </h3>
    </div>
</div>

<div class="card">
    <div class="card-inner">
        <ul class="nav nav-tabs mt-n3">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#userTab"><em class="icon ni ni-user"></em><span>User Info</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#courseTab"><em
                class="icon ni ni-book-fill"></em><span>Courses</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#orderTab"><em class="icon ni ni-sign-inr"></em><span>Orders</span></a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="userTab">
                <div class="nk-block nk-block-lg">
                    <div class="card">
                        <div class="card-inner">
                            <form action="#">
                                <div class="">
                                    
                                    <div class="form-group row">
                                        <label class="form-label col-md-3" for="full-name">Full Name</label>
                                        <div class="col-md-9"> 
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" value="{{$fullname}} " readonly
                                                id="full-name">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="form-label col-md-3" for="email-address">Email address</label>
                                        <div class="col-md-9"> 
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" value="{{$datas->email}}"
                                                readonly id="email-address">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group row">
                                        <label class="form-label col-md-3" for="gender">Gender</label>
                                        <div class="col-md-9"> 
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control"
                                                value=" {{ ($datas->gender==1) ? 'Male' : 'Female' }}" readonly
                                                id="gender">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group row">
                                        <label class="form-label col-md-3" for="phone">Phone No</label>
                                        <div class="col-md-9"> 
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" value="{{$datas->phone}}"
                                                readonly id="phone">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="form-label col-md-3" for="address1">Address 1</label>
                                        <div class="col-md-9"> 
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" value="{{$datas->address1}}"
                                                readonly id="address1">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="form-label col-md-3" for="address2">Address 2</label>
                                        <div class="col-md-9"> 
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" value="{{$datas->address1}}"
                                                readonly id="address2">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="form-label col-md-3" for="country">Country</label>
                                        <div class="col-md-9"> 
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" value="{{$country_name}}"
                                                readonly id="country">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="form-label col-md-3" for="state">State</label>
                                        <div class="col-md-9"> 
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" value="{{$state_name}}" readonly
                                                id="state">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="form-label col-md-3" for="city">City</label>
                                        <div class="col-md-9"> 
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" value="{{$city_name}}" readonly
                                                id="city">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="courseTab">
                
                <div class="card card-preview">
                    
                    <table class="datatable-init table ">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Course Name</th>
                                <th scope="col">Series Name</th>
                                <th scope="col">Batch Name</th>
                                <th scope="col">Order ID</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Purchased Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $key => $course)
                            <tr id="sid{{$course->id}}">
                                <td>{{$key+1}}</td>
                                <td>{{$course->type['name']}}</td>
                                <td >
                                    @if ($course->course_id ==1)
                                    {{$course->batch->series['name']}}
                                    @elseif($course->course_id ==2)
                                    {{$course->qbbatch['subject']}}
                                    @elseif($course->course_id ==3)
                                    {{$course->pyqbatch['name']}}
                                    @endif
                                </td>
                                <td>
                                    @if ($course->course_id ==1)
                                    {{$course->batch->name}}
                                    @elseif($course->course_id ==2)
                                    {{ "NA" }}
                                    @endif
                                </td>
                                <td>{{$course->order_id}}</td>
                                <td>{{$course->amount}}</td>
                                <td>{{date('d-m-Y',strtotime($course->date))}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
                
            </div>
            <div class="tab-pane" id="orderTab">
                <div class="card card-preview">
                    
                    <table class="datatable-init table ">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Order ID</th>
                                <th scope="col">Course Type</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th>
                                <th scope="col">Purchased Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $key => $payment)
                            <tr id="sid{{@$payment->id}}">
                                <td>{{$key+1}}</td>
                                <td>{{$payment->order_id}}</td>
                                <td >
                                    {{$payment->type['name']}}
                                </td>
                                <td>{{@$payment->amount}}</td>
                                <td>@if ($payment->status == 1)
                                    <span class="btn btn-xs btn-dim btn-outline-success">Success</span>
                                    @else
                                    <span class="btn btn-xs btn-dim btn-outline-danger">Failure</span>
                                @endif</td>
                                <td>{{ date('d-M-Y h:i A',strtotime($payment->created_at))  }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
