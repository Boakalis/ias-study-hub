 <?php $__env->startSection('content'); ?>
<div class="row">
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title">
            Subscription Report
        </h3>
    </div>
</div>


<div class="card card-preview">
    <div class="card-inner">
        <table class="table datatable-init table-bordered table-responsive-lg table-hover">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center" scope="col">No</th>
                    <th scope="col">Order ID</th>
                    <th scope="col">Course</th>
                    <th scope="col">Batch</th>
                    <th scope="col">Date</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Amount</th>


                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id="sid<?php echo e($data->id); ?>">
                    <td class="text-center" scope="row"><?php echo e($key+1); ?></td>
                    <td class="text-center"><?php echo e($data->order_id); ?></td>
                    <td class="text-center"><?php echo e($data->type['name']); ?></td>
                    <td class="text-center">
                    <?php if($data->course_id == 1): ?>
                        <?php echo e(@$data->batch->series['name']); ?>

                    <?php elseif($data->course_id == 3): ?>
                        <?php if($data->batch_id=='PREMIUM'): ?>
                        All
                        <?php else: ?>
                        <?php echo e($data->pyqbatch['subject']); ?>

                        <?php endif; ?>
                    <?php else: ?>
                        <?php if($data->batch_id=='PREMIUM'): ?>
                            All
                        <?php else: ?>
                            <?php echo e($data->qbbatch['subject']); ?>

                        <?php endif; ?>
                    <?php endif; ?>
                    </td>
                    <td class="text-center"><?php echo e(date('d-M-y',strtotime($data->date))); ?></td>
                    <td class="text-center"><?php echo e($data->user['fname']); ?></td>
                    <td class="text-center"><?php echo e($data->amount); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>



<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>


<script>
    //Script For Auto-Closing Alert
    $(".alert").delay(1500).fadeOut(300);
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/admin/report/subscription-report/index.blade.php ENDPATH**/ ?>