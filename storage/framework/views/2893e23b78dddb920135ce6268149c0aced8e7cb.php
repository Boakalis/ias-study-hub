<?php
    use Carbon\Carbon;
    ?>
    <!-- main header @s  -->

    <div class="nk-header nk-header-fixed is-light">
        <div class="container-fluid">
            <div class="nk-header-wrap">
                <div class="nk-menu-trigger d-xl-none ml-n1">
                    <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                </div>
                <div class="nk-header-brand d-xl-none">
                    <a href="<?php echo e(route('dashboard')); ?>" class="logo-link">
                        <img class="logo-light logo-img" src="<?php echo e((isset($generalSetting->logo) && !empty($generalSetting->logo)  ? (asset($generalSetting->logo)) : "" )); ?>" srcset="<?php echo e((isset($generalSetting->logo) && !empty($generalSetting->logo)  ? (asset($generalSetting->logo)) : "" )); ?>" alt="">
                        <img class="logo-dark logo-img" src=" <?php echo e((isset($generalSetting->logo) && !empty($generalSetting->logo)  ? (asset($generalSetting->logo)) : "" )); ?>" srcset="<?php echo e((isset($generalSetting->logo) && !empty($generalSetting->logo)  ? (asset($generalSetting->logo)) : "" )); ?>" alt="">

                    </a>
                </div><!-- .nk-header-brand -->
                <div class="nk-header-news d-none d-xl-block">
                    <div class="nk-news-list">
                        <a class="nk-news-item" href="#">
                            
                            
                        </a>
                    </div>
                </div><!-- .nk-header-news -->
                <?php if(auth()->guard()->guest()): ?>
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
                <?php endif; ?>
                <?php if(auth()->guard()->check()): ?>
                <div class="nk-header-tools">
                    <ul class="nk-quick-nav">
                        <li class="dropdown user-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <div class="user-toggle">
                                    <div class="user-avatar sm">
                                        <?php if(Auth::user()->image != null): ?>
                                    <img src="<?php echo e(asset(Auth::user()->image)); ?>" alt="User">
                                        <?php else: ?>
                                        <img src="<?php echo e(asset('images/website/user-photos/default-image.png')); ?>" alt="User">
                                        <?php endif; ?>
                                    </div>
                                    <div class="user-info d-none d-md-block">
                                        <div class="user-name dropdown-indicator" id="name">
                                            <?php if(Auth::user()->fullname == 1): ?>
                                            <span class="data-value <?php echo e((Auth::user()->is_prime == 1 &&  Carbon::parse(Auth::user()->prime_start_date)->diffInDays(Carbon::now()) <= 365)? 'premium-badge' : ''); ?> "> <?php echo e(Str::ucfirst(Auth::user()->fname)); ?>&nbsp;<?php echo e(Auth::user()->lname); ?></span>
                                            <?php else: ?>
                                            <span class="data-value <?php echo e((Auth::user()->is_prime == 1 &&  Carbon::parse(Auth::user()->prime_start_date)->diffInDays(Carbon::now()) <= 365)? 'premium-badge' : ''); ?> "  > <?php echo e(Str::ucfirst(Auth::user()->fname)); ?></span>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                                <div class="dropdown-inner user-card-wrap bg-lighter d-none d-sm-block">
                                    <div class="user-card">
                                        <div class="user-avatar">
                                            <?php if(Auth::user()->image != null): ?>
                                            <img id="image" src="<?php echo e(asset(Auth::user()->image)); ?>"  style="cursor: pointer"  alt="User">
                                                <?php else: ?>
                                                <img id="image" src="<?php echo e(asset('images/website/user-photos/default-image.png')); ?>" style="cursor: pointer"  alt="User">
                                                <?php endif; ?>
                                        </div> &nbsp;&nbsp;&nbsp;
                                        <form action="<?php echo e(route('image-update')); ?>" method="post" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <input id='field' type='file' name="image" hidden/>
                                            <button type="submit" id="imageupload" hidden ></button>
                                    </form>

                                        <div class="user-info">
                                            <span class="lead-text shiny font-20 <?php echo e((Auth::user()->is_prime == 1 &&  Carbon::parse(Auth::user()->prime_start_date)->diffInDays(Carbon::now()) <= 365)? 'premium-badge' : ''); ?> "><?php echo e(Str::ucfirst(Auth::user()->fname)); ?>&nbsp;<?php echo e(Str::ucfirst(Auth::user()->lname)); ?></span>
                                            <span class="sub-text"><?php echo e(Auth::user()->email); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-inner">
                                    <ul class="link-list">
                                        <li><a href="<?php echo e(route('myprofile')); ?>"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                        <li><a href="<?php echo e(route('settings')); ?>" ><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                        <li><a href="<?php echo e(route('mytest')); ?>"><em class="icon ni ni-activity-alt"></em><span>My Tests</span></a></li>
                                        
                                    </ul>
                                </div>
                                <div class="dropdown-inner">
                                    <ul class="link-list">
                                        <li><a href="<?php echo e(route('logout')); ?>"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li><!-- .dropdown -->
                        
                    </ul><!-- .nk-quick-nav -->
                </div><!-- .nk-header-tools -->
                <?php endif; ?>
            </div><!-- .nk-header-wrap -->
            
        </div><!-- .container-fliud -->
    </div>





<?php $__env->startSection('javascript'); ?>
<script>
    $(document).ready(function(){
        var name = $('#name').text();
        var intials = $('#name').text().charAt(0);
        var profileImage = $('#profileImage').text(intials);
    });
</script>
<?php $__env->stopSection(); ?>
<?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/website/Layout/header.blade.php ENDPATH**/ ?>