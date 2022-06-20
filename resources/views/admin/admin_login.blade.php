<!DOCTYPE html>
<html lang="zxx" class="js">

<head>

    <meta charset="utf-8">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{asset('backend/images/favicon.png')}}">
    <!-- Page Title  -->
    <title>Login | Admin </title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/dashlite.css?ver=2.3.0')}}">
    <link id="skin-default" rel="stylesheet" href="{{asset('backend/assets/css/theme.css?ver=2.3.0')}}">
</head>

<body class="nk-body bg-white npc-default pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-split nk-split-page nk-split-md">
                        <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
                            <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                                <a href="#" class="toggle btn-white btn btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
                            </div>
                            <div class="nk-block nk-block-middle nk-auth-body">
                                <div class="brand-logo pb-5">
                                    {{--<a href="{{route('login')}}" class="logo-link">
                                        <img class="logo-light logo-img logo-img-lg" src="{{ asset($generalSetting->logo) }}" srcset="{{ asset($generalSetting->logo) }}" alt="logo">
                                        <img class="logo-dark logo-img logo-img-lg" src="{{ asset($generalSetting->logo) }}" srcset="{{ asset($generalSetting->logo) }}" alt="logo-dark">
                                    </a>--}}
                                </div>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h2 class="nk-block-title">Welcome Admin,</h2>
                                        <h5 class="nk-block-title">Please Sign-In Below</h5>

                                    </div>
                                </div><!-- .nk-block-head -->
                                @if (Session::has('error_message'))
                                <div class="alert alert-danger fade show" role="alert">
                                    {{Session::get('error_message')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>

                                @endif

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{route('admin_login')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Email or Username</label>
                                        </div>
                                        <input type="text" class="form-control form-control-lg" name="email" id="email" placeholder="Enter your email address or username">
                                    </div><!-- .foem-group -->
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Passcode</label>
                                            </div>
                                        <div class="form-control-wrap">
                                            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Enter your passcode">
                                        </div>
                                    </div><!-- .foem-group -->
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                                    </div>
                                </form><!-- form -->

                            </div><!-- .nk-block -->
                            <div class="nk-block nk-auth-footer">

                            </div><!-- .nk-block -->
                        </div><!-- .nk-split-content -->
                        <div class="nk-split-content nk-split-stretch bg-abstract"></div><!-- .nk-split-content -->
                    </div><!-- .nk-split -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{asset('backend/assets/js/bundle.js?ver=2.3.0')}}"></script>
    <script src="{{asset('backend/assets/js/scripts.js?ver=2.3.0')}}"></script>

</html>

