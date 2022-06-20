<?php $__env->startSection('title','DAILY QUIZ'); ?>
<?php $__env->startSection('content'); ?>
<?php  use Illuminate\Support\Facades\Crypt; ?>
<!-- content @s  -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="nk-block-head-content">
                        <div class="nk-block-des">
                            <p></p>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card card-bordered">

                                <div class="card-inner card-inner-md">
                                    <a href="<?php echo e(url()->previous()); ?>" class="float-right " ><em class="icon ni ni-arrow-left backarrow"></em> </a>

                                    <h4 class="nk-block-title">Daily Free Quiz</h4>

                                    <div class="row">
                                        <?php if(!$quizs->isEmpty()): ?>
                                        <?php $__currentLoopData = $quizs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-xl-3">
                                                <div class="card daily-quiz-box">
                                                    
                                                    <?php ($encrypted_id= Crypt::encryptString($quiz->id)); ?>
                                                    <a href="<?php echo e(route('quizTestPage',$encrypted_id)); ?>" class=" <?php echo e(Auth::check()?'':'test_attend'); ?> btn btn-hover color-1 text-uppercase font-16 text-white" style="border-radius:0%" > <span class="text-center" ><?php echo e($quiz->name); ?></span> </a>
                                                </div>
                                            </div><!-- .col -->
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>

                                    </div>

                                </div>
                            </div>
                        </div><!-- .col -->

                    </div><!-- .row -->

                </div>
            </div>
        </div>
    </div>
</div>
<!-- content @e  -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.Layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/website/daily-quiz/list.blade.php ENDPATH**/ ?>