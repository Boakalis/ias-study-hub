 <?php $__env->startSection('title','IAS Test Series'); ?> <?php $__env->startSection('content'); ?>
<!-- content @s  -->
<div class="nk-content px-0">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-borderless">
                        <div class="card-aside-wrap">
                            <div class="card-inner card-inner-md">
                                <div class="nk-block-head nk-block-head-md">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content col-lg-12 px-0">
                                            <h4 class="nk-block-title text-uppercase float-left ">IAS Test Series</h4>
                                            <a href="<?php echo e(url()->previous()); ?>" class="float-right " ><em class="icon ni ni-arrow-left backarrow"></em> </a>

                                        </div>
                                    </div>
                                </div>
                                <!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row">
                                        <?php if(!$datas->isEmpty()): ?> <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-xl-4">
                                            <div class="card card-borderless box-shadow-test">
                                                <?php if(isset($data->image) && !empty($data->image)): ?>
                                                <a href="<?php echo e(route('testoverview',$data->slug)); ?>"><img src="<?php echo e(asset($data->image)); ?>" class="card-img-top" /></a>
                                                <?php else: ?>
                                                <a href="<?php echo e(route('testoverview',$data->slug)); ?>"> <img src="<?php echo e(asset('images/others/testseries-1.jpg')); ?>" class="card-img-top" /></a>
                                                <?php endif; ?>
                                                <div class="card-inner card-sm p-2">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 ">
                                                            <a class="" href="<?php echo e(route('testoverview',$data->slug)); ?>">
                                                                <span>
                                                                    <h6 class="mt-3 mb-3"><?php echo e(strtoupper($data->name)); ?></h6>
                                                                </span>
                                                            </a>

                                                        </div>

                                                        
                                                    </div>
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
                                <!-- .nk-block -->
                            </div>
                        </div>
                        <!-- .card-aside-wrap -->
                    </div>
                    <!-- .card -->
                </div>
                <!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
<!-- content @e  -->
<?php $__env->stopSection(); ?>




<?php echo $__env->make('website.Layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/website/Users/IAS/testseries.blade.php ENDPATH**/ ?>