@extends('auth.Layout.master') @section('meta_title')
<!-- Fav Icon  -->
<link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon" />
<!-- Page Title  -->
<title>Login | IAS STUDYHUB</title>

@endsection @section('content')
<div class="nk-block-head">
    <div class="nk-block-head-content">
        @include('admin.layouts.error')

        {{-- <div
            id="g_id_onload"
            data-client_id="455299481833-ie9gcgmnqqp3lj7v3p70d0s1p579nc2m.apps.googleusercontent.com"
            data-context="signin"
            data-ux_mode="popup"
            data-text = "continue_with"
            data-prompt_parent_id="contain"
            data-callback="handleCredentialResponse"
            data-auto_select="true"
        ></div> --}}

        <h5 class="nk-block-title">Sign-In</h5>
        <div class="nk-block-des">
            <p>Access the IAS Study Hub using your email and password.</p>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('login') }}" id="loginform">
    @csrf
    <div class="form-group">
        <div class="form-label-group">
            <label for="email" class="form-label">Email</label>
        </div>
        <div class="form-control-wrap">
            <input
                id="email"
                name="email"
                type="email"
                class="form-control form-control-lg {{ $errors->has('email') ? ' is-invalid' : '' }}"
                required
                placeholder="Enter your email address "
                oninvalid="this.setCustomValidity('Please Enter email-address')"
                oninput="setCustomValidity('')"
            />
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <div class="form-label-group">
            <label for="password" class="form-label">Password</label>
            @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
            @endif
        </div>

        <div class="form-control-wrap">
            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
            </a>
            <input
                id="password"
                type="password"
                name="password"
                required
                class="form-control form-control-lg {{ $errors->has('password') ? ' is-invalid' : '' }}"
                oninvalid="this.setCustomValidity('Please Enter Password')"
                oninput="setCustomValidity('')"
                placeholder="Enter your passcode"
            />
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-lg btn-primary btn-block">Sign in</button>
    </div>
</form>
<div class="form-note-s2 pt-4">New on our platform? <a href="{{route('register')}}">Create an account</a></div>
<div class="container" id="contain" >
    <div class="g_id_signin"  data-type="standard" data-size="large" data-theme="outline" data-shape="rectangular" data-logo_alignment="left" data-text="continue_with"></div>

</div>

<div class="text-center pt-4 pb-3">
    <h6 class="overline-title overline-title-sap"><span>OR</span></h6>
</div>
{{--
<div class="justify-center gx-4">
    <a class="btn btn-lg btn-danger btn-block" href="{{route('googlelogin')}}"> <em class="icon ni ni-google"></em> Login via Google </a>
</div>
--}} @endsection @section('javascript')
<script src="https://accounts.google.com/gsi/client"></script>

<script>
    function parseJwt(token) {
        var base64Url = token.split(".")[1];
        var base64 = base64Url.replace(/-/g, "+").replace(/_/g, "/");
        var jsonPayload = decodeURIComponent(
            atob(base64)
                .split("")
                .map(function (c) {
                    return "%" + ("00" + c.charCodeAt(0).toString(16)).slice(-2);
                })
                .join("")
        );

        return JSON.parse(jsonPayload);
    }
</script>

<script>
    function handleCredentialResponse(response) {
        var decoded = JSON.stringify(parseJwt(response.credential));
        $.ajax({
            url: "{{ route('handlecallback') }}",
            type: "get",
            data: {
                _token: "{{csrf_token()}}",
                decoded: decoded,
                onetaplogin: 1,
            },
            beforeSend: function () {
                // Show image container
                $("#loader").show();
            },

            success: function (response) {
                if (response.errors) {
                    $(".alert-danger").html("");

                    $.each(response.errors, function (key, value) {
                        $(".alert-danger").show();
                        $(".alert-danger").append("<li>" + value + "</li>");
                    });
                    setTimeout(function () {
                        $(".alert-danger").hide();
                    }, 3000);
                } else {
                    location.reload(true);
                }
            },
            complete: function (response) {
                $("#loader").hide();
            },
            error: function (error) {
                console.log(error);
            },
        });
    }
</script>

<script>
    $(document).ready(function () {
        $("#loginform").validate({
            // initialize the plugin
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 255,
                },
            },
        });
    });
</script>

<script>
    window.onload = function () {

        google.accounts.id.initialize({
      client_id: '455299481833-ie9gcgmnqqp3lj7v3p70d0s1p579nc2m.apps.googleusercontent.com',
      callback: handleCredentialResponse
    });
    google.accounts.id.prompt((notification) => {
      if (notification.isNotDisplayed() || notification.isSkippedMoment()) {
alert('hi')
      }
    });

    }
  </script>

@endsection
