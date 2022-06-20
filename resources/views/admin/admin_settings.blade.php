@extends('admin.layouts.master')
@section('content')
<div class="nk-block-head-content">
    <h3 class="nk-block-title page-title">Settings</h3>
</div>
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
                                                <p>These settings are helps you keep your account secure.</p>
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
                                                <div class="between-center flex-wrap flex-md-nowrap g-3">

                                                    <div class="nk-block-text">
                                                        <h6>Change Password</h6>
                                                        <p>Set a unique password to protect your account.</p>
                                                    </div>
                                                    <div class="nk-block-actions flex-shrink-sm-0">
                                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                                            <li class="order-md-last">
                                                                <a href="{{url('/admin/change_password')}}" class="btn btn-primary">Change Password</a>
                                                            </li>

                                                        </ul>
                                                    </div></div></div>
                                                      <!-- .card-inner -->
                                           <!-- .card-inner -->
                                           <!-- .card-inner -->
                                        </div><!-- .card-inner-group -->
                                    </div><!-- .card -->
                                </div><!-- .nk-block -->
                            </div><!-- .card-inner -->
                            <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                                <div class="card-inner-group">
                                    <div class="card-inner">
                                        <div class="user-card">
                                            <div class="user-avatar bg-primary">
                                                @if (Auth::guard('admin')->user()->image != null)
                                                <span><img src="{{asset(Auth::guard('admin')->user()->image)}}" alt="User"></span>
                                                     @else
                                                 <span><img src="{{asset('images/admin_images/admin_photos/admin.png')}}" alt="User"></span>
                                                     @endif
                                            </div>
                                            <div class="user-info">
                                                <span class="lead-text">{{Str::ucfirst(Auth::guard('admin')->user()->name)}}</span>
                                                <span class="sub-text">{{Auth::guard('admin')->user()->email}}</span>
                                            </div>
                                           
                                        </div>
                                    </div><!-- .card-inner -->

                                    <div class="card-inner p-0">
                                        <ul class="link-list-menu">
                                            <li><a href="{{url('/admin/profile')}}"><em class="icon ni ni-user-fill-c"></em><span>Personal Infomation</span></a></li>
                                            <li><a class="active" href="{{url('/admin/settings')}}"><em class="icon ni ni-lock-alt-fill"></em><span>Security Settings</span></a></li>
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
@endsection
