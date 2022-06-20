@extends('website.Layout.master')
@section('meta_title')
 <!-- Fav Icon  -->
 <!-- Page Title  -->
 <title>Change-Password | IAS STUDYHUB</title>
@endsection
@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-aside-wrap">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head nk-block-head-lg">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h4 class="nk-block-title">Password Update</h4>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                @include('admin.layouts.error')
                                <div class="nk-block">
                                    <form action="{{route('password-update')}}" method="POST" name="updatePasswordForm" id="updatePasswordForm">
                                        {{csrf_field()}}


                                        <label for="current_pwd">Current Password</label>
                                        <div class=" input-group">
                                            <input class="form-control" id="current_pwd" name="current_pwd" type="password" required=""  placeholder="Enter Old Password" >
                                            <div class="input-group-append">
                                                <span class="input-group-text"> <i class="fa fa-eye-slash" aria-hidden="true" onclick="myFunction()" ></i></span>
                                            </div>
                                        </div> <span id="chkCurrentPwd"></span><br>


                                        {{-- <div class="form-group">
                                                <label for="current_pwd">Current Password</label>
                                                <input type="password" id="current_pwd" name="current_pwd" class="form-control" required="" ajaxcall="7"  placeholder="Enter Old Password">

                                                <input type="checkbox" class="mt-2" onclick="myFunction()">Show Password
                                                <br><span id="chkCurrentPwd"></span>
                                            </div> --}}

                                        <div class="form-group">
                                            <label for="new_pwd">New Password</label>
                                            <input type="password" id="new_pwd" name="new_pwd" class="form-control" required=""  placeholder="Enter New Password">
                                        </div>

                                        <div class="form-group">
                                          <label for="confirm_pwd">Confirm New Password</label>
                                          <input type="password" class="form-control" id="confirm_pwd" name="confirm_pwd" required=""  placeholder="Confirm New Password">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')

<script>

function myFunction() {
  var x = document.getElementById("current_pwd");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

</script>

<script type="text/javascript">
    $("#current_pwd").keyup(function(){

        var current_pwd = $("#current_pwd").val();
        if(this.value.length > this.getAttribute('ajaxcall')) {
        $.ajax({
            type: 'POST' ,
            url : '{{route("user-check-pwd")}}',
            data : {'current_pwd':current_pwd},
            success:function(resp){
                if(resp=="false"){
                    $("#chkCurrentPwd").html("<font color=red>Current Password is Incorrect</font>");
                }else if(resp=="true"){
                    $("#chkCurrentPwd").html("<font color=green>Current Password is Correct</font>")
                }
            },error:function(){
                alert("Error");
            }
        });}
    });
</script>

<script>
    $(document).ready(function() {

        $('#updatePasswordForm').validate({ // initialize the plugin
            rules: {


                new_pwd:{
                    required:true,
                    minlength:8,
                    maxlength:255,
                },
                confirm_pwd:{
                    required:true,
                    minlength:8,
                    maxlength:255,
                    equalTo : "#new_pwd"
                },

            }
        });
    });
</script>



@endsection


