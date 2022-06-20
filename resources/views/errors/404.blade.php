
<!DOCTYPE html>
<html lang="zxx" class="js">

<head>

    <meta charset="utf-8">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{asset('./images/favicon.png')}}">
    <!-- Page Title  -->
    <title>Page Not Found |IAS StudyHub</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{asset('/assets/css/dashlite.css?ver=2.3.0')}}">
    <link id="skin-default" rel="stylesheet" href="{{asset('/assets/css/theme.css?ver=2.3.0')}}">
</head>

<body class="bg-white nk-body npc-default pg-error">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="mx-auto nk-block nk-block-middle wide-md">
                        <div class="text-center nk-block-content nk-error-ld">
                            <img class="nk-error-gfx" src="{{asset('./images/gfx/error-404.svg')}}" alt="">
                            <div class="mx-auto wide-xs">
                                <h3 class="nk-error-title">Oops! Why you’re here?</h3>
                                <p class="nk-error-text">We are very sorry for inconvenience. It looks like you’re try to access a page that either has been deleted or never existed.</p>
                                <a href="{{ route('home') }}" class="mt-2 btn btn-lg btn-primary">Back To Home</a>
                            </div>
                        </div>
                    </div><!-- .nk-block -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{asset('/assets/js/bundle.js?ver=2.3.0')}}"></script>
    <script src="{{asset('/assets/js/scripts.js?ver=2.3.0')}}"></script>

</html>
