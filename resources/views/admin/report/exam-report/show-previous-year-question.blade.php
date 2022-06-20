@extends('admin.layouts.master') @section('content')

@section('content')

<div class="card">
    <div class="card-inner">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="title nk-block-title">Previous Year Question Reports</h4>
            </div>
        </div>
        <div class="card card-preview">
            <div class="card-inner">
                <table class="datatable-init table ">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Amount</th>
                            <th scope="col">No.of.Categories in Series</th>
                            <th scope="col">No.of.Subscribed Users</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $key => $category)
                       <tr id="sid{{$category->id}}">
                       <td>{{$key+1}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->price}}</td>
                       <td>
                            @if ($category->categorycount != null)
                            {{$category->categorycount}}
                            @else
                            <span>NA</span>
                            @endif
                        </td>
                          <td> @if ($category->usercount != null)
                            {{$category->usercount}}
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
