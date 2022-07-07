@php($generalSetting = \App\Models\SettingGeneral::first()) @php($question_banks = \App\Models\Admin\QuestionBankSubject::active()->get())
<!-- Header Area -->
<header class="site-header site-header--menu-left dynamic-sticky-bg py-3 menu-block-4 mb-7 mb-lg-0 site-header--absolute site-header--sticky">
    <div class="container">
        <nav class="navbar site-navbar">
            <!-- Brand Logo-->
            <div class="brand-logo">
                <a href="{{ url('/') }}">
                    <img src="{{asset(@$globalSettings->logo)}}" alt="" class="light-version-logo logo-style" />
                    {{--<img style="height: 65px;" src="{{ asset($generalSetting->logo) }}" alt="" class="dark-version-logo" />--}}
                </a>
            </div>
            <div class="menu-block-wrapper ms-lg-7">
                <div class="menu-overlay"></div>
                <nav class="menu-block" id="append-menu-header">
                    <div class="mobile-menu-head">
                        <div class="go-back">
                            <i class="fa fa-angle-left"></i>
                        </div>
                        <div class="current-menu-title"></div>
                        <div class="mobile-menu-close">&times;</div>
                    </div>
                    <ul class="site-menu-main">
                        @guest
                        {{-- <div class="row">
                            <a  href="javascript:void(0)"  onclick="otpModalOpen()"  class="btn btn-readical-red text-white btn-sm col-sm-3 col-lg-3 col-md-3 col-xs-3 mx-1 my-1" id="login-responsive">Login</a>
                            <a  href="javascript:void(0)" onclick="otpModalOpen()" class="btn btn-readical-red text-white btn-xs col-sm-3 col-lg-3 col-md-3 col-xs-3 mx-1 my-1" id="register-responsive">Register</a>
                        </div> --}}
                        @endguest
                        <li class="nav-item nav-item-has-children">
                            <a href="{{ url('/') }}" class="nav-link-item drop-trigger">Home </a>
                        </li>
                        {{-- <li class="nav-item nav-item-has-children">
                            <a href="{{ route('test-series') }}" class="nav-link-item drop-trigger">IAS Test Series </a>
                        </li>
                        <li class="nav-item nav-item-has-children">
                            <a href="{{ route('previousYearIndex') }}" class="nav-link-item drop-trigger">Previous Year Management</a>
                        </li> --}}
                         <li class="nav-item nav-item-has-children">
                            <a href="javascript:;" class="nav-link-item drop-trigger">Question Bank <i class="fas fa-angle-down"></i> </a>
                            <ul class="sub-menu" id="submenu-1">
                                @foreach ($question_banks as $question_bank)
                                <li class="sub-menu--item">
                                    <a href="{{ route('getQuestionBankPages',$question_bank->slug) }}">{{ ucwords($question_bank->subject) }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        {{--<li class="nav-item nav-item-has-children">
                            <a href="{{ route('dailyQuizIndex') }}" class="nav-link-item drop-trigger">Daily Quiz </a>
                        </li>--}}
                    </ul>
                </nav>
            </div>
            <div class="header-btns ms-auto ms-lg-0 d-none d-sm-flex align-items-center">
                @guest {{--
                <a class="btn btn btn-readical-red btn--medium-4 text-white shadow--readical-red-4 ms-auto ms-lg-4 d-none d-sm-flex" href="{{ route('login') }}" style="margin-right:5px;">
                    Login
                </a>
                --}}
                {{-- <a class="btn btn btn-readical-red btn--medium-4 text-white shadow--readical-red-4 ms-auto ms-lg-4 d-none d-sm-flex" href="javascript:void(0)" onclick="otpModalOpen()" style="margin-right:5px;">
                    Register
                </a> --}}
                @endguest @auth {{--
                <a class="btn btn btn-readical-red btn--medium-4 h-45 text-white shadow--readical-red-4 ms-auto ms-lg-4 d-none d-sm-flex" href="{{ route('myprofile') }}">
                    My Profile
                </a>
                --}}
                <div class="user-avatar sm">
                    @if (Auth::user()->image != null)
                    <a href="{{ route('myprofile') }}">
                        <img src="{{asset(Auth::user()->image)}}" alt="My Profile" style="width: 32px;" class="rounded-circle" />
                        <span></span>
                    </a>
                    @else
                    <a href="{{ route('myprofile') }}">
                        <img src="{{asset('images/website/user-photos/default-image.png')}}" style="width: 32px;" alt="My Profile" class="rounded-circle" />
                    </a>
                    @endif
                </div>

                @endauth
            </div>

            <!-- Mobile view Login and My account Button -->
            <div class="header-btns ms-auto ms-lg-0 d-sm-none align-items-center">
                @guest
                <a class="h-45" href="{{ route('login') }}">
                    <img src="{{asset('images/website/user-photos/default-image.png')}}" style="width: 32px;" alt="My Profile" class="rounded-circle" />
                </a>
                @endguest @auth @if (Auth::user()->image != null)
                <a href="{{ route('myprofile') }}">
                    <img src="{{asset(Auth::user()->image)}}" alt="My Profile" style="width: 32px;" class="rounded-circle" />
                </a>
                @else
                <a href="{{ route('myprofile') }}">
                    <img src="{{asset('images/website/user-photos/default-image.png')}}" style="width: 32px;" alt="My Profile" class="rounded-circle" />
                </a>
                @endif @endauth
            </div>
            <!-- Mobile view Login and My account Button -->

            <!-- mobile menu trigger -->
            <div class="mobile-menu-trigger">
                <span></span>
            </div>
            <!--/.Mobile Menu Hamburger Ends-->
        </nav>
    </div>
</header>
<!-- navbar- -->
<!--/ .Header Area -->

<!-- Mobile Bottom Menu -->
<div class="footer-navigation d-block d-md-none w-100">

    <div class="footer-navigation__container ng-scope" ng-if="!tbHeader.stuObj.isLoggedIn">
        <a href="{{ url('/') }}" target="_self" class="footer-navigation__item">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" class="svg-f-green" viewBox="0 0 24 24">
                        <g fill="" fill-rule="evenodd">
                            <defs>
                                <linearGradient id="chleiptmxa" x1="50%" x2="50%" y1="0%" y2="100%">
                                    <stop offset="0%" stop-color="#5AE57B"></stop>
                                    <stop offset="100%" stop-color="#1A806C"></stop>
                                </linearGradient>
                            </defs>
                            <g fill="url(#chleiptmxa)" transform="translate(-26 -20)">
                                <path
                                    d="M11.606 1.663c.266-.223.655-.217.913.014l8.887 7.948c.148.133.232.322.232.52v12.82h-7.66v-7.817c0-1.189-.964-2.153-2.154-2.153-1.189 0-2.153.964-2.153 2.153v7.817H2.5V9.632c0-.206.091-.402.249-.534zm1.152 2.709c-.427-.388-1.084-.372-1.49.038L6.267 8.592c-.353.24-.562.625-.562 1.038v.056c0 .114.097.208.22.208l12.046.056c.121 0 .22-.092.22-.208v-.056c0-.413-.21-.8-.561-1.038L12.8 4.41zM4.411 19.076c-.323 0-.588-.262-.588-.588l-.003-4.055c0-.323.261-.588.588-.588.323 0 .588.262.588.588l.003 4.055c0 .323-.264.588-.588.588zm0 2.303c-.323 0-.588-.262-.588-.588v-.343c0-.324.261-.588.588-.588.324 0 .588.261.588.588v.343c0 .323-.261.588-.588.588z"
                                    transform="translate(24 19)"
                                ></path>
                            </g>
                        </g>
                    </svg>
            Home
        </a>
        {{-- <a href="{{ route('test-series') }}" target="_self" class="footer-navigation__item">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" class="svg-f-green" viewBox="0 0 24 26">
                <g>
                    <path
                        d="M4.817 2.434v.74c0 1.024.83 1.853 1.853 1.853h5.188c1.023 0 1.852-.83 1.852-1.852v-.741h2.965c.973 0 1.773.753 1.847 1.708l.006.144v16.996c0 .973-.754 1.773-1.709 1.847l-.144.006H1.853c-.973 0-1.773-.754-1.847-1.709L0 21.282V4.286c0-.973.754-1.773 1.708-1.847l.145-.005h2.964zm7.279-.488c.17 0 .31.139.31.31v.35c0 .857-.695 1.551-1.551 1.551H7.673c-.857 0-1.551-.694-1.551-1.55v-.35c0-.172.139-.311.31-.311z"
                        transform="translate(-240 -20) translate(0 10) translate(240 10) translate(2.671 .066)"
                    ></path>
                    <path
                        d="M10.485 2.271v-.89c0-.172-.14-.311-.31-.311H8.353c-.171 0-.31.139-.31.31v.891h-.62v-.89c0-.514.417-.932.93-.932h1.822c.513 0 .93.418.93.931v.891h-.62z"
                        transform="translate(-240 -20) translate(0 10) translate(240 10) translate(2.671 .066)"
                    ></path>
                </g>
            </svg>
            IAS Test
        </a>
        <a href="{{route('previousYearIndex')}}" target="_self" class="footer-navigation__item">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" class="svg-f-green" viewBox="0 0 24 24">
                <g fill="">
                    <path
                        d="M21.642 5.87c.424 0 .769.344.769.768v12.22c0 .236-.105.455-.289.601-.184.147-.422.201-.652.15-1.842-.42-5.075-.909-8.14-.158 1.772-1.678 4.275-1.975 5.794-1.978 1.081-.003 1.96-.884 1.96-1.963V5.87zm-19.394 0v9.64c0 1.08.88 1.96 1.96 1.962 1.52.004 4.022.3 5.795 1.979-3.066-.751-6.298-.263-8.14.157-.23.052-.468-.002-.653-.149-.183-.146-.288-.365-.288-.6V6.638c0-.424.345-.769.768-.769h.558zm1.96-2.66c1.795.004 5.058.42 6.756 3.154.069.111.105.246.105.39V18.82c-2.068-2.165-5.067-2.538-6.857-2.542-.425-.001-.77-.346-.77-.77V3.98c0-.206.08-.4.226-.546.145-.144.336-.223.539-.223zm14.918 0c.203 0 .394.08.538.223.146.146.227.34.227.546v11.53c0 .424-.346.768-.77.77-1.79.004-4.789.377-6.858 2.542V6.753c0-.143.037-.278.106-.389 1.698-2.734 4.96-3.15 6.755-3.154z"
                        transform="translate(-312 -20) translate(0 10) translate(312 10)"
                    ></path>
                </g>
            </svg>
            PY Question
        </a> --}}
        <a href="{{route('getQuestionBankPages')}}" target="_self" class="footer-navigation__item">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" class="svg-f-green" viewBox="0 0 24 26">
                <g>
                    <path
                        d="M4.817 2.434v.74c0 1.024.83 1.853 1.853 1.853h5.188c1.023 0 1.852-.83 1.852-1.852v-.741h2.965c.973 0 1.773.753 1.847 1.708l.006.144v16.996c0 .973-.754 1.773-1.709 1.847l-.144.006H1.853c-.973 0-1.773-.754-1.847-1.709L0 21.282V4.286c0-.973.754-1.773 1.708-1.847l.145-.005h2.964zm7.279-.488c.17 0 .31.139.31.31v.35c0 .857-.695 1.551-1.551 1.551H7.673c-.857 0-1.551-.694-1.551-1.55v-.35c0-.172.139-.311.31-.311z"
                        transform="translate(-240 -20) translate(0 10) translate(240 10) translate(2.671 .066)"
                    ></path>
                    <path
                        d="M10.485 2.271v-.89c0-.172-.14-.311-.31-.311H8.353c-.171 0-.31.139-.31.31v.891h-.62v-.89c0-.514.417-.932.93-.932h1.822c.513 0 .93.418.93.931v.891h-.62z"
                        transform="translate(-240 -20) translate(0 10) translate(240 10) translate(2.671 .066)"
                    ></path>
                </g>
            </svg>
            Question Bank
        </a>

    </div>
</div>
<!-- Mobile Bottom Menu -->
