<!DOCTYPE html>
<html lang="en">
    @php($setting = \App\Models\SettingGeneral::first())
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <meta name="msapplication-TileColor" content="#2aa87e" />
        <meta name="theme-color" content="#2aa87e" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="mobile-web-app-capable" content="yes" />
        <meta name="HandheldFriendly" content="True" />
        <meta name="Duplex VehiclesOptimized" content="320" />

        <title>Ultimate Mock Exam Platform For IAS Aspirants</title>
        <link rel="shortcut icon" href="{{asset(@$globalSettings->favicon)}}" type="image/x-icon" />
        <!-- Bootstrap , fonts & icons  -->
        <link rel="stylesheet" href="{{ asset('website/css/bootstrap.css') }}" />
        <link rel="stylesheet" href="{{asset('assets/css/developer.css?v=1.0')}}" />
        <link rel="stylesheet" href="{{ asset('website/fonts/icon-font/css/style.css') }}" />
        <link rel="stylesheet" href="{{ asset('website/fonts/typography-font/typo.css') }}" />
        <link rel="stylesheet" href="{{ asset('website/fonts/fontawesome-5/css/all.css') }}" />
        <!-- Plugin'stylesheets  -->
        <link rel="stylesheet" href="{{ asset('website/plugins/aos/aos.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('website/plugins/fancybox/jquery.fancybox.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('website/plugins/nice-select/nice-select.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('website/plugins/slick/slick.min.css') }}" />
        <!-- Vendor stylesheets  -->
        <link rel="stylesheet" href="{{ asset('website/css/main.css') }}" />
        <link href="{{asset('assets/css/admin.css?v=1.0')}}" rel="stylesheet" />

        <!-- Custom stylesheet -->
        @yield('css')

        <!--zoho pagesense-->
        <script type="text/javascript">
            (function (w, s) {
                var e = document.createElement("script");
                e.type = "text/javascript";
                e.async = true;
                e.src = "https://cdn-in.pagesense.io/js/uujcylxv/e8e63fc897134f9fab80520b1d743e8a.js";
                var x = document.getElementsByTagName("script")[0];
                x.parentNode.insertBefore(e, x);
            })(window, "script");
        </script>
    </head>

    <body data-theme-mode-panel-active="" data-theme="light">
        @include('website.include.web-preloader')

        <div class="site-wrapper overflow-hidden">
            @include('website.website-layout.header') @yield('content') {{-- Cookie Conesent --}}
            <div class="cookie-message" id="cookie-close" style="display: none;">
                <img src="https://img.icons8.com/plasticine/100/000000/cookie.png" />
                <span>
                    We use cookies to provide you the best possible experience. But don't panic - we won't share any of your data. You can find more informations about our cookies <a href="{{route('getPage','privacy-policy')}}">here</a>.
                </span>
                <a class="close" href="javascript:void(0)" onclick="closeAlert()"><i class="fa fa-times"></i></a>
            </div>
            @include('website.website-layout.footer')
            <!--/ .Footer Area -->
            <script src="{{ asset('website/plugins/type-js/typed.min.js') }}"></script>
            <script>
                var typed = new Typed(".highlight-text", {
                    strings: ["Test Series.", "Question Bank.", "Previous Year Question.", "Daily Quiz.", "Discussion Forum."],
                    typeSpeed: 80,
                    backSpeed: 80,
                    cursorChar: "",
                    shuffle: true,
                    smartBackspace: false,
                    loop: true,
                });
            </script>
        </div>
        <!-- Plugin's Scripts -->
        <script src="{{ asset('website/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('website/plugins/jquery/jquery-migrate.min.js') }}"></script>
        <script src="{{ asset('website/js/bootstrap.bundle.js') }}"></script>
        <script src="{{ asset('website/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
        <script src="{{ asset('website/plugins/nice-select/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('website/plugins/aos/aos.min.js') }}"></script>
        <script src="{{ asset('website/plugins/counter-up/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('website/plugins/counter-up/waypoints.min.js') }}"></script>
        <script src="{{ asset('website/plugins/slick/slick.min.js') }}"></script>
        <script src="{{ asset('website/plugins/skill-bar/skill.bars.jquery.js') }}"></script>
        <script src="{{ asset('website/plugins/isotope/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('website/js/menu.js') }}"></script>
        <script src="{{ asset('website/js/custom.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
        @yield('javascript')
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API = Tawk_API || {},
                Tawk_LoadStart = new Date();
            (function () {
                var s1 = document.createElement("script"),
                    s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = "https://embed.tawk.to/6104f88e649e0a0a5ccecb05/1fbtmlrqc";
                s1.charset = "UTF-8";
                s1.setAttribute("crossorigin", "*");
                s0.parentNode.insertBefore(s1, s0);
            })();
        </script>
        <!--End of Tawk.to Script-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        <script>
            function closeAlert() {
                $("#cookie-close").css("display", "none");
            }

            setTimeout(function () {
                $("#cookie-close").fadeOut(3000);
            }, 5000);
        </script>

        <script type="text/javascript">
            var alerted = localStorage.getItem("alerted") || "";
            if (alerted != "yes") {
                $("#cookie-close").show();
                localStorage.setItem("alerted", "yes");
            }
        </script>

        <script>
            $(window).on("load", function () {
                $(".preloader").hide();
                $("body").css("overflow", "scroll");
            });
        </script>
    </body>
</html>