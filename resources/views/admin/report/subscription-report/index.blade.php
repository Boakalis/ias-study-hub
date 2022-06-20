@extends('admin.layouts.master') @section('content')
<div class="row">
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title">
            Subscription Report
        </h3>
    </div>
</div>


<div class="card card-preview">
    <div class="card-inner">
        <table class="table datatable-init table-bordered table-responsive-lg table-hover">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center" scope="col">No</th>
                    <th scope="col">Order ID</th>
                    <th scope="col">Course</th>
                    <th scope="col">Batch</th>
                    <th scope="col">Date</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Amount</th>


                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $key => $data)
                <tr id="sid{{$data->id}}">
                    <td class="text-center" scope="row">{{$key+1}}</td>
                    <td class="text-center">{{ $data->order_id }}</td>
                    <td class="text-center">{{ $data->type['name'] }}</td>
                    <td class="text-center">
                    @if ($data->course_id == 1)
                        {{ @$data->batch->series['name']}}
                    @elseif($data->course_id == 3)
                        @if($data->batch_id=='PREMIUM')
                        All
                        @else
                        {{$data->pyqbatch['subject']}}
                        @endif
                    @else
                        @if($data->batch_id=='PREMIUM')
                            All
                        @else
                            {{$data->qbbatch['subject']}}
                        @endif
                    @endif
                    </td>
                    <td class="text-center">{{ date('d-M-y',strtotime($data->date)) }}</td>
                    <td class="text-center">{{ $data->user['fname'] }}</td>
                    <td class="text-center">{{ $data->amount }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



@endsection


@section('javascript')


<script>
    //Script For Auto-Closing Alert
    $(".alert").delay(1500).fadeOut(300);
</script>

@endsection
