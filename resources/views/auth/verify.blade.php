@extends('auth.Layout.master')
@section('meta_title')
 <!-- Fav Icon  -->
 <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">
 <!-- Page Title  -->
 <title>Verify | IAS STUDYHUB</title>
@endsection

@section('content')
<div class="nk-body npc-crypto ui-clean pg-auth">
    <div class="container">
        <div class="row justify-content-center">
            <div class="alert alert-success alert-dismissible  " role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
            <div class="col-md-8">
                <div class="card">
                    <form method="POST" action="{{ route('verification.send') }}" class="d-inline">
                        {{ csrf_field() }}

                    </form>
                    @if (session('resent'))

                @endif
                    <div class="card-body">


                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
