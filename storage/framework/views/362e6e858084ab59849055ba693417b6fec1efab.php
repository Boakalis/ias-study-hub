 <?php $__env->startSection('meta_title'); ?>
<!-- Fav Icon  -->
<!-- Page Title  -->
<title>Payment Success Page | IAS STUDY HUB</title>
<!-- StyleSheets  -->
<style type="text/css">
    .table-responsive > .table-bordered {
        border: 1px solid #dbdfea !important;
    }
</style>
<?php $__env->stopSection(); ?>
 <?php $__env->startSection('content'); ?>
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered card-stretch">
                        <div class="card-inner-group">
                            <!-- .card-inner -->
                            <!-- .card-inner -->
                            <div class="card-inner">
                                <div class="g-3">
                                    <div class="main-contents">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-lg table-striped">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2" class="text-center font-24 text-primary text-uppercase">Payment Completed</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>Order ID</th>
                                                        <td><?php echo e($datas->order_id); ?></td>
                                                    </tr>
                                                    <?php if($datas->course_id == 1): ?>
                                                    <tr>
                                                        <th>Batch Name</th>
                                                        <td><?php echo e($batch->name); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Series Name</th>
                                                        <td><?php echo e($batch->series->name); ?></td>
                                                    </tr>
                                                    <?php elseif($datas->course_id ==3): ?> <?php if(isset($decrypt_id)>0): ?>
                                                    <tr>
                                                        <th>Category Name</th>
                                                        <td>
                                                            <?php $__currentLoopData = $question_bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($question->subject); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </td>
                                                    </tr>
                                                    <?php else: ?>
                                                    <tr>
                                                        <th>Category Name</th>
                                                        <td><?php echo e($previous_year_subject->name); ?></td>
                                                    </tr>
                                                    <?php endif; ?> <?php else: ?> <?php if(isset($decrypt_id)>0): ?>
                                                    <tr>
                                                        <th>Category Name</th>
                                                        <td>
                                                            <?php $__currentLoopData = $question_bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($question->subject); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </td>
                                                    </tr>
                                                    <?php else: ?>
                                                    <tr>
                                                        <th>Category Name</th>
                                                        <td><?php echo e($question_bank->subject); ?></td>
                                                    </tr>
                                                    <?php endif; ?> <?php endif; ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td class="text-right">Amount</td>
                                                        <td class="text-success font-24"><b>&#8377;<?php echo e($datas->amount); ?></b></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>

                                        
                                        <div class="text-center w-100 d-block my-3" >
                                        <?php if($datas->course_id ==1): ?>

                                        <a href="<?php echo e(route('testoverview',['series_slug' => $batch->series->slug,'batch_slug' => $batch->slug])); ?>" class="btn btn-primary btn-sm text-center">Back to Course Page</a>

                                        <?php elseif($datas->course_id == 3): ?> <?php if(isset($decrypt_id)>0): ?>

                                        <a href="<?php echo e(route('previousYearIndex')); ?>" class="btn btn-primary btn-sm text-center">Back to Course Page</a>
                                        <?php else: ?>

                                        <a href="<?php echo e(route('previousYearTestIndex',['category' => $previous_year_subject->slug])); ?>" class="btn btn-primary btn-sm text-center">Back to Course Page</a>
                                        <?php endif; ?> <?php elseif($datas->course_id == 2): ?> <?php if(isset($decrypt_id)>0): ?>

                                        <a href="<?php echo e(route('getQuestionBankPages',['category' => $questionbank_first->slug])); ?>" class="btn btn-primary btn-sm text-center">Back to Course Page</a>
                                        <?php else: ?>

                                        <a href="<?php echo e(route('getQuestionBankPages',['category' => $datas->qbbatch->slug])); ?>" class="btn btn-primary btn-sm text-center">Back to Course Page</a>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .card-inner-group -->
                        </div>
                        <!-- .card -->
                    </div>
                    <!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
</div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('website.Layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/website/payment_thankyou.blade.php ENDPATH**/ ?>