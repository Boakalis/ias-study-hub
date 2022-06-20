@extends('admin.layouts.master')
@section('content')
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
<div class="nk-block-head-content">
    <h3 class="nk-block-title page-title">Profile Information</h3>
</div>
    </div></div>
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
                                            <h4 class="nk-block-title">Personal Information</h4>
                                        </div>
                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="nk-data data-list">
                                        <div class="data-head">
                                            <h6 class="overline-title">Basics</h6>
                                        </div>
                                        <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                            <div class="data-col">
                                                <span class="data-label">Full Name</span>
                                                <span class="data-value">{{Auth::guard('admin')->user()->name}}</span>
                                            </div>
                                            <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                        </div><!-- data-item -->
                                        <!-- data-item -->
                                        <div class="data-item">
                                            <div class="data-col">
                                                <span class="data-label">Email</span>
                                                <span class="data-value">{{Auth::guard('admin')->user()->email}}</span>
                                            </div>
                                            <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
                                        </div><!-- data-item -->
                                        <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                            <div class="data-col">
                                                <span class="data-label">Phone Number</span>
                                                <span class="data-value text-soft">{{Auth::guard('admin')->user()->mobile}}</span>
                                            </div>
                                            <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                        </div><!-- data-item -->

                                        <!-- data-item -->
                                        <div class="data-item" data-toggle="modal" data-target="#profile-edit" data-tab-target="#profile-edit">
                                            <div class="data-col">
                                                <span class="data-label">Image</span>
                                                @if (!empty(Auth::guard('admin')->user()->image))
                                                    <a target="_blank" href="{{ asset(Auth::guard('admin')->user()->image)}}">View Image</a>
                                                @endif

                                            </div>
                                            <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                        </div><!-- data-item -->

                                    </div><!-- data-list -->
                                    <div class="nk-data data-list">


                                    </div><!-- data-list -->
                                </div><!-- .nk-block -->
                            </div>
                            <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                                <div class="card-inner-group" data-simplebar>
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
                                        </div><!-- .user-card -->
                                    </div><!-- .card-inner -->
                                  <!-- .card-inner -->
                                    <div class="card-inner p-0">
                                        <ul class="link-list-menu">
                                            <li><a class="active" href="{{route('profile')}}"><em class="icon ni ni-user-fill-c"></em><span>Personal Infomation</span></a></li>
                                            <li><a href="{{route('admin_settings')}}"><em class="icon ni ni-lock-alt-fill"></em><span>Security Settings</span></a></li>
                                        </ul>
                                    </div><!-- .card-inner -->
                                </div><!-- .card-inner-group -->
                            </div><!-- card-aside -->
                        </div><!-- .card-aside-wrap -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
 <!-- @@ Profile Edit Modal @e -->
 <div class="modal fade zoom" tabindex="-1" role="dialog" id="profile-edit">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <h5 class="title">Update Profile</h5>
                <ul class="nk-nav nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#personal">Personal</a>
                    </li>
                </ul><!-- .nav-tabs -->
                <div class="tab-content">
                    <div class="tab-pane active" id="personal">
                        <div class="row gy-4">
                            <div class="col-md-6">

                                <form action="{{route('update_profile')}}" method="post" name="updateProfileForm" id="updateProfileForm" enctype="multipart/form-data">@csrf
                                <div class="form-group">
                                    <label class="form-label" for="full-name">Full Name</label>
                                    <input type="text" class="form-control form-control-lg" name="name" id="full-name" value="{{Auth::guard('admin')->user()->name}}" required placeholder="Enter Full name">
                                </div>
                            </div>
                           <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="phone-no">Phone Number</label>
                                    <input type="text" class="form-control form-control-lg" name="mobile" id="phone-no" value="{{Auth::guard('admin')->user()->mobile}}" required placeholder="Phone Number">
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="birth-day">Date of Birth</label>
                                    <input type="text" value="{{Auth::guard('admin')->user()->dob}}" class="form-control form-control-lg date-picker" required name="dob" id="birth-day" placeholder="Enter your name">
                                </div>
                            </div> --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label " for="image">Images</label>
                                    <input type="file" class="form-control" name="image" accept="image/*" >
                                </div>
                            </div>
                            <div class="col-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                    <li>
                                        <button type="submit" class="btn btn-lg btn-primary">Update Personal Information</button>
                                    </li>
                                    <li>
                                        <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- .tab-pane -->
                  <!-- .tab-pane -->
                </div><!-- .tab-content -->
            </div><!-- .modal-body -->
        </div><!-- .modal-content -->
    </form>
    </div><!-- .modal-dialog -->
</div><!-- .modal -->
@endsection
