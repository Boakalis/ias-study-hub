
<div class="nk-header nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ml-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu">
                    <em class="icon ni ni-menu"></em>
                </a>
            </div>
            <div class="nk-header-brand d-xl-none">
                <a href="<?php echo e(url('/admin/dashboard')); ?>" class="logo-link">

                    <img class="logo-light logo-img" src=" <?php echo e((isset($globalSettings->logo) && !empty($globalSettings->logo)  ? (asset($globalSettings->logo)) : "" )); ?>" srcset="<?php echo e(asset($globalSettings->logo)); ?>" alt="IAS STUDYHUB" />
                    <img class="logo-small logo-img logo-img-small" src=" <?php echo e((isset($globalSettings->logo) && !empty($globalSettings->logo)  ? (asset($globalSettings->logo)) : "" )); ?>" alt="IAS STUDYHUB" />
                    <img class="logo-dark logo-img" src=" <?php echo e((isset($globalSettings->logo) && !empty($globalSettings->logo)  ? (asset($globalSettings->logo)) : "" )); ?>" srcset="<?php echo e(asset($globalSettings->logo)); ?>" alt="IAS STUDYHUB" />
                </a>
            </div><!-- .nk-header-brand -->

            <div class="nk-header-tools">
                <ul class="nk-quick-nav">


                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle mr-n1" data-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <?php if(Auth::guard('admin')->user()->image != null): ?>
                                    <img src="<?php echo e(asset(Auth::guard('admin')->user()->image)); ?>" alt="User">
                                        <?php else: ?>
                                        <img src="<?php echo e(asset('images/website/user-photos/default-image.png')); ?>" alt="User">
                                        <?php endif; ?>
                                </div>
                                <div class="user-info d-none d-xl-block">

                                    <div class="user-name dropdown-indicator"><?php echo e(Str::ucfirst(Auth::guard('admin')->user()->name)); ?></div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        <?php if(Auth::guard('admin')->user()->image != null): ?>
                                       <span><img src="<?php echo e(asset(asset(Auth::guard('admin')->user()->image))); ?>" alt="User"></span>
                                            <?php else: ?>
                                        <span><img src="<?php echo e(asset('images/website/user-photos/default-image.png')); ?>" alt="User"></span>
                                            <?php endif; ?>
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text"><?php echo e(Str::ucfirst(Auth::guard('admin')->user()->name)); ?></span>
                                        <span class="sub-text"><?php echo e(Auth::guard('admin')->user()->email); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="<?php echo e(route('admin_settings')); ?>"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                    <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="<?php echo e(route('admin_logout')); ?>"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div><!-- .nk-header-wrap -->
    </div><!-- .container-fliud -->
</div>


<?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/admin/layouts/header.blade.php ENDPATH**/ ?>