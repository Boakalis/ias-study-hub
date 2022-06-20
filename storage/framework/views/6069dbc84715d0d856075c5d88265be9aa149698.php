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

                                                    <tr>
                                                        <th>Course Name</th>
                                                        <td>
                                                            <?php $__currentLoopData = $course_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php echo e($course->subject); ?> <br> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td class="text-right">Total Amount</td>
                                                        <td class="text-success font-24"><b>&#8377;<?php echo e($datas->amount); ?></b></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>

                                        
                                        <div class="text-center w-100 d-block my-3" >

                                        <a href="<?php echo e(url()->previous()); ?>" class="btn btn-primary btn-sm text-center">Back to Course Page</a>

                                        
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

<?php echo $__env->make('website.Layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/website/qb-payment.blade.php ENDPATH**/ ?>