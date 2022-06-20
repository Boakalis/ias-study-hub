@extends('auth.Layout.master')
@section('meta_title')
 <!-- Fav Icon  -->
 <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">
 <!-- Page Title  -->
 <title>Registration | IAS STUDYHUB</title>
@endsection

@section('content')

    <div class="container">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h5 class="nk-block-title">Register</h5>
                <div class="nk-block-des">
                    <p>Create New IAS STUDYHUB Account</p>
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('register') }}" id="registerform">
         @csrf

        <div class="form-group">
            <label for="name" class="form-label">First Name<span  class="required text-danger">*</span></label>
            <input  type="text" class="form-control form-control-lg @error('fname') is-invalid @enderror" name="fname" id="fname" placeholder="Enter your First name" value="{{ old('fname') }}">
                @error('fname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
            <label for="name" class="form-label">Last Name<span  class="required text-danger">*</span></label>
            <input  type="text" class="form-control form-control-lg @error('lname') is-invalid @enderror"  placeholder="Enter your name" name="lname" id="lname" value="{{ old('lname') }}">
                @error('lname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="email">Email Address<span  class="required text-danger">*</span></label>
                <input id="email" type="email" class="form-control form-control-lg{{ $errors->has('email') ? ' is-invalid' : '' }}"  placeholder="Enter your email address" name="email" value="{{ old('email') }}">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="phone">Mobile Number<span  class="required text-danger">*</span></label>
            <input type="text"class="form-control form-control-lg @error('phone') is-invalid @enderror"  name="phone" id="phone" placeholder="Enter your mobile number" value="{{ old('phone') }}">
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
             @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="password">Password<span  class="required text-danger">*</span></label>
            <div class="form-control-wrap">
                    <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                    </a>
                    <input id="password" type="password" class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" name="password" placeholder="Enter your password" value="{{ old('password') }}">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="password_confirmation">Confirmation Password<span  class="required text-danger">*</span></label>
            <div class="form-control-wrap">
                <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password_confirmation">
                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                </a>
                <input id="password_confirmation" type="password" class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Enter your confirmation password" value="{{ old('password_confirmation') }}">
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
        </div>

        <div class="form-group">
            <div class="custom-control custom-control-xs custom-checkbox">
                <input type="checkbox" name="agree" class="custom-control-input" id="agree" >
                <label class="custom-control-label" for="agree">I agree to IAS STUDYHUB <a tabindex="-1" href="#">Privacy Policy</a> &amp; <a tabindex="-1" href="#"> Terms.</a></label>
            </div>
        </div>

        <div class="form-group">
            <button class="btn btn-lg btn-primary btn-block">Register</button>
        </div>
    </form>

    <div class="form-note-s2 pt-4"> Already have an account ? <a href="{{route('login')}}"><strong>Sign in instead</strong></a>
    </div>

    <div class="text-center pt-4 pb-3">
        <h6 class="overline-title overline-title-sap"><span>OR</span></h6>
    </div>

    <ul class="nav justify-center gx-4">
        <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Google</a></li>
    </ul>

</div>
@endsection

@section('javascript')
<script>
$(document).ready(function() {

    $('#registerform').validate({ // initialize the plugin
        rules: {
            email: {
                required: true,
                email: true

            },
            fname:{
                required:true
            },
            lname:{
                required:true
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 255
            },
            password_confirmation:{
                required:true,
                minlength:8,
                maxlength:255,
                equalTo : "#password"
            },
            phone:{
                required:true,
                number:true,
                minlength:10,
                maxlength:13
            }
        }
    });
});
</script>
@endsection
