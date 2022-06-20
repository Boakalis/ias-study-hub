@extends('admin.layouts.master') @section('content')
<div class="row">
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title">
            Users Report
        </h3>
    </div>
</div>

<div class="table px-2">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg) @if(Session::has('alert-' . $msg))
    <div class="alert alert-success alert-dismissible fade show alert-{{ $msg }}" role="alert">
        <strong></strong>{{ Session::get('alert-' . $msg) }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif @endforeach @if (Session::has('error_message'))
    <div class="alert alert-danger fade show" role="alert">
        {{Session::get('error_message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
</div>

<div class="card card-preview">
    <div class="card-inner">
        <table class="table datatable-init table-bordered table-responsive-lg table-hover">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center" scope="col">No</th>
                    <th scope="col">User ID</th>
                    <th scope="col">User Email Address</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($username as $key => $user)
                <tr id="sid{{$user->id}}">
                    <td class="text-center" scope="row">{{$key+1}}</td>
                    <td class="text-center" scope="row">{{$user->id}}</td>
                    <td class="text-center" scope="row">{{$user->email}}</td>
                    <td class="text-center">{{ $user->fname }}&nbsp{{$user->lname }}</td>
                    <td class="text-center">
                        @if ( $user->status == 1 )
                        <span class="btn btn-xs btn-dim btn-outline-success">Active</span>
                        @else
                        <span class="btn btn-xs btn-dim btn-outline-danger">Inactive</span>
                        @endif
                    </td>
                    <td class="text-center">
                            <a href="{{ route('show-user',$user->id) }}" class="btn btn-icon btn-xs btn-secondary"><em class="icon ni ni-eye "></em>View Report</a>
                    </td>
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
