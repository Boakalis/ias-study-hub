<!-- sidebar @s -->
<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head bg-white">
        <div class="nk-sidebar-brand">
            <a href="{{ url('/') }}" class="logo-link nk-sidebar-logo">

                <img class="logo-light logo-img" src="{{(isset($globalSettings->logo) && !empty($globalSettings->logo)  ? (asset($globalSettings->logo)) : "" )}}" srcset="{{(isset($globalSettings->logo) && !empty($globalSettings->logo)  ? (asset($globalSettings->logo)) : "" )}}" alt="logo">
                <img class="logo-dark logo-img" src="{{(isset($globalSettings->logo) && !empty($globalSettings->logo)  ? (asset($globalSettings->logo)) : "" )}}" srcset="{{(isset($globalSettings->logo) && !empty($globalSettings->logo)  ? (asset($globalSettings->logo)) : "" )}}" alt="logo-dark">
                <span class="nio-version"></span>
            </a>
        </div>
        <div class="nk-menu-trigger mr-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    @auth
                    <li class="nk-menu-item">
                        <a href="{{route('dashboard')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
                            <span class="nk-menu-text text-uppercase">Dashboard</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    @endauth
                    <li class="nk-menu-item">
                        <a href="{{route('test-series')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                            <span class="nk-menu-text text-uppercase">IAS Test Series</span>
                        </a>
                    </li><!-- .nk-menu-item -->

                     <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-calendar-booking"></em></span>
                            <span class="nk-menu-text text-uppercase">Question Banks</span>
                        </a>
                        <ul class="nk-menu-sub">
                                @if ($categories != null)
                                @foreach ($categories as $category)
                                <li class="nk-menu-item">
                                    <a href="{{route('getQuestionBankPages',$category->slug)}}" class="nk-menu-link text-white text-uppercase"><span class="nk-menu-text">{{$category->subject}}</span></a>
                                </li>
                                @endforeach
                                @endif
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item --> 

                    {{-- <li class="nk-menu-item">
                        <a href="{{route('getQuestionBankPages')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                            <span class="nk-menu-text text-uppercase">Question Banks</span>
                        </a>
                    </li><!-- .nk-menu-item --> --}}


                    <li class="nk-menu-item">
                        <a href="{{route('previousYearIndex')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                            <span class="nk-menu-text text-uppercase">Previous Year Questions</span>
                        </a>
                    </li><!-- .nk-menu-item -->

                    {{--<li class="nk-menu-item">
                        <a href="{{route('dailyQuizIndex')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-layers"></em></span>
                            <span class="nk-menu-text text-uppercase">Daily Quiz</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="#" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-question"></em></span>
                            <span class="nk-menu-text text-uppercase">Ask Your Doubts</span>
                        </a>
                    </li><!-- .nk-menu-item --> --}}
                    @auth
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">User Account</h6>
                    </li><!-- .nk-menu-item -->
                    {{-- <li class="nk-menu-item">
                        <a href="{{route('mytest')}}" class="nk-menu-link" >
                            <span class="nk-menu-icon"><em class="icon ni ni-calendar-booking"></em></span>
                            <span class="nk-menu-text text-uppercase">My Tests</span>
                        </a>
                    </li><!-- .nk-menu-item --> --}}
                 {{--    <li class="nk-menu-item">
                        <a href="#" class="nk-menu-link" >
                            <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
                            <span class="nk-menu-text text-uppercase">My Quiz</span>
                        </a>
                    </li><!-- .nk-menu-item -->--}}
                    <li class="nk-menu-item">
                        <a href="{{route('myorder')}}" class="nk-menu-link" >
                            <span class="nk-menu-icon"><em class="icon ni ni-growth"></em></span>
                            <span class="nk-menu-text text-uppercase">My Courses</span>
                        </a>
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-calendar-booking"></em></span>
                            <span class="nk-menu-text text-uppercase">My Reports</span>
                        </a>
                        <ul class="nk-menu-sub">
                                <li class="nk-menu-item">
                                    <a href="{{route('mytest')}}" class="nk-menu-link text-white"><span class="nk-menu-text">IAS Test Series</span></a>
                                     <a href="{{route('qbreport')}}" class="nk-menu-link text-white"><span class="nk-menu-text">Question Banks</span></a> 
                                    <a href="{{route('pyqreport')}}" class="nk-menu-link text-white"><span class="nk-menu-text">Previous Year Questions</span></a>

                                </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item">
                        <a href="{{route('myprofile')}}" class="nk-menu-link" >
                            <span class="nk-menu-icon"><em class="icon ni ni-user"></em></span>
                            <span class="nk-menu-text text-uppercase">My Profile</span>
                        </a>
                    </li><!-- .nk-menu-item -->


                    <li class="nk-menu-item">
                        <a href="{{route('logout')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-signout"></em></span>
                            <span class="nk-menu-text text-uppercase">Sign Out</span>
                        </a>
                    </li>
                    @endauth
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div><!-- sidebar @e -->
