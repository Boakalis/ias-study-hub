<!-- sidebar @s  -->
<div class="nk-sidebar nk-sidebar-fixed is-dark" data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="<?php echo e(route('admin_dashboard')); ?>" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" style="margin-left: 20px " src="<?php echo e((isset($globalSettings->logo) && !empty($globalSettings->logo)  ? (asset($globalSettings->logo)) : "" )); ?>" alt="IAS STUDYHUB" />
                
                <img class="logo-dark logo-img m-2" src="<?php echo e((isset($globalSettings->logo) && !empty($globalSettings->logo)  ? (asset($globalSettings->logo)) : "" )); ?>" alt="IAS STUDYHUB" />
            </a>
        </div>

        <div class="nk-menu-trigger mr-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em
                    class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em
                    class="icon ni ni-menu"></em></a>
        </div>
    </div>
    <!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="<?php echo e(route('admin_dashboard')); ?>" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
                            <span class="nk-menu-text text-uppercase">Dashboard</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Exam Management</h6>
                    </li>
                    <!-- .nk-menu-heading -->

                    <!-- .nk-menu-item -->



                    <li class="nk-menu-item has-sub  ">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb-fill"></em></span>
                            <span class="nk-menu-text text-uppercase ">Question Management</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item has-sub <?php echo e(Request::is('subject*') ? 'active' : ''); ?> ">
                                <a href="<?php echo e(route('subject')); ?>" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-brick"></em></span>
                                    <span class="nk-menu-text">Category </span>
                                </a>
                            </li>
                            <!-- .nk-menu-item -->

                            <li class="nk-menu-item has-sub">
                                <a href="<?php echo e(route('question')); ?>" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-brick"></em></span>
                                    <span class="nk-menu-text">Questions </span>
                                </a>
                            </li>

                            <li class="nk-menu-item has-sub">
                                <a href="<?php echo e(route('question-bulk-import')); ?>" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-brick"></em></span>
                                    <span class="nk-menu-text">Questions Bulk Import</span>
                                </a>
                            </li>
                        </ul>
                        <!-- .nk-menu-sub -->
                    </li>
                    <!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                            <span class="nk-menu-text text-uppercase ">IAS Management</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item has-sub">
                                <a href="<?php echo e(route('series')); ?>" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-brick"></em></span>
                                    <span class="nk-menu-text">Series Management </span>
                                </a>
                            </li>

                            <li class="nk-menu-item has-sub">
                                <a href="<?php echo e(route('batch')); ?>" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-brick"></em></span>
                                    <span class="nk-menu-text">Batch Management </span>
                                </a>
                            </li>

                            <li class="nk-menu-item has-sub">
                                <a href="<?php echo e(route('test')); ?>" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-brick"></em></span>
                                    <span class="nk-menu-text">Test Management </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                            <span class="nk-menu-text text-uppercase ">
                                Previous Year  Management
                            </span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item has-sub">
                                <a href="<?php echo e(route('previous_year')); ?>" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-brick"></em></span>
                                    <span class="nk-menu-text   ">Category Management </span>
                                </a>
                            </li>

                            <li class="nk-menu-item has-sub">
                                <a href="<?php echo e(route('previous_year_categories')); ?>" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-brick"></em></span>
                                    <span class="nk-menu-text">Sub-Category Management </span>
                                </a>
                            </li>

                            <li class="nk-menu-item has-sub">
                                <a href="<?php echo e(route('previous_year_test')); ?>" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-brick"></em></span>
                                    <span class="nk-menu-text">Test Management </span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-calendar-booking"></em></span>
                            <span class="nk-menu-text text-uppercase ">Question Bank  Management</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item has-sub">
                                <a href="<?php echo e(route('question_bank_subject')); ?>" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-brick"></em></span>
                                    <span class="nk-menu-text"> Category Management </span>
                                </a>
                            </li>

                            <li class="nk-menu-item has-sub">
                                <a href="<?php echo e(route('question_bank_categories')); ?>" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-brick"></em></span>
                                    <span class="nk-menu-text"> Sub Category Management </span>
                                </a>
                            </li>

                            <li class="nk-menu-item has-sub">
                                <a href="<?php echo e(route('question_bank_question')); ?>" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-brick"></em></span>
                                    <span class="nk-menu-text   ">Question Management </span>
                                </a>
                            </li>
                        </ul>
                        <!-- .nk-menu-sub -->
                    </li>
                    <!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-layers"></em></span>
                            <span class="nk-menu-text text-uppercase ">Daily Quiz Management</span>
                        </a>
                        <ul class="nk-menu-sub">
                            
                            <li class="nk-menu-item has-sub">
                                <a href="<?php echo e(route('daily_quiz')); ?>" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-brick"></em></span>
                                    <span class="nk-menu-text">Test Management </span>
                                </a>
                            </li>
                        </ul>
                        <!-- .nk-menu-sub -->
                    </li>


                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Data Management</h6>
                    </li>


                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-reports"></em></span>
                            <span class="nk-menu-text text-uppercase ">Report Management</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item has-sub">
                                <a href="<?php echo e(route('user-reports')); ?>" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-brick"></em></span>
                                    <span class="nk-menu-text"> User Reports </span>
                                </a>
                            </li>

                            <li class="nk-menu-item has-sub">
                                <a href="<?php echo e(route('exam-reports')); ?>" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-brick"></em></span>
                                    <span class="nk-menu-text"> Exam Reports </span>
                                </a>
                            </li>

                            <li class="nk-menu-item has-sub">
                                <a href="<?php echo e(route('subscription-reports')); ?>" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-brick"></em></span>
                                    <span class="nk-menu-text">Subscription Management </span>
                                </a>
                            </li>
                        </ul>
                        <!-- .nk-menu-sub -->
                    </li>

                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-setting-fill"></em></span>
                            <span class="nk-menu-text text-uppercase ">Settings</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item has-sub">
                                <a href="<?php echo e(route('setting.general')); ?>" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-brick"></em></span>
                                    <span class="nk-menu-text"> General Setting </span>
                                </a>
                            </li>
                            <li class="nk-menu-item has-sub">
                                <a href="<?php echo e(route('setting-payment')); ?>" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-brick"></em></span>
                                    <span class="nk-menu-text"> Payment Setting </span>
                                </a>
                            </li>
                            <li class="nk-menu-item has-sub">
                                <a href="<?php echo e(route('testimonial.index')); ?>" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-brick"></em></span>
                                    <span class="nk-menu-text"> Testimonial </span>
                                </a>
                            </li>
                            <li class="nk-menu-item has-sub">
                                <a href="<?php echo e(route('page.index')); ?>" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-brick"></em></span>
                                    <span class="nk-menu-text"> Page </span>
                                </a>
                            </li>
                            <li class="nk-menu-item has-sub">
                                <a href="<?php echo e(route('landing-page.index')); ?>" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-brick"></em></span>
                                    <span class="nk-menu-text">Landing Page </span>
                                </a>
                            </li>
                            <li class="nk-menu-item has-sub">
                                <a href="<?php echo e(route('faq.index')); ?>" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-brick"></em></span>
                                    <span class="nk-menu-text">FAQ</span>
                                </a>
                            </li>
                        </ul>
                        <!-- .nk-menu-sub -->
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">Analytics Management</h6>
                        </li>


                        <li class="nk-menu-item has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-reports"></em></span>
                                <span class="nk-menu-text text-uppercase ">Analytics Reports</span>
                            </a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item has-sub">
                                    <a href="<?php echo e(route('order-analytics')); ?>" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-brick"></em></span>
                                        <span class="nk-menu-text"> Order Details</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="<?php echo e(route('referer')); ?>" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-brick"></em></span>
                                        <span class="nk-menu-text"> Referral Management</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </li>
                </ul>

            </div>
            <!-- .nk-sidebar-menu -->
        </div>
        <!-- .nk-sidebar-content -->
    </div>
    <!-- .nk-sidebar-element -->
</div>
<!-- sidebar @e  -->
<?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>