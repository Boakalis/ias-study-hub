<html lang="en">
    <head>
        <base href="" />
        <meta charset="utf-8" />
        <meta name="author" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="msapplication-TileColor" content="#2aa87e" />
        <meta name="theme-color" content="#2aa87e" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="mobile-web-app-capable" content="yes" />
        <meta name="HandheldFriendly" content="True" />
        <meta name="Duplex VehiclesOptimized" content="320" />
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
        <link rel="shortcut icon" href="<?php echo e(asset(@$globalSettings->favicon)); ?>" type="image/x-icon" />
        <meta name="description" content="@page-discription" />
        <?php echo $__env->yieldContent('meta_title'); ?>
        <!-- Page Title  -->
        <title><?php echo $__env->yieldContent('title'); ?> | IAS StudyHub</title>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/dashlite.css?ver=1.4.0')); ?>" />
        <link id="skin-default" rel="stylesheet" href="<?php echo e(asset('assets/css/theme.css?ver=1.4.0')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/developer.css?v=1.0')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('backend/assets/css/website_loader.css?v=1.0')); ?>" />
        <link href="<?php echo e(asset('fontawesome/css/all.css?v=1.0')); ?>" rel="stylesheet" />
        <link href="<?php echo e(asset('assets/css/admin.css?v=1.0')); ?>" rel="stylesheet" />
        <?php echo $__env->yieldContent('stylesheet'); ?>
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

        <!--zoho pagesense-->
        <script type="text/javascript">(function(w,s){var e=document.createElement("script");e.type="text/javascript";e.async=true;e.src="https://cdn-in.pagesense.io/js/uujcylxv/e8e63fc897134f9fab80520b1d743e8a.js";var x=document.getElementsByTagName("script")[0];x.parentNode.insertBefore(e,x);})(window,"script");</script>
    </head>
    <body class="nk-body bg-lighter npc-general has-sidebar" id="masterbody">
        <?php echo $__env->make('website.include.web-preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- app-root @s  -->
        <div class="nk-app-root">
            <!-- main @s  -->
            <div class="nk-main">
                <?php echo $__env->make('website.Layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="nk-wrap">
                    <?php echo $__env->make('website.Layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo $__env->yieldContent('content'); ?> <?php echo $__env->make('website.Layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <!-- main @e  -->
        </div>
        
        <div id="loader" style="display: none;" class="loader text-center">
            <img src='<?php echo e(asset(@$globalSettings->favicon)); ?>' class="loader-image" width='32px' height='32px'>
        </div>
        
        <div class="container mt-5">
            <!-- Button trigger modal -->

            <!-- Modal -->
            <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered">
                    <div class="modal-content">
                        <div class="container-login">
                            <div class="container-login">
                                <div class="col-left-login">
                                    <div class="login-text">
                                        <h4 class="">Register with us</h4>
                                        <p>
                                            Create your account.It's takes <br />
                                            less than a minute.
                                        </p>
                                        <a class="btn-login btn-readical-red" onclick="registerModalOpen()" href="javascript:void(0)">Register</a>
                                    </div>
                                </div>
                                <div class="col-right-login">
                                    <div class="login-form">
                                        

                                        <form method="POST" id="loginModalForm">
                                            <div class="shimmer" id="loginLoader" style="display: none;">
                                                <div class="wrapper">
                                                    <div class="stroke animate title"></div>
                                                    <div class="stroke animate link"></div>
                                                    <div class="stroke animate description"></div>
                                                </div>
                                            </div>
                                            <div id="loginModalDiv">
                                                <div class="alert alert-primary" style="display: none;" id="loginError"></div>
                                                <p>
                                                    
                                                    <input type="text" placeholder="Email Address" name="email" autocomplete="off" required />
                                                </p>
                                                <p>
                                                    
                                                    <input type="password" placeholder="Password" name="password" autocomplete="off" required />
                                                </p>
                                                <p>
                                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                                    <input type="submit" value="Login" />
                                                </p>
                                                <p>
                                                    <a onclick="resetPassword()" href="javascript:void(0)">Forget Password?</a>
                                                </p>
                                                <center><span>OR</span></center>

                                                <center>
                                                    <a class="mt-2 btn-login btn btn-sm btn-outline-dark" href="javascript:void(0)" onclick="otpModalOpen()">
                                                        
                                                        <span>See Alternative options to login</span>
                                                    </a>
                                                </center>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="container mt-5">
            <!-- Button trigger modal -->

            <!-- Modal -->
            <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered">
                    <div class="modal-content">
                        <div class="container-login">
                            <div class="container-login">
                                <div class="col-left-login">
                                    <div class="login-text">
                                        <h4 class="">Login</h4>
                                        <p>
                                            Already have an account ? <br />
                                            Login with credentials.
                                        </p>
                                        <a class="btn-login btn-readical-red" onclick="loginModalOpen()" href="javascript:void(0)">Login</a>
                                    </div>
                                </div>
                                <div class="col-right-login">
                                    <div class="login-form">
                                        

                                        <form method="POST" id="registerModalForm">
                                            <div class="shimmer" id="registerLoader" style="display: none;">
                                                <div class="wrapper">
                                                    <div class="stroke animate title"></div>
                                                    <div class="stroke animate link"></div>
                                                    <div class="stroke animate description"></div>
                                                </div>
                                            </div>
                                            <div id="registerModalDiv">
                                                <div class="alert alert-primary" style="display: none;" id="registerError"></div>
                                                <p>
                                                    
                                                    <input type="text" placeholder="Enter Name" name="name" autocomplete="off" required />
                                                </p>
                                                <p>
                                                    
                                                    <input type="text" placeholder="Email Address" name="email" autocomplete="off" required />
                                                </p>
                                                <p>
                                                    
                                                    <input type="password" placeholder="Password" name="password" autocomplete="off" required />
                                                </p>
                                                <p>
                                                    
                                                    <input type="password" placeholder="Confirm Password" name="confirm_password" autocomplete="off" required />
                                                </p>
                                                <p>
                                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                                    <input type="submit" value="Register" />
                                                </p>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <!--modal-->
        <div id="resetPasswordModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <center><h6>Reset Password</h6></center>
                    </div>

                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="shimmer" id="resetPasswordLoader" style="display: none;">
                                      <div class="wrapper">
                                        <div class="stroke animate title"></div>
                                        <div class="stroke animate title"></div>
                                    </div>
                                </div>
                                <div class="alert alert-primary" style="display: none;" id="resetPasswordError"></div>
                                <div class="alert alert-secondary" style="display: none;" id="resetPasswordSuccess"></div>

                                <div class="panel-body" id="resetPasswordDiv">
                                    <form id="resetPasswordForm">
                                        <fieldset class="login-form">
                                            <div class="form-group">
                                                <input class="form-control input-lg" placeholder="E-mail Address" name="email" required type="email" />
                                            </div>
                                            <br />
                                            <center>
                                                <input
                                                    style="width: 90%; border-radius: 40px; color: #000; background-color: #2aa87e; border-color: #2aa87e; background-image: linear-gradient(180deg, #50b167, #1a806c);"
                                                    class="btn btn-primary btn-block btn-readical-red"
                                                    value="Send Password Reset link"
                                                    type="submit" id="resetPasswordButton"
                                                />
                                            </center>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div id="profileDetailsModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header" style="justify-content: center;">
                        <center><h6>Profile Details</h6></center>
                    </div>

                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="alert alert-danger" style="display: none;" id="profileDetailsError"></div>

                                <div class="panel-body" id="profileDetailsDiv">
                                    <form id="profileDetailsForm">
                                        <fieldset class="login-form">
                                            <div class="shimmer" id="profileDetailsLoader" style="display: none;">
                                                <div class="wrapper">
                                                    <div class="stroke animate title"></div>
                                                    <div class="stroke animate link"></div>
                                                    <div class="stroke animate description"></div>
                                                </div>
                                            </div>
                                            <div class="form-group" id="profileDetailDiv">
                                                <div class="alert alert-primary" style="display: none;" id="ProfileDetailError"></div>
                                                <input
                                                    class="form-control input-lg"
                                                    placeholder="E-mail Address"
                                                    value="<?php echo e(isset(Auth::user()->email) && !empty(Auth::user()->email)?Auth::user()->email:''); ?>"
                                                    name="email"
                                                    required
                                                    type="email"
                                                />
                                                <br />
                                                <input
                                                    class="form-control input-lg"
                                                    placeholder="Phone Number"
                                                    value="<?php echo e(isset(Auth::user()->phone) && !empty(Auth::user()->phone)?Auth::user()->phone:''); ?>"
                                                    name="phone"
                                                    required
                                                    type="phone"
                                                />
                                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                            </div>
                                            <br />
                                            <center>
                                                <input
                                                    style="width: 50%; border-radius: 40px; color: #000; background-color: #2aa87e; border-color: #2aa87e; background-image: linear-gradient(180deg, #50b167, #1a806c);"
                                                    class="btn btn-primary btn-block btn-readical-red"
                                                    value="Update"
                                                    type="submit"
                                                />
                                            </center>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

        <!-- app-root @e  -->
        <!-- JavaScript -->
         
        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="otpWithGoogleModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="card box-shadow-style">
                            <div class="card-body">
                                <div class="text-center">
                                    <h4>Get Started with IAS Study Hub</h4>
                                    <p>Boost your exam preparation with us</p>

                                    <center>
                                        <div class="google-login-button" data-moment_callback="continueWithNextIdp" id="g_id_onload" style="justify-content: center;">
                                            <div style="position: relative; z-index: 9999; top: 0px; left: 0px; height: 271px; width: auto;" id="credential_picker_container">
                                                <iframe
                                                    src="https://accounts.google.com/gsi/iframe/select?client_id=1048692094804-jlp2g78jh3s1km3fic556ntbbf7at8h5.apps.googleusercontent.com/&amp;ux_mode=popup&amp;ui_mode=card&amp;as=swuiycsBFw9bfR3-L8AgCu9x&amp;channel_id=5719054ec8a4608b0fb3953d0885dcd2fea977dd10eb0c00bd634a9f2468905f&amp;origin=http%3A%2F%2Flocalhost%3A8000"
                                                    title="Sign in with Google Dialog"
                                                    style="height: 271px; width: 391px; overflow: hidden;"
                                                ></iframe>
                                            </div>
                                        </div>
                                    </center>
                                    

                                    

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="cookie-message" id="cookie-close" style="display: none;">
            <img src="https://img.icons8.com/plasticine/100/000000/cookie.png" />
            <span>
                We use cookies to provide you the best possible experience. But don't panic - we won't share any of your data. You can find more informations about our cookies <a href="<?php echo e(route('getPage','privacy-policy')); ?>">here</a>.
            </span>
            <a class="close" href="javascript:void(0)" onclick="closeAlert()"><i class="fa fa-times"></i></a>
        </div>

        <script src="<?php echo e(asset('assets/js/bundle.js?ver=1.4.0')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/scripts.js?ver=1.4.0')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/charts/gd-invest.js?ver=1.4.0')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/developer.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/plugins/jquery-validation/jquery.validate.min.js')); ?>"></script>
        
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.0/dist/js.cookie.min.js"></script>

        <script>
            document.getElementById("image").addEventListener("click", openDialog);
            function openDialog() {
                document.getElementById("field").click();
            }
            document.getElementById("field").addEventListener("change", openDialog1);
            function openDialog1() {
                document.getElementById("imageupload").click();
            }
        </script>

        <script>
            window.addEventListener("pageshow", function (event) {
                var historyTraversal = event.persisted || (typeof window.performance != "undefined" && window.performance.navigation.type === 2);
                if (historyTraversal) {
                    // Handle page restore.
                    window.location.reload();
                }
            });
        </script>

        <?php if(auth()->guard()->guest()): ?>
        <script>
            $(".pay_now").on("click", function (e) {
                e.preventDefault();
                var SITEURL = "<?php echo e(URL::to(" / ")); ?>";
                window.history.pushState("", "payment", "?razorpay");
                otpModalOpen();
            });
        </script>

        <script>
            $(".premium").on("click", function (e) {
                e.preventDefault();
                var SITEURL = "<?php echo e(URL::to(" / ")); ?>";
                window.history.pushState("", "payment", "?razorpay");
                otpModalOpen();
            });
        </script>

        <script>
            $(".test_attend").on("click", function (e) {
                e.preventDefault();
                // var SITEURL = "<?php echo e(URL::to(" / ")); ?>";
                // window.history.pushState("", "test", "?mock-test");

                // // $target =
                // $(this).classList.add('buttonToClick');
                // console.log(href);
                // document.cookie = "href="+href;

                 var href = $(this).attr('href');
                var date = new Date();
                var minutes = 1   ;
                date.setTime(date.getTime()+(minutes*60*1000));
                // $.cookie("href",href,{expires:date})
                Cookies.set('test_cookie',href, { expires: date, path: '' })

                otpModalOpen();

            });
        </script>






        <script>
            $(".pay_all_now").on("click", function (e) {
                e.preventDefault();
                var SITEURL = "<?php echo e(URL::to(" / ")); ?>";
                window.history.pushState("", "payment", "?payment_gateways");
            });
        </script>

        <script src="https://accounts.google.com/gsi/client"></script>

        <script>
            function registerModalOpen() {
                document.getElementById("registerModalForm").reset();
                $("#loginModal").modal("hide");
                $("#registerModal").modal("show");
                $("#loginError").hide();
                $("#registerError").hide();
                $("#otpWithGoogleModal").modal("hide");
            }
        </script>

        <script>
            function otpModalOpen() {
                $("#loginModal").modal("hide");
                $("#registerModal").modal("hide");
                $("#otpWithGoogleModal").modal("show");
            }
        </script>

        <script>
            function resetPassword() {
                document.getElementById("resetPasswordForm").reset();
                $("#loginModal").modal("hide");
                $("#resetPasswordModal").modal("show");
                $("#otpWithGoogleModal").modal("hide");
            }
        </script>

        <script>
            function loginModalOpen() {
                document.getElementById("loginModalForm").reset();
                $("#loginModal").modal("show");
                $("#registerModal").modal("hide");
                $("#loginError").hide();
                $("#otpWithGoogleModal").modal("hide");
                $("#registerError").hide();
            }
        </script>

        <script>
            $("#loginModalForm").on("submit", function (e) {
                e.preventDefault();
                $.ajax({
                    url: "<?php echo e(route('loginWithMail')); ?>",
                    type: "GET",
                    data: $("#loginModalForm").serialize(),
                    beforeSend: function () {
                        // Show image container
                        $("#loginModalDiv").css("display", "none");
                        $("#loginLoader").css("display", "block");
                    },

                    success: function (response) {
                        if (response.errors) {
                            $("#loginError").html("");
                            $("#loginModalDiv").css("display", "block");
                            $("#loginLoader").css("display", "none");

                            $.each(response.errors, function (key, value) {
                                $("#loginError").show();
                                $("#loginError").append("<li>" + value + "</li>");
                            });
                        } else if (response.status === 601) {
                            $("#loginError").hide();
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: "Email/Password does not match !!!",
                            });
                            $("#loginModalDiv").css("display", "block");
                            $("#loginLoader").css("display", "none");
                        } else if (response.status === 603) {
                            $("#loginError").hide();
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: "Please use same login method during Register !!!",
                            });
                            $("#loginModalDiv").css("display", "block");
                            $("#loginLoader").css("display", "none");
                        } else if (response.status === 600) {
                            $("#loginError").hide();
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: " Email not exists in our records",
                                width: 400,
                            });
                            $("#loginModalDiv").css("display", "block");
                            $("#loginLoader").css("display", "none");
                        } else if (response.status === 200) {
                            if (Cookies.get('test_cookie') === undefined ) {
                                location.reload(true);
                            } else {
                                var cookie = Cookies.get('test_cookie');
                                window.location.href = cookie ;
                             }
                        }
                    },
                    complete: function (response) {
                        $("#loader").hide();
                    },
                    error: function (error) {
                        console.log(error);
                        //   alert('data not saved')
                    },
                });
            });
        </script>

        

        <script>
            $("#resetPasswordForm").on("submit", function (e) {
                e.preventDefault();
        $('#resetPasswordError').hide();
        $('#resetPasswordSuccess').hide();

                $.ajax({
                    url: "<?php echo e(route('forgotPasswordLink')); ?>",
                    type: "GET",
                    data: $("#resetPasswordForm").serialize(),
                    beforeSend: function () {
                        // Show image container
                        $("#resetPasswordDiv").css('display','none');
                        $("#resetPasswordLoader").css('display','block');
                    },

                    success: function (response) {
                        if (response.status === 600) {
                            $("#resetPasswordError").html("");
                            $("#resetPasswordDiv").css('display','block');
                            $("#resetPasswordLoader").css('display','none');

                            $("#resetPasswordError").show();
                            $("#resetPasswordError").html("<span>" + response.msg + "</span>");
                        } else if (response.status === 601) {
                            $("#loginError").hide();
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: "Email/Password does not match !!!",
                            });
                            $("#loginModalDiv").css("display", "block");
                            $("#loginLoader").css("display", "none");
                        } else if (response.failedProcess == 'false') {
                            // if (Cookies.get('test_cookie') === undefined ) {
                            //     location.reload(true);
                            // } else {
                            //     var cookie = Cookies.get('test_cookie');
                            //     window.location.href = cookie ;
                            //  }
                            $("#resetPasswordDiv").css('display','block');
                            $("#resetPasswordLoader").css('display','none');
                            $("#resetPasswordSuccess").show();
                            $("#resetPasswordSuccess").html("<span>" + "Password Reset Mail Send" + "</span>");
                            $("#resetPasswordDiv").hide();
                        } else if (response.errors) {
                            $("#resetPasswordError").html("");
                            $("#resetPasswordDiv").css("display", "block");
                            $("#resetPasswordLoader").css("display", "none");

                            $.each(response.errors, function (key, value) {
                                $("#resetPasswordError").show();
                                $("#resetPasswordError").append("<li>" + value + "</li>");
                            });
                        }
                    },
                    complete: function (response) {
                        $("#loader").hide();
                    },
                    error: function (error) {
                        console.log(error);
                        //   alert('data not saved')
                    },
                });
            });
        </script>

        <script>
            $("#registerModalForm").on("submit", function (e) {
                e.preventDefault();
                $.ajax({
                    url: "<?php echo e(route('registerWithMail')); ?>",
                    type: "GET",
                    data: $("#registerModalForm").serialize(),
                    beforeSend: function () {
                        // Show image container
                        $("#registerModalDiv").css("display", "none");
                        $("#registerLoader").css("display", "block");
                    },

                    success: function (response) {
                        if (response.errors) {
                            $("#registerError").html("");
                            $("#registerModalDiv").css("display", "block");
                            $("#registerLoader").css("display", "none");

                            $.each(response.errors, function (key, value) {
                                $("#registerError").show();
                                $("#registerError").append("<li>" + value + "</li>");
                            });
                        } else if (response.status === 601) {
                            $("#registerError").hide();
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: "Email already exists. please use sign-in option to login  !!!",
                            });
                            $("#registerModalDiv").css("display", "block");
                            $("#registerLoader").css("display", "none");
                        } else if (response.status === 600) {
                            $("#registerError").hide();
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: "Password and confirm password does not match  !!!",
                            });
                            $("#registerModalDiv").css("display", "block");
                            $("#registerLoader").css("display", "none");
                        } else if (response.status === 200) {
                            if (Cookies.get('test_cookie') === undefined ) {
                                location.reload(true);
                            } else {
                                var cookie = Cookies.get('test_cookie');
                                window.location.href = cookie ;
                             }
                        }
                    },
                    complete: function (response) {
                        $("#loader").hide();
                    },
                    error: function (error) {
                        console.log(error);
                        //   alert('data not saved')
                    },
                });
            });
        </script>

        <script>
            $("#otpLogin").on("submit", function (e) {
                e.preventDefault();
                $.ajax({
                    url: "<?php echo e(route('otp')); ?>",
                    type: "GET",
                    data: $("#otpLogin").serialize(),
                    beforeSend: function () {
                        // Show image container
                        $("#phoneInput").css("display", "none");
                        $("#otpSubmit").css("display", "none");
                        $("#otpLoader").css("display", "block");
                    },

                    success: function (response) {
                        if (response.errors) {
                            $(".alert-primary").html("");
                            $("#phoneInput").css("display", "block");
                            $("#otpSubmit").css("display", "block");
                            $("#otpLoader").css("display", "none");

                            $.each(response.errors, function (key, value) {
                                $(".alert-primary").show();
                                $(".alert-primary").append("<span>" + value + "</span>");
                            });
                        } else if (response.otpSuccess === true) {
                            $(".alert-primary").hide();
                            $(".alert-secondary").show();
                            $("#hiddenPhoneInput").val(response.phone);
                            $("#otpLogin").css("display", "none");
                            // $('#otpInput').css('display','block')
                            $("#verifyOtp").css("display", "block");
                            // $('#otpSubmit').css('display','none')
                            // // $("#otpLoader").css('display','none');
                            // location.reload(true);
                            // $('#otpInput').css('display','block');
                            $("#otpLoader").css("display", "none");
                        } else {
                            $(".alert-primary").html("");
                            $(".alert-primary").append("<li>" + "Something Went wrong" + "</li>");
                            $("#phoneInput").css("display", "block");
                            $("#otpSubmit").css("display", "block");
                            $("#otpLoader").css("display", "none");
                        }
                    },
                    complete: function (response) {
                        $("#loader").hide();
                    },
                    error: function (error) {
                        console.log(error);
                        //   alert('data not saved')
                    },
                });
            });
        </script>

        <script>
            function continueWithNextIdp(notification) {
                if (notification.isNotDisplayed() || notification.isSkippedMoment()) {
                    google.accounts.id.renderButton(g_id_onload, {
                        theme: "outline",
                        size: "large",
                        shape: "pill",
                    });
                }
            }
        </script>

        <script>
            $("#verifyOtp").on("submit", function (e) {
                e.preventDefault();
                $.ajax({
                    url: "<?php echo e(route('loginWithOTP')); ?>",
                    type: "GET",
                    data: $("#verifyOtp").serialize(),
                    beforeSend: function () {
                        // Show image container
                        $(".alert-secondary").hide();
                        $(".alert-danger").hide();
                        $("#otpInput").css("display", "none");
                        $("#otpVerifyLoader").css("display", "block");
                    },

                    success: function (response) {
                        if (response.status === 401) {
                            $(".alert-primary").html("");
                            $("#otpInput").css("display", "block");
                            $("#otpVerifyLoader").css("display", "none");
                            $(".alert-primary").show();
                            $(".alert-primary").append("<span>" + "OTP INVALID" + "</span>");
                        } else if (response.status === 200) {
                            // $(".alert-primary").hide();
                            // $(".alert-secondary").show();
                            // $('#phoneInput').css('display','none')
                            // $('#otpInput').css('display','block')
                            // $('#loginSubmit').css('display','block')
                            // $('#otpSubmit').css('display','none')
                            // $("#otpLoader").css('display','none');
                            // location.reload(true);
                            // $('#otpInput').css('display','block');
                            // $("#otpLoader").css('display','none');
                            if (Cookies.get('test_cookie') === undefined ) {
                                location.reload(true);
                            } else {
                                var cookie = Cookies.get('test_cookie');
                                window.location.href = cookie ;
                             }
                        }
                    },
                    complete: function (response) {
                        $("#loader").hide();
                    },
                    error: function (error) {
                        console.log(error);
                        //   alert('data not saved')
                    },
                });
            });
        </script>

        <script>
            function parseJwt(token) {
                var base64Url = token.split(".")[1];
                var base64 = base64Url.replace(/-/g, "+").replace(/_/g, "/");
                var jsonPayload = decodeURIComponent(
                    atob(base64)
                        .split("")
                        .map(function (c) {
                            return "%" + ("00" + c.charCodeAt(0).toString(16)).slice(-2);
                        })
                        .join("")
                );

                return JSON.parse(jsonPayload);
            }
        </script>

        <script>
            function handleCredentialResponse(response) {
                var decoded = JSON.stringify(parseJwt(response.credential));
                $.ajax({
                    url: "<?php echo e(route('handlecallback')); ?>",
                    type: "get",
                    data: {
                        _token: "<?php echo e(csrf_token()); ?>",
                        decoded: decoded,
                        onetaplogin: 1,
                    },
                    beforeSend: function () {
                        // Show image container
                        $("#loader").show();
                    },

                    success: function (response) {
                        if (response.errors) {
                            $(".alert-danger").html("");

                            $.each(response.errors, function (key, value) {
                                $(".alert-danger").show();
                                $(".alert-danger").append("<li>" + value + "</li>");
                            });
                            setTimeout(function () {
                                $(".alert-danger").hide();
                            }, 3000);
                        } else if (response.status === 200) {
                            if (Cookies.get('test_cookie') === undefined ) {
                                location.reload(true);
                            } else {
                                var cookie = Cookies.get('test_cookie');
                                window.location.href = cookie ;
                             }
                        } else if (response.status === 400) {
                            $(".alert-danger").show();
                            $(".alert-danger").append("<li>" + "Please Login using email and password" + "</li>");
                        }
                    },
                    complete: function (response) {
                        $("#loader").hide();
                    },
                    error: function (error) {
                        console.log(error);
                    },
                });
            }
        </script>

        <script>
            window.onload = function () {
                google.accounts.id.initialize({
                    client_id: "1048692094804-jlp2g78jh3s1km3fic556ntbbf7at8h5.apps.googleusercontent.com",
                    callback: handleCredentialResponse,
                    cancel_on_tap_outside: false,
                    prompt_parent_id: "g_id_onload",
                });
                google.accounts.id.prompt((notification) => {
                    if (notification.isNotDisplayed() || notification.isDismissedMoment()) {
                    }
                });
            };
        </script>

        <script>
            const signUpButton = document.getElementById("signUp");
            const signInButton = document.getElementById("signIn");
            const container = document.getElementById("container");

            signUpButton.addEventListener("click", () => {
                container.classList.add("right-panel-active");
            });

            signInButton.addEventListener("click", () => {
                container.classList.remove("right-panel-active");
            });
        </script>

        <?php endif; ?>

        <script>
            $("#floating-icon").click(function () {
                $("#floating-ligar").toggle();
                $("#floating-whatsapp").toggle();
            });
        </script>

        <script>
            $("#floating-icon").click();
        </script>
         <?php echo $__env->yieldContent('javascript'); ?>

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
        <script>
            $(window).on("load", function () {
                $(".preloader").hide();
                $("body").css("overflow", "scroll");
            });
        </script>

        <?php if(auth()->guard()->check()): ?>
        <script>
            $("#profileDetailsForm").on("submit", function (e) {
                e.preventDefault();
                $.ajax({
                    url: "<?php echo e(route('profileDetails')); ?>",
                    type: "GET",
                    data: $("#profileDetailsForm").serialize(),
                    beforeSend: function () {
                        // Show image container
                        // $("#profileDetailDiv").css('display','none');
                        // $("#profileDetailsLoader").css('display','block');
                    },

                    success: function (response) {
                        if (response.errors) {
                            $("#profileDetailsError").html("");
                            $("#profileDetailDiv").css("display", "block");
                            $("#profileDetailsLoader").css("display", "none");

                            $.each(response.errors, function (key, value) {
                                $("#profileDetailsError").show();
                                $("#profileDetailsError").append("<li>" + value + "</li>");
                            });
                        } else if (response.status === 200) {
                            $("#profileDetailsModal").modal("hide");
                            location.reload(true);
                        }
                    },
                    complete: function (response) {
                        $("#loader").hide();
                    },
                    error: function (error) {
                        console.log(error);
                        //alert('data not saved')
                    },
                });
            });
        </script>
        <?php endif; ?>

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
    </body>
</html>
<?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/website/Layout/master.blade.php ENDPATH**/ ?>