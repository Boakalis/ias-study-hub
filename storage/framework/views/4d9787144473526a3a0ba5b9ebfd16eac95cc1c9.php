<?php $__env->startSection('meta_title'); ?>
 <!-- Fav Icon  -->
 <!-- Page Title  -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title','Question Banks'); ?>
<?php $__env->startSection('content'); ?>
<div class="nk-content ">
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
                                            <h4 class="nk-block-title text-uppercase float-left ">Question Banks </h4>
                                                <a href="<?php echo e(url()->previous()); ?>" class="float-right"><em class="icon ni ni-arrow-left backarrow"></em> </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-block">
                                    <div class="row">
                                        <?php if(!$datas->isEmpty()): ?>
                                        <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-xl-4 mb-2">
                                            <div class="card card-bordered">
                                                <?php if(isset($data->image) && !empty($data->image)): ?>
                                                  <a href="<?php echo e(route('getQuestionBankPages',['category' => $data->slug])); ?>"><img  src="<?php echo e(asset($data->image)); ?>" class="card-img-top" /></a>
                                                <?php else: ?>
                                                   <a href="<?php echo e(route('getQuestionBankPages',['category' => $data->slug])); ?>"> <img  src="<?php echo e(asset('images/others/testseries-1.jpg')); ?>" class="card-img-top" /></a>
                                                <?php endif; ?>
                                                <div class="card-inner card-sm" style="padding:10px; ">
                                                <a class="" href="<?php echo e(route('getQuestionBankPages',['category' => $data->slug])); ?>"><h6 class="mt-3 mb-3"><?php echo e(strtoupper($data->subject)); ?></h6></a>
                                                    <div class="clear"></div>
                                                    
                                                    <div class="clear"></div>

                                                </div>
                                            </div>
                                        </div><!-- .col -->
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>


                                    </div><!-- .row -->

                                </div><!-- .nk-block -->
                            </div>

                        </div><!-- .card-aside-wrap -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.Layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/website/question-bank/main-index.blade.php ENDPATH**/ ?>