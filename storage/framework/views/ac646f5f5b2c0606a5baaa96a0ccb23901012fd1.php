 <?php $__env->startSection('content'); ?>

<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-inner">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="title nk-block-title">Question Bank Exam Reports</h4>
            </div>
        </div>
        <div class="card card-preview">
            <div class="card-inner">
                <table class="datatable-init table ">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Amount</th>
                            <th scope="col">No.of.Categories in Series</th>
                            <th scope="col">No.of.Subscribed Users</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <tr id="sid<?php echo e($category->id); ?>">
                       <td><?php echo e($key+1); ?></td>
                        <td><?php echo e($category->subject); ?></td>
                        <td><?php echo e($category->price); ?></td>
                       <td>
                            <?php if($category->categorycount != null): ?>
                            <?php echo e($category->categorycount); ?>

                            <?php else: ?>
                            <span>NA</span>
                            <?php endif; ?>
                        </td>
                          <td> <?php if($category->usercount != null): ?>
                            <?php echo e($category->usercount); ?>

                            <?php else: ?>
                            <span>NA</span>
                            <?php endif; ?></td>

                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/admin/report/exam-report/show-question-bank.blade.php ENDPATH**/ ?>