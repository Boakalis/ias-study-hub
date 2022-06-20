<?php
    use Carbon\Carbon;
    ?>
    <!-- main header @s -->

    <div class="nk-header nk-header-fixed is-light">
        <div class="container-fluid">
            <div class="nk-header-wrap">
                <div class="nk-menu-trigger d-xl-none ml-n1">
                    <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                </div>
                <div class="nk-header-brand d-xl-none">
                    <a href="{{ route('dashboard') }}" class="logo-link">
                        <img class="logo-light logo-img" src="{{(isset($generalSetting->logo) && !empty($generalSetting->logo)  ? (asset($generalSetting->logo)) : "" )}}" srcset="{{(isset($generalSetting->logo) && !empty($generalSetting->logo)  ? (asset($generalSetting->logo)) : "" )}}" alt="">
                        <img class="logo-dark logo-img" src=" {{(isset($generalSetting->logo) && !empty($generalSetting->logo)  ? (asset($generalSetting->logo)) : "" )}}" srcset="{{(isset($generalSetting->logo) && !empty($generalSetting->logo)  ? (asset($generalSetting->logo)) : "" )}}" alt="">

                    </a>
                </div><!-- .nk-header-brand -->
                <div class="nk-header-news d-none d-xl-block">
                    <div class="nk-news-list">
                        <a class="nk-news-item" href="#">
                            {{-- <div class="nk-news-icon">
                                <em class="icon ni ni-card-view"></em>
                            </div> --}}
                            {{-- <div class="nk-news-text">
                                @php($setting = \App\Models\SettingGeneral::first())
                                {{-- <marquee>{{  @$setting->description }}</marquee>

                            </div> --}}
                        </a>
                    </div>
                </div><!-- .nk-header-news -->
                @guest
                    <div class="nk-header-tools">
                        <ul class="nk-quick-nav">
                            <li class="dropdown user-dropdown show">
                                <a href="javascript:void(0)" onclick="otpModalOpen()" class=" dropdown-toggle">
                                    <div class="user-toggle">
                                        <div class="user-avatar sm">
                                            <em class="icon ni ni-user-alt"></em>
                                        </div>
                                        <div class="user-info d-none d-md-block">
                                            <div class="user-name" id="name">
                                                <span class="data-value"> Login</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li><!-- .dropdown -->
                        </ul><!-- .nk-quick-nav -->
                    </div>
                @endguest
                @auth
                <div class="nk-header-tools">
                    <ul class="nk-quick-nav">
                        <li class="dropdown user-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <div class="user-toggle">
                                    <div class="user-avatar sm">
                                        @if (Auth::user()->image != null)
                                    <img src="{{asset(Auth::user()->image)}}" alt="User">
                                        @else
                                        <img src="{{asset('images/website/user-photos/default-image.png')}}" alt="User">
                                        @endif
                                    </div>
                                    <div class="user-info d-none d-md-block">
                                        <div class="user-name dropdown-indicator" id="name">
                                            @if (Auth::user()->fullname == 1)
                                            <span class="data-value {{(Auth::user()->is_prime == 1 &&  Carbon::parse(Auth::user()->prime_start_date)->diffInDays(Carbon::now()) <= 365)? 'premium-badge' : ''}} "> {{Str::ucfirst(Auth::user()->fname) }}&nbsp;{{Auth::user()->lname}}</span>
                                            @else
                                            <span class="data-value {{(Auth::user()->is_prime == 1 &&  Carbon::parse(Auth::user()->prime_start_date)->diffInDays(Carbon::now()) <= 365)? 'premium-badge' : ''}} "  > {{Str::ucfirst(Auth::user()->fname) }}</span>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                                <div class="dropdown-inner user-card-wrap bg-lighter d-none d-sm-block">
                                    <div class="user-card">
                                        <div class="user-avatar">
                                            @if (Auth::user()->image != null)
                                            <img id="image" src="{{asset(Auth::user()->image)}}"  style="cursor: pointer"  alt="User">
                                                @else
                                                <img id="image" src="{{asset('images/website/user-photos/default-image.png')}}" style="cursor: pointer"  alt="User">
                                                @endif
                                        </div> &nbsp;&nbsp;&nbsp;
                                        <form action="{{route('image-update')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input id='field' type='file' name="image" hidden/>
                                            <button type="submit" id="imageupload" hidden ></button>
                                    </form>

                                        <div class="user-info">
                                            <span class="lead-text shiny font-20 {{(Auth::user()->is_prime == 1 &&  Carbon::parse(Auth::user()->prime_start_date)->diffInDays(Carbon::now()) <= 365)? 'premium-badge' : ''}} ">{{Str::ucfirst(Auth::user()->fname)}}&nbsp;{{Str::ucfirst(Auth::user()->lname)}}</span>
                                            <span class="sub-text">{{Auth::user()->email}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-inner">
                                    <ul class="link-list">
                                        <li><a href="{{route('myprofile')}}"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                        <li><a href="{{route('settings')}}" ><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                        <li><a href="{{route('mytest')}}"><em class="icon ni ni-activity-alt"></em><span>My Tests</span></a></li>
                                        {{-- <li><a class="dark-switch active" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li> --}}
                                    </ul>
                                </div>
                                <div class="dropdown-inner">
                                    <ul class="link-list">
                                        <li><a href="{{route('logout')}}"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li><!-- .dropdown -->
                        {{-- <li class="dropdown notification-dropdown mr-n1">
                            <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                                <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right dropdown-menu-s1">
                                <div class="dropdown-head">
                                    <span class="sub-title nk-dropdown-title">Notifications</span>
                                    <a href="#">Mark All as Read</a>
                                </div>
                                <div class="dropdown-body">
                                    <div class="nk-notification">
                                        <div class="nk-notification-item dropdown-inner">
                                            <div class="nk-notification-icon">
                                                <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                            </div>
                                            <div class="nk-notification-content">
                                                <div class="nk-notification-text">Your <span>test series Order</span> is placed</div>
                                                <div class="nk-notification-time">2 hrs ago</div>
                                            </div>
                                        </div>
                                    </div><!-- .nk-notification -->
                                </div><!-- .nk-dropdown-body -->
                                <div class="dropdown-foot center">
                                    <a href="#">View All</a>
                                </div>
                            </div>
                        </li><!-- .dropdown --> --}}
                    </ul><!-- .nk-quick-nav -->
                </div><!-- .nk-header-tools -->
                @endauth
            </div><!-- .nk-header-wrap -->
            {{-- @include('website.Layout.breadcrumb') --}}
        </div><!-- .container-fliud -->
    </div>





@section('javascript')
<script>
    $(document).ready(function(){
        var name = $('#name').text();
        var intials = $('#name').text().charAt(0);
        var profileImage = $('#profileImage').text(intials);
    });
</script>
@endsection
