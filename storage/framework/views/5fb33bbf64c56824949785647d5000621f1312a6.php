 <?php $__env->startSection('content'); ?>
<!-- Hero Area -->
<div class="welcome-area welcome-area--l1 position-relative bg-default bg-gradient-primary">
    <div class="container">
        <div class="row">
            <!-- Welcome content Area -->
            <div class="col-xl-7 col-lg-7 col-md-7 col-xs-11 order-2 order-lg-1" data-aos="fade-right" data-aos-duration="500" data-aos-once="true">
                <div class="welcome-content welcome-content--l1">
                    <!-- <h1 class="welcome-content--l3__sub-title aos-init aos-animate mb-2" data-aos="fade-up" data-aos-duration="500" data-aos-once="true">Get Started</h1> -->
                    <h1 class="welcome-content__title">
                        Start Learning Your IAS Exam <br />
                        <span class="text-highlight highlight-text d-inline-block"></span>
                    </h1>
                    

                    <p class="welcome-content__descriptions mb-3 pt-3">With more than 50,000 registered users, IAS STUDY HUB is the ultimate mock exam platform in India. Our focus is to boost your Prelims marks within a short time!</p>
                    <p class="welcome-content__descriptions mb-3 pb-3">Join the best and most affordable online platform for your IAS examination needs</p>


                    
                </div>
            </div>
            <!--/ .Welcome Content Area -->
            <!-- Home Quick Login -->
            <div class="col-xl-5 col-lg-5 col-md-5 order-1 order-lg-2 position-static banner-imge-hide">
                <!-- Appears after Login -->
                <div class="content-image-group content-image-group--l1_1 banner-img-alt <?php echo e(isset(Auth::user()->id)&&!empty(Auth::user()->id)?'':'custom-hide'); ?> ">
                    <!-- Content Image -->
                    <img class="w-100" src="<?php echo e(asset('website/image/home-1/l1-contentOne-img-woman.png')); ?>" alt="" data-aos="fade-right" data-aos-duration="500" data-aos-once="true" />
                    <!-- Content Image -->
                    <div class="content-image-group__image content-image-group__image-1" data-aos="fade-bottom" data-aos-duration="500" data-aos-delay="300" data-aos-once="true">
                        <img class="w-100" src="<?php echo e(asset('website/image/home-1/purple-dots.png')); ?>" alt="" />
                    </div>
                    <!-- Content Image -->
                    <div class="content-image-group__image content-image-group__image-2" data-aos="fade-left" data-aos-duration="500" data-aos-delay="400" data-aos-once="true">
                        <img class="w-100" src="<?php echo e(asset('website/image/home-1/l1-contentOne-shape-1.png')); ?>" alt="" />
                    </div>
                    <!-- Content Image -->
                    <div class="content-image-group__image content-image-group__image-3" data-aos="fade-left" data-aos-duration="500" data-aos-delay="500" data-aos-once="true">
                        <img class="w-100" src="<?php echo e(asset('website/image/home-1/l1-contentOne-shape-2.png')); ?>" alt="" />
                    </div>
                    <!-- Content Image -->
                    
                </div>

                <!-- Login Div which appears before login -->
                <div class="home-login <?php echo e(isset(Auth::user()->id)&&!empty(Auth::user()->id)?'custom-hide':''); ?>" >
                    <div class="card box-shadow-style">
                        <div class="card-body">
                            <div class="text-center">
                                <h4>Get Started with IAS Study Hub</h4>
                                <p>Boost your exam preparation with us</p>

                                <center>
                                    <div class="google-login-button"       data-moment_callback="continueWithNextIdp"
                                    id="g_id_onload" style="justify-content: center" >
                                    

                                    
                                </div>

                                </center>
                                

                                

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Home Quick Logi -->
        </div>
    </div>
</div>
<!--/ .Hero Area -->

<div class="content-section py-3 bg-default mt-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="section-title__heading d-block font-24 mb-5 text-uppercase" style="letter-spacing: normal;">
                    IAS Test Series <span class="float-right text-capitalize" style="font-weight: normal !important; font-size: 18px;"><a href="<?php echo e(route('test-series')); ?>">View All</a></span>
                </h2>
            </div>
        </div>
        <div class="row align-items-center justify-content-center">
            <?php if(!$ias_series->isEmpty()): ?> <?php $__currentLoopData = $ias_series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xl-4">
                <div class="card box-shadow-course-list border-0 mb-5 course-list">
                    <?php if(isset($data->image) && !empty($data->image)): ?>
                    <a class="" href="<?php echo e(route('test-series')); ?>"><img src="<?php echo e(asset($data->image)); ?>" class="card-img-top" /></a>
                    <?php else: ?>
                    <a class="" href="<?php echo e(route('test-series')); ?>"><img src="<?php echo e(asset('images/others/testseries-1.jpg')); ?>" class="card-img-top" /></a>
                    <?php endif; ?>
                    <div class="card-inner card-sm p-1">
                        <a class="" href="<?php echo e(route('test-series')); ?>">
                            <h6 class="mt-3 mb-3"><?php echo e(strtoupper($data->name)); ?></h6>
                        </a>
                        <div class="clear"></div>
                        
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <!-- .col -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
        </div>
        <!-- .row -->
    </div>
</div>

<div class="content-section py-3 bg-default mt-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="section-title__heading d-block font-24 mb-5 text-uppercase" style="letter-spacing: normal;">
                    Previous Year Questions <span class="float-right text-capitalize" style="font-weight: normal !important; font-size: 18px;"><a href="<?php echo e(route('previousYearIndex')); ?>">View All</a></span>
                </h2>
            </div>
        </div>
        <div class="row align-items-center justify-content-center">
            <?php if(!$previous_year_questions->isEmpty()): ?> <?php $__currentLoopData = $previous_year_questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xl-4">
                <div class="card box-shadow-course-list border-0 mb-5 course-list">
                    <?php if(isset($data->image) && !empty($data->image)): ?>
                    <a class="" href="<?php echo e(route('previousYearIndex')); ?>"><img src="<?php echo e(asset($data->image)); ?>" class="card-img-top" alt="<?php echo e(strtoupper($data->name)); ?>" /></a>
                    <?php else: ?>
                    <a class="" href="<?php echo e(route('previousYearIndex')); ?>"><img src="<?php echo e(asset('images/others/testseries-1.jpg')); ?>" alt="<?php echo e(strtoupper($data->name)); ?>" class="card-img-top" /></a>
                    <?php endif; ?>
                    <div class="card-inner card-sm p-1">
                        <a class="" href="<?php echo e(route('previousYearIndex')); ?>"><h6 class="mt-3 mb-3"><?php echo e(strtoupper($data->name)); ?></h6></a>
                        <div class="clear"></div>
                        
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <!-- .col -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
        </div>
        <!-- .row -->
    </div>
</div>



<div class="content-section mt-5 py-5 bg-default mb-5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center pb-5">
            <div class="col-xxl-12">
                <div class="section-title section-title--l4 mb-0">
                    <!-- <h6 class="section-title__sub-heading text-electric-violet-3">Why Choose Us</h6> -->
                    <h2 class="section-title__heading text-theme-green">
                        Why IAS Study Hub?
                    </h2>
                    <p class="section-title__description">
                        Join the best and most affordable online platform for your IAS examination needs
                    </p>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-center pb-5">
            <div class="col-xxl-6 col-xl-6 col-lg-7 col-md-9 col-xs-11 order-2 order-lg-1">

                <div class="widgets">
                    <!-- Single Content Widgets -->
                    <div class="widgets__single d-flex">
                        <div class="widgets__single__icon">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="widgets__single__content">
                            <h4 class="widgets__single__heading">Extensive Online Test Series</h4>
                            <p class="widgets__single__content">
                                Extensive range of high-quality mock tests with thousands of questions and their solutions, as per latest exam pattern. Complete set of practice tests needed for all exams
                            </p>
                        </div>
                    </div>
                    <!--/ .Single Content Widgets -->
                    <!-- Single Content Widgets -->
                    <div class="widgets__single d-flex">
                        <div class="widgets__single__icon">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="widgets__single__content">
                            <h4 class="widgets__single__heading">Concept Building</h4>
                            <p class="widgets__single__content">
                                Sharpen your fundamentals through diversified Learning
                            </p>
                        </div>
                    </div>
                    <!--/ .Single Content Widgets -->
                    <!-- Single Content Widgets -->
                    <div class="widgets__single d-flex">
                        <div class="widgets__single__icon">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="widgets__single__content">
                            <h4 class="widgets__single__heading">Best quality content</h4>
                            <p class="widgets__single__content">
                                Our updated content is what brings 6,00,000 aspirants back to IAS STUDY HUB every time. We continuously research and outperform everyone else
                            </p>
                        </div>
                    </div>
                    <!--/ .Single Content Widgets -->
                    <!-- Single Content Widgets -->
                    <div class="widgets__single d-flex">
                        <div class="widgets__single__icon">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="widgets__single__content">
                            <h4 class="widgets__single__heading">Detailed solution</h4>
                            <p class="widgets__single__content">
                                Elaborate solutions to all questions help you understand your mistakes and in improving your marks
                            </p>
                        </div>
                    </div>
                    <!--/ .Single Content Widgets -->
                    <!-- Single Content Widgets -->
                    <div class="widgets__single d-flex">
                        <div class="widgets__single__icon">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="widgets__single__content">
                            <h4 class="widgets__single__heading">Affordable pricing</h4>
                            <p class="widgets__single__content">
                                We know money matters and that is why we have made our high-quality courses affordable for all with heavy discounts
                            </p>
                        </div>
                    </div>
                    <!--/ .Single Content Widgets -->
                </div>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-9 col-xs-10 order-1 order-lg-2">
                <div class="content-image-group content-image-group--l1_1">
                    <!-- Content Image -->
                    <img class="w-100" src="<?php echo e(asset('website/image/home-1/l1-contentOne-img-woman.png')); ?>" alt="" data-aos="fade-right" data-aos-duration="500" data-aos-once="true" />
                    <!-- Content Image -->
                    <div class="content-image-group__image content-image-group__image-1" data-aos="fade-bottom" data-aos-duration="500" data-aos-delay="300" data-aos-once="true">
                        <img class="w-100" src="<?php echo e(asset('website/image/home-1/purple-dots.png')); ?>" alt="" />
                    </div>
                    <!-- Content Image -->
                    <div class="content-image-group__image content-image-group__image-2" data-aos="fade-left" data-aos-duration="500" data-aos-delay="400" data-aos-once="true">
                        <img class="w-100" src="<?php echo e(asset('website/image/home-1/l1-contentOne-shape-1.png')); ?>" alt="" />
                    </div>
                    <!-- Content Image -->
                    <div class="content-image-group__image content-image-group__image-3" data-aos="fade-left" data-aos-duration="500" data-aos-delay="500" data-aos-once="true">
                        <img class="w-100" src="<?php echo e(asset('website/image/home-1/l1-contentOne-shape-2.png')); ?>" alt="" />
                    </div>
                    <!-- Content Image -->
                    
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container mt-5">
    <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
<div class="modal-dialog modal-md modal-dialog-centered" >
  <div class="modal-content ">
    <div class=" container-login "  >
                <div class="container-login">
                  <div class="col-left-login">
                    <div class="login-text">
                      <h4 class="">Register with us</h4>
                      <p>  Create your account.It's takes <br> less than a minute.</p>
                      <a class="btn-login btn-readical-red"  onclick="otpModalOpen()"  href="javascript:void(0)"    >Register</a>                    </div>
                  </div>
                  <div class="col-right-login">
                    <div class="login-form">
                        

                      <form method="POST"  id="loginModalForm">
                        <div class="shimmer" id="loginLoader"  style="display: none" >
                            <div class="wrapper">
                              <div class="stroke animate title"></div>
                              <div class="stroke animate link"></div>
                              <div class="stroke animate description">    </div>
                            </div>
                          </div>
                         <div id="loginModalDiv" >
                            <div class="alert alert-primary" style="display: none;" id="loginError" ></div>
                            <p>
                                
                                <input type="text" placeholder="Email Address"  name="email" autocomplete="off" required>
                              </p>
                              <p>
                                
                                <input type="password" placeholder="Password" name="password"  autocomplete="off"  required>
                              </p>
                              <p>
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" >
                                <input type="submit" value="Login" />
                              </p>
                              <p>
                                <a onclick="resetPassword()" href="javascript:void(0)">Forget Password?</a>
                              </p>

                         </div>
                      </form>
                    </div>
                  </div>
                </div>

        </form>
    </div>
  </div>
</div>
</div>

</div>


<div class="container mt-5">
    <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
<div class="modal-dialog modal-md modal-dialog-centered" >
  <div class="modal-content ">
    <div class=" container-login "  >
                <div class="container-login">
                  <div class="col-left-login">
                    <div class="login-text">
                      <h4 class="">Login</h4>
                      <p>  Already have an account ? <br> Login with credentials.</p>
                      <a class="btn-login btn-readical-red"  onclick="loginModalOpen()"  href="javascript:void(0)"    >Login</a>                    </div>
                  </div>
                  <div class="col-right-login">
                    <div class="login-form">
                        

                      <form method="POST"  id="registerModalForm">
                        <div class="shimmer" id="registerLoader"  style="display: none" >
                            <div class="wrapper">
                              <div class="stroke animate title"></div>
                              <div class="stroke animate link"></div>
                              <div class="stroke animate description">    </div>
                            </div>
                          </div>
                         <div id="registerModalDiv" >
                            <div class="alert alert-primary" style="display: none;" id="registerError" ></div>
                            <p>
                                
                                <input type="text" placeholder="Enter Name"  name="name" autocomplete="off" required>
                              </p>
                            <p>
                                
                                <input type="text" placeholder="Email Address"  name="email" autocomplete="off" required>
                              </p>
                              <p>
                                
                                <input type="password" placeholder="Password" name="password"  autocomplete="off"  required>
                              </p>
                              <p>
                                
                                <input type="password" placeholder="Confirm Password" name="confirm_password"  autocomplete="off"  required>
                              </p>
                              <p>
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" >
                                <input type="submit" value="Register" />
                              </p>
                         </div>
                      </form>
                    </div>
                  </div>
                </div>
        </form>
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
                    <div class="shimmer" id="resetPasswordLoader"  style="display: none" >
                        <div class="wrapper">
                          <div class="stroke animate title"></div>
                          <div class="stroke animate link"></div>
                        </div>
                      </div>
                      <div class="alert alert-primary" style="display: none;" id="resetPasswordError" ></div>
                                <div class="alert alert-secondary" style="display: none;" id="resetPasswordSuccess"></div>

                      <div class="panel-body" id="resetPasswordDiv" >
                        <form id="resetPasswordForm">
                              <fieldset class="login-form" >
                                      <div class="form-group">
                                          <input class="form-control input-lg" placeholder="E-mail Address" name="email"  required    type="email">
                                      </div><br>
                                      <center><input style="width: 90%;border-radius: 40px; color: #000;
                                        background-color: #2aa87e;
                                        border-color: #2aa87e;
                                        background-image: linear-gradient( 180deg ,#50b167,#1a806c);"  class="btn btn-primary btn-block btn-readical-red " value="Send Password Reset link" type="submit" id="resetPasswordButton" ></center>

                                  </fieldset>
                        </form>
                              </div>
                  </div>
              </div>
        </div>

    </div>
    </div>
  </div>
  


<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>
<script src="https://accounts.google.com/gsi/client"></script>

<script>


    function registerModalOpen() {
        document.getElementById('registerModalForm').reset();
        $('#loginModal').modal('hide');
        $('#registerModal').modal('show');
        $("#loginError").hide();
        $("#registerError").hide();

    }
    </script>

<script>
    function resetPassword() {
        document.getElementById('resetPasswordForm').reset();
        $('#loginModal').modal('hide');
        $('#resetPasswordModal').modal('show');
    }
</script>

    <script>

    function loginModalOpen() {
        document.getElementById('loginModalForm').reset();
        $('#loginModal').modal('show');
        $('#registerModal').modal('hide');
        $("#loginError").hide();
        $("#registerError").hide();

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

    $('#loginModalForm').on('submit',function(e){
        e.preventDefault();
    $.ajax({
        url: "<?php echo e(route('loginWithMail')); ?>",
        type: "GET",
        data: $("#loginModalForm").serialize(),
        beforeSend: function () {
            // Show image container
            $("#loginModalDiv").css('display','none');
            $("#loginLoader").css('display','block');

        },

        success: function (response) {
            if (response.errors) {
                $("#loginError").html("");
                $("#loginModalDiv").css('display','block');
                $("#loginLoader").css('display','none');

                $.each(response.errors, function (key, value) {
                    $("#loginError").show();
                    $("#loginError").append("<li>" + value + "</li>"  );
                });
            } else if(response.status === 601 ){
                $("#loginError").hide();
                Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Email/Password does not match !!!',
                        })
                $("#loginModalDiv").css('display','block');
                $("#loginLoader").css('display','none');

            }

            else if(response.status === 603 ){
                $("#loginError").hide();
                Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please use same login method during Register !!!',

                        })
                $("#loginModalDiv").css('display','block');
                $("#loginLoader").css('display','none');

            }

             else if(response.status === 600 ){
                $("#loginError").hide();
                Swal.fire({
                        icon : 'error',
                        title : 'Oops...' ,
                        text: ' Email not exists in our records',
                        width : 400 ,


                        })
                        $("#loginModalDiv").css('display','block');
                    $("#loginLoader").css('display','none');

            }else if(response.status === 200){
                location.reload(true)
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

    $('#resetPasswordForm').on('submit',function(e){
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
                    $("#resetPasswordError").html("<span>" + response.msg + "</span>"  );

            } else if(response.status === 601 ){
                $("#loginError").hide();
                Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Email/Password does not match !!!',
                        })
                $("#loginModalDiv").css('display','block');
                $("#loginLoader").css('display','none');

            }  else if (response.failedProcess == 'false') {
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

                        }         else if (response.errors) {

                $("#resetPasswordError").html("");
                $("#resetPasswordDiv").css('display','block');
                $("#resetPasswordLoader").css('display','none');

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

    $('#registerModalForm').on('submit',function(e){
        e.preventDefault();
    $.ajax({
        url: "<?php echo e(route('registerWithMail')); ?>",
        type: "GET",
        data: $("#registerModalForm").serialize(),
        beforeSend: function () {
            // Show image container
            $("#registerModalDiv").css('display','none');
            $("#registerLoader").css('display','block');

        },

        success: function (response) {
            if (response.errors) {
                $("#registerError").html("");
                $("#registerModalDiv").css('display','block');
                $("#registerLoader").css('display','none');

                $.each(response.errors, function (key, value) {
                    $("#registerError").show();
                    $("#registerError").append("<li>" + value + "</li>");
                });
            } else if(response.status === 601 ){
                $("#registerError").hide();
                Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Email already exists. please use sign-in option to login  !!!',
                        })
                $("#registerModalDiv").css('display','block');
                $("#registerLoader").css('display','none');

            }else if(response.status === 600 ){
                $("#registerError").hide();
                Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Password and confirm password does not match  !!!',
                        })
                $("#registerModalDiv").css('display','block');
                $("#registerLoader").css('display','none');

            }
             else if(response.status === 200){
                location.reload(true)
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

        $('#otpLogin').on('submit',function(e){
            e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('otp')); ?>",
            type: "GET",
            data: $("#otpLogin").serialize(),
            beforeSend: function () {
                // Show image container
                $('#phoneInput').css('display','none')
                $('#otpSubmit').css('display','none')
                $("#otpLoader").css('display','block');

            },

            success: function (response) {
                if (response.errors) {
                    $(".alert-primary").html("");
                    $('#phoneInput').css('display','block')
                $('#otpSubmit').css('display','block')
                $("#otpLoader").css('display','none');

                    $.each(response.errors, function (key, value) {
                        $(".alert-primary").show();
                        $(".alert-primary").append("<span>" + value + "</span>");
                    });
                } else if(response.otpSuccess === true ){
                    $(".alert-primary").hide();
                    $(".alert-secondary").show();
                    $("#hiddenPhoneInput").val(response.phone)
                    $('#otpLogin').css('display','none')
                    // $('#otpInput').css('display','block')
                    $('#verifyOtp').css('display','block')
                    // $('#otpSubmit').css('display','none')
                    // // $("#otpLoader").css('display','none');
                    // location.reload(true);
                    // $('#otpInput').css('display','block');
                    $("#otpLoader").css('display','none');

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
      theme: 'outline',
      size: 'large',
      shape: 'pill'
    });

        }
    }
  </script>



<script>

    $('#verifyOtp').on('submit',function(e){
        e.preventDefault();
    $.ajax({
        url: "<?php echo e(route('loginWithOTP')); ?>",
        type: "GET",
        data: $("#verifyOtp").serialize(),
        beforeSend: function () {
            // Show image container
            $(".alert-secondary").hide();
            $(".alert-danger").hide();
            $("#otpInput").css('display','none')
            $("#otpVerifyLoader").css('display','block');

        },

        success: function (response) {
            if (response.status === 401) {
                $(".alert-primary").html("");
                  $('#otpInput').css('display','block')
                  $("#otpVerifyLoader").css('display','none');
                    $(".alert-primary").show();
                    $(".alert-primary").append("<span>" + "OTP INVALID" + "</span>");
            } else if(response.status === 200 ){
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
                location.reload(true)

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
                cosole.log(response);
                if (response.errors) {
                    $(".alert-danger").html("");

                    $.each(response.errors, function (key, value) {
                        $(".alert-danger").show();
                        $(".alert-danger").append("<li>" + value + "</li>");
                    });
                    setTimeout(function () {
                        $(".alert-danger").hide();
                    }, 3000);
                } else if(response.status === 200) {
                    location.reload(true);
                }else if(response.status === 401){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please login with Email and password!!! Reloading page now ........',
                        })

                    setTimeout(function () {
                        location.reload(true)
                    }, 2000);

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

<?php if(auth()->guard()->guest()): ?>



<script>
    window.onload = function () {
        google.accounts.id.initialize({
            client_id:'1048692094804-jlp2g78jh3s1km3fic556ntbbf7at8h5.apps.googleusercontent.com',
            callback: handleCredentialResponse ,
            cancel_on_tap_outside: false,
            prompt_parent_id: 'g_id_onload'
        });
        google.accounts.id.prompt((notification) => {
        if (notification.isNotDisplayed() || notification.isDismissedMoment()) {
        }
    });

    };
</script>

<script>
    const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
</script>


<?php endif; ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.website-layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/website/home.blade.php ENDPATH**/ ?>