<!DOCTYPE html>
<html lang="zxx" class="js">
    <head>
        <meta charset="utf-8" />
        <meta name="author" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <meta name="msapplication-TileColor" content="#2aa87e" />
        <meta name="theme-color" content="#2aa87e" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="mobile-web-app-capable" content="yes" />
        <meta name="HandheldFriendly" content="True" />
        <meta name="Duplex VehiclesOptimized" content="320" />

        <meta name="description" content="" />
        @yield('meta_title')
        <link rel="shortcut icon" href="{{asset(@$globalSettings->favicon)}}" type="image/x-icon" />
        <title class="text-center">@yield('title') | IAS StudyHub</title>
        <link rel="stylesheet" href="{{asset('assets/css/dashlite.css?ver=1.4.0')}}" />
        <link id="skin-default" rel="stylesheet" href="{{asset('assets/css/theme.css?ver=1.4.0')}}" />
        <link id="skin-default" rel="stylesheet" href="{{asset('assets/css/theme.css')}}" />
        <link href="{{asset('fontawesome/css/all.css')}}" rel="stylesheet" />
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZRH3CWHRNJ"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag("js", new Date());

            gtag("config", "G-ZRH3CWHRNJ");
        </script>
    </head>

    <body class="nk-body bg-lighter npc-general has-sidebar">
        @include('website.include.test-preloader')
        <div class="nk-app-root">
            <!-- main @s -->
            <div class="nk-main">
                <!-- wrap @s -->
                <div class="nk-wrap">
                    @yield('content')
                </div>
                <!-- wrap @e -->
            </div>
            <!-- main @e -->
        </div>
        <!-- app-root @e -->

        <!-- JavaScript -->
        <script src="{{asset('assets/js/bundle.js?ver=1.4.0')}}"></script>
        <script src="{{asset('assets/js/scripts.js?ver=1.4.0')}}"></script>
        @yield('javascript')
        <script>
            $(window).on("load", function () {
                $(".preloader").hide();
                $("body").css("overflow", "scroll");
            });
        </script>
    </body>
</html>