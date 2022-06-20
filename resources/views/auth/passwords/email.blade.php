@extends('auth.Layout.master')
@section('meta_title')
 <!-- Fav Icon  -->
 <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">
 <!-- Page Title  -->
 <title>Reset Passcode | IAS STUDYHUB</title>
@endsection

@section('content')
<div class="container">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h5 class="nk-block-title">Reset password</h5>
                <div class="nk-block-des">
                    <p>If you forgot your password, well, then we’ll email you instructions to reset your password.</p>
                </div>
            </div>
        </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="default-01">Email</label>
                                <a class="link link-primary link-sm" href="#">Need Help?</a>
                            </div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="form-group">
                                <button type="submit" class="tn btn-lg btn-primary btn-block">
                                    Send Reset Link
                                </button>
                        </div>
                        <div class="form-note-s2 pt-5">
                            <a href="/"><strong>Return to login</strong></a>
                        </div>
                    </form>
                </div>
</div>
@endsection
