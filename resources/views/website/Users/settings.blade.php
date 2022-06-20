@extends('website.Layout.master')
@section('meta_title')
 <!-- Page Title  -->
 <title>Settings | IAS STUDYHUB</title>
@endsection
@section('content')
 <!-- content @s -->
 <div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card">
                        <div class="card-aside-wrap">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head nk-block-head-lg">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h4 class="nk-block-title">Security Settings</h4>
                                            <div class="nk-block-des">

                                            </div>
                                        </div>
                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="card">
                                        <div class="card-inner-group">
                                            <div class="card-inner">
                                                <div class="between-center flex-wrap g-3">
                                                    <div class="nk-block-text">
                                                        <h6>Change Password</h6>
                                                        <p>Set a unique password to protect your account.</p>
                                                    </div>
                                                    <div class="nk-block-actions flex-shrink-sm-0">
                                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                                            <li class="order-md-last">
                                                                <button data-toggle="modal" data-target="#password-modal" id="password_button" class="btn btn-primary">Change Password</button>
                                                            </li>
                                                            @if (isset(Auth::user()->password_status) && !empty(Auth::user()->password_status))
                                                            <li>
                                                                <em class="text-soft text-date fs-12px">Last changed: <span>{{ isset(Auth::user()->password_status) && !empty(Auth::user()->password_status) ? date('d-F-Y', strtotime(Auth::user()->password_status)) : "" }}</span></em>
                                                            </li>

                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                        </div><!-- .card-inner-group -->
                                    </div><!-- .card -->
                                </div><!-- .nk-block -->
                            </div><!-- .card-inner -->
                            <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                                <div class="card-inner-group">
                                    <div class="card-inner">
                                        <div class="user-card">
                                            <div class="user-avatar">
                                                @if (Auth::user()->image != null)
                                                <img src="{{asset(asset(Auth::user()->image))}}" alt="User">
                                                    @else
                                                    <img src="{{asset('images/website/user-photos/default-image.png')}}" alt="User">
                                                    @endif
                                            </div>
                                            <div class="user-info">
                                                @if (Auth::user()->fullname == 1)
                                                <span class="lead-text"> {{Str::ucfirst(Auth::user()->fname) }}&nbsp;{{Auth::user()->lname}}</span>
                                                @else
                                                <span class="lead-text"> {{Str::ucfirst(Auth::user()->fname) }}</span>
                                                @endif
                                                <span class="sub-text">{{Auth::user()->email}}</span>
                                            </div>
                                        </div>
                                    </div><!-- .card-inner -->
                                    <div class="card-inner p-0">
                                        <ul class="link-list-menu">
                                            <li><a class="active" href="#"><em class="icon ni ni-lock-alt-fill"></em><span>Security Settings</span></a></li>
                                        </ul>
                                    </div><!-- .card-inner -->
                                </div><!-- .card-inner-group -->
                            </div><!-- .card-aside -->
                        </div><!-- .card-aside-wrap -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>


<!--Modal: Avatar-->
<div class="modal fade zoom" id="password-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

<div class="modal-dialog modal-sm cascading-modal modal-avatar" role="document"  >
    <!--Content-->
    <div class="modal-content">

    <div class="modal-header" style="justify-content: center" >
            <img style="height:100px;width:100px;"  src="{{ isset(Auth::user()->image) && !empty(Auth::user()->image) ? asset(Auth::user()->image) : asset('images/website/user-photos/default-image.png') }}" class=" text-center rounded-circle img-responsive">
        </div>
        <!--Body-->
        <div class="modal-body text-center mb-1">

            <h5 class="mt-1 mb-2">Hi , {{Auth::user()->fname}}</h5>

            <form  id="password-form" >
                @csrf
                <div class="md-form ml-0 mr-0">
                    <label for="new" class="ml-0">New password</label>
                    <input type="password" id="new" name="password"  class="form-control ml-0" autocomplete="off" >
                    <br>
                    <label for="confirm" class="ml-0">Confirm password</label>
                    <input type="password" id="confirm" name="confirm_pwd"  class="form-control ml-0" autocomplete="off" >
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-1 waves-effect waves-light">Update </button>
                </div>
            </form>


        </div>

    </div>
    <!--/.Content-->
</div>
</div>
<!--/Modal: Avatar-->
<!-- content @e -->
@endsection


@section('javascript')

<script>
    $( "#password-form" ).validate({
  rules: {
    password:{
        required: true,
      minlength: 8,
      maxlength: 20

    } ,
    confirm_pwd: {
      equalTo: "#new"
    }
  }
});

$('#password_button').on('click', function () {
    var validator = $('#password-form').validate();
    validator.resetForm();
    $(".error").removeClass("error");
    $('#password-form').trigger("reset");
})


</script>

<script>
</script>

<script>

    $("#password-form").on("submit",function (e) {
        e.preventDefault();
        $.ajax({
            url: "{{route('password-update')}}",
            type: "post",
            data: $("#password-form").serialize(),
            beforeSend: function () {
                $("#loader").show();
            },
            success: function (response) {
                if (response.errors) {
                    $(".alert-danger").html("");
                    $.each(response.errors, function (key, value) {
                        $(".alert-danger").show();
                        $(".alert-danger").append("<li>" + value + "</li>");
                    });
                     setTimeout(function(){
                          $(".alert-danger").hide();
                    }, 3000);
                } else if(response.status == 403) {
                    $(".alert-danger").hide();
                    $("#password-modal").modal("hide");
                    Swal.fire({
                        icon: 'error',
                        title: 'Password Does mot match',

                    })
                }else{
                    $(".alert-danger").hide();
                    $("#password-modal").modal("hide");
                    Swal.fire({
                        icon: 'success',
                        title: 'Password Changed Successfully',

                    })
                }
            },
            complete: function (response) {
                $("#loader").hide();
            },
            error: function (error) {
                console.log(error);
            },
        });
    });
</script>


@endsection



