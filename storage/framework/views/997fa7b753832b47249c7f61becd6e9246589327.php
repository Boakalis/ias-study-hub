<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title text-uppercase ">
            Order Analytics Reports
        </h3>
    </div>
</div>

<div class="table">

    <?php echo $__env->make('admin.layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="card card-preview">
        <div class="card-inner">
            <table class="datatable-init table table table-md">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Referer Name</th>
                        <th scope="col">Order-ID</th>
                        <th scope="col" class="text-center">Amount</th>
                        <th scope="col" class="text-center">Date</th>
                        <th scope="col" class="text-center">Referer Medium</th>
                        <th scope="col" class="text-center">Campaign Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $orderAnalyticss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $orderAnalytics): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($key+1); ?></td>
                        <td><?php echo e(ucfirst(@$orderAnalytics->utm_source == null ? 'Direct':$orderAnalytics->utm_source

                        )); ?></td>
                        <td>
                            <?php echo e(@$orderAnalytics->order_id); ?>

                        </td>
                        <td class="text-center">
                            <?php echo e(@$orderAnalytics->amount); ?>

                        </td>
                        <td class="text-center">
                            <?php echo e(@$orderAnalytics->date); ?>

                        </td>
                        <td><?php echo e(ucfirst(@$orderAnalytics->utm_medium == null ? 'Direct':$orderAnalytics->utm_medium

                            )); ?></td>

<td><?php echo e(ucfirst(@$orderAnalytics->utm_campaign == null ? 'Direct':$orderAnalytics->utm_campaign

    )); ?></td>

                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>

            </table>

        </div>

    </div>
<br>
    
</div>



    <?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/admin/analytics/order.blade.php ENDPATH**/ ?>