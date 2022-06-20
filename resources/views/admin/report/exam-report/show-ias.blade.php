@extends('admin.layouts.master') @section('content')

@section('content')

<div class="card">
    <div class="card-inner">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="title nk-block-title">IAS Exam Reports</h4>
            </div>
        </div>
        <div class="card card-preview">
            <div class="card-inner">
                <table class="datatable-init table ">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Series Name</th>
                            <th scope="col">Batch Name</th>
                            <th scope="col">Amount</th>
                            <th scope="col">No.of.Tests in Batch</th>
                            <th scope="col">No.of.Subscribed Users</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($batches as $key => $batch)
                <tr id="sid{{$batch->id}}">
                       <td>{{$key+1}}</td>
                        <td>{{$batch->series['name']}}</td>
                        <td>
                            {{$batch->name}}
                        </td>
                        <td>{{$batch->price}}</td>
                        <td>
                            @if ($batch->testcount != null)
                            {{$batch->testcount}}
                            @else
                            <span>NA</span>
                            @endif
                        </td>
                        <td> @if ($batch->usercount != null)
                            {{$batch->usercount}}
                            @else
                            <span>NA</span>
                            @endif</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
