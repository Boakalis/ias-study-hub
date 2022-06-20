<!-- sidebar @s  -->
<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head bg-white">
        <div class="nk-sidebar-brand">
            <a href="<?php echo e(url('/')); ?>" class="logo-link nk-sidebar-logo">

                <img class="logo-light logo-img" src="<?php echo e((isset($globalSettings->logo) && !empty($globalSettings->logo)  ? (asset($globalSettings->logo)) : "" )); ?>" srcset="<?php echo e((isset($globalSettings->logo) && !empty($globalSettings->logo)  ? (asset($globalSettings->logo)) : "" )); ?>" alt="logo">
                <img class="logo-dark logo-img" src="<?php echo e((isset($globalSettings->logo) && !empty($globalSettings->logo)  ? (asset($globalSettings->logo)) : "" )); ?>" srcset="<?php echo e((isset($globalSettings->logo) && !empty($globalSettings->logo)  ? (asset($globalSettings->logo)) : "" )); ?>" alt="logo-dark">
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
                    <?php if(auth()->guard()->check()): ?>
                    <li class="nk-menu-item">
                        <a href="<?php echo e(route('dashboard')); ?>" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
                            <span class="nk-menu-text text-uppercase">Dashboard</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <?php endif; ?>
                    <li class="nk-menu-item">
                        <a href="<?php echo e(route('test-series')); ?>" class="nk-menu-link">
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
                                <?php if($categories != null): ?>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nk-menu-item">
                                    <a href="<?php echo e(route('getQuestionBankPages',$category->slug)); ?>" class="nk-menu-link text-white text-uppercase"><span class="nk-menu-text"><?php echo e($category->subject); ?></span></a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item --> 

                    


                    <li class="nk-menu-item">
                        <a href="<?php echo e(route('previousYearIndex')); ?>" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                            <span class="nk-menu-text text-uppercase">Previous Year Questions</span>
                        </a>
                    </li><!-- .nk-menu-item -->

                    
                    <?php if(auth()->guard()->check()): ?>
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">User Account</h6>
                    </li><!-- .nk-menu-item -->
                    
                 
                    <li class="nk-menu-item">
                        <a href="<?php echo e(route('myorder')); ?>" class="nk-menu-link" >
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
                                    <a href="<?php echo e(route('mytest')); ?>" class="nk-menu-link text-white"><span class="nk-menu-text">IAS Test Series</span></a>
                                     <a href="<?php echo e(route('qbreport')); ?>" class="nk-menu-link text-white"><span class="nk-menu-text">Question Banks</span></a> 
                                    <a href="<?php echo e(route('pyqreport')); ?>" class="nk-menu-link text-white"><span class="nk-menu-text">Previous Year Questions</span></a>

                                </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item">
                        <a href="<?php echo e(route('myprofile')); ?>" class="nk-menu-link" >
                            <span class="nk-menu-icon"><em class="icon ni ni-user"></em></span>
                            <span class="nk-menu-text text-uppercase">My Profile</span>
                        </a>
                    </li><!-- .nk-menu-item -->


                    <li class="nk-menu-item">
                        <a href="<?php echo e(route('logout')); ?>" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-signout"></em></span>
                            <span class="nk-menu-text text-uppercase">Sign Out</span>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div><!-- sidebar @e  -->
<?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/website/Layout/sidebar.blade.php ENDPATH**/ ?>