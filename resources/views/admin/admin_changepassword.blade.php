@extends('admin.layouts.master')
@section('content')
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
<div class="nk-block-head-content">
    <h3 class="nk-block-title page-title">Update Password</h3>
</div>
    </div></div>
<div class="container"pt-3>

    @if (Session::has('success_message'))
    <div class="alert alert-success fade show" role="alert">
        {{Session::get('success_message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    @endif

    @if (Session::has('error_message'))
    <div class="alert alert-danger  fade show " role="alert">
        {{Session::get('error_message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    @endif

<form action="{{route('update_pwd')}}" method="post" name="updatePasswordForm" id="updatePasswordForm">@csrf
    {{-- <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input class="form-control" value="{{Auth::guard('admin')->user()->email}}" style="width: 700px" readonly="" >
      </div> --}}
    <div class="form-group">
      <label for="exampleInputPassword1">Current Password</label>
      <input type="password" id="current_pwd" name="current_pwd" class="form-control" required="" placeholder="Enter Old Password">
      <span id="chkCurrentPwd"></span>
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">New Password</label>
        <input type="password" id="new_pwd" name="new_pwd" class="form-control" required="" placeholder="Enter New Password">
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Confirm New Password</label>
        <input type="password" class="form-control" id="confirm_pwd" name="confirm_pwd" required="" placeholder="Confirm New Password">
      </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
  @endsection
