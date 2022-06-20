@extends('auth.Layout.master')
@section('meta_title')
 <!-- Fav Icon  -->
 <link rel="shortcut icon" href="{{asset(@$globalSettings->favicon)}}">
 <!-- Page Title  -->
 <title>Reset-Passcode | IAS STUDYHUB</title>
@endsection

@section('content')
<div class="container">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h5 class="nk-block-title">Change Password</h5>
            <div class="nk-block-des">
                <p>Create New IAS STUDYHUB Account</p>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label" for="default-01">Email</label>
                </div>

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-group">
                <div class="form-label-group">
                    <label for="password" class="form-label">Password</label>
                </div>
                <input id="password" type="password" class="form-control   @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-group">
                <div class="form-label-group">
                    <label for="password-confirm" class="form-label">Confirm Password</label>
                </div>
                    <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror"" name="password_confirmation" required autocomplete="new-password">

                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-primary btn-block"> Reset Password</button>
            </div>
        </form>
    </div>
</div>
@endsection
