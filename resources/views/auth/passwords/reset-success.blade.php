@extends('auth.Layout.master')
@section('meta_title')

@endsection

@section('content')
<div class="nk-block-head">
    <div class="nk-block-head-content">
        <h5 class="nk-block-title">Thank you for submitting form</h5>
        <div class="nk-block-des text-success">
            <p>You can now sign in with your new password</p>
        </div>
    </div>
    <div class="form-note-s2 pt-5">
        <a href="/"><strong>Return to login</strong></a>
    </div>
</div>
@endsection
