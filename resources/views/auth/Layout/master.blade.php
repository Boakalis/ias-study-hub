<html lang="en">
<head>
    <base href="">
    <meta charset="utf-8">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="">
    @yield('meta_title')
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{asset('assets/css/dashlite.css?ver=1.4.0')}}">
    <link id="skin-default" rel="stylesheet" href="{{asset('assets/css/theme.css?ver=1.4.0')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/css/loader.css')}}" />
    <link href="{{asset('fontawesome/css/all.css')}}" rel="stylesheet" />


</head>

<body class="nk-body npc-crypto ui-clean pg-auth">
    <div class="nk-app-root">
        <div class="nk-split nk-split-page nk-split-md">
            <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container">
                <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                    <a href="#" class="toggle btn-white btn btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
                </div>
                <div class="nk-block nk-block-middle nk-auth-body">
                    <div class="brand-logo pb-5">
                        <a href="{{ url('/') }}" class="logo-link">
                            <img class="logo-light logo-img logo-img-lg" src="{{asset('images/logo.png')}}" srcset="{{asset('images/logo2x.png 2x')}}" alt="logo">
                            <img class="logo-dark logo-img logo-img-lg" src="{{asset('images/logo-dark.png')}}" srcset="{{asset('images/logo-dark2x.png 2x')}}" alt="logo-dark">
                        </a>
                    </div>

                    @yield('content')

                </div>
                    <div class="nk-block nk-auth-footer">
                        <div class="nk-block-between">
                            <ul class="nav nav-sm">

                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('getPage','terms-and-conditions')}}">Terms & Condition</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#">Privacy Policy</a>
                                </li>

                            </ul><!-- .nav -->
                        </div>
                        <div class="mt-3">
                            <p>&copy; 2021 IAS STUDYHUB. All Rights Reserved.</p>
                        </div>
                    </div><!-- .nk-block -->
            </div><!-- .nk-split-content -->
                <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right" data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true">
                    <div class="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto">
                        <div class="slider-init" data-slick='{"dots":true, "arrows":false}'>
                            <div class="slider-item">
                                <div class="nk-feature nk-feature-center">

                                    <div class="nk-feature-img">
                                        <img class="round" src="{{asset('images/slides/promo-a.png')}}" alt="">
                                    </div>

                                    <div class="nk-feature-content py-4 p-sm-5">
                                        <h4>IAS STUDYHUB</h4>
                                        <p>You can start to create your tests easily with its one click access the test.</p>
                                    </div>

                                </div>
                            </div><!-- .slider-item -->
                        </div><!-- .slider-init -->
                        <div class="slider-dots"></div>
                        <div class="slider-arrows"></div>
                    </div><!-- .slider-wrap -->
                </div><!-- .nk-split-content -->
        </div><!-- .nk-split -->
    </div><!-- app body @e -->
        <!-- JavaScript -->
        <script src="{{asset('assets/js/bundle.js?ver=1.4.0')}}"></script>
        <script src="{{asset('assets/js/scripts.js?ver=1.4.0')}}"></script>
        <script src="{{ asset('assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
        <script>
            window.addEventListener( "pageshow", function ( event ) {
    var historyTraversal = event.persisted ||
                           ( typeof window.performance != "undefined" &&
                                window.performance.navigation.type === 2 );
    if ( historyTraversal ) {
      // Handle page restore.
      window.location.reload();
    }
  });
        </script>
        @yield('javascript')

</body>
</html>
