 <?php $__env->startSection('content'); ?>
<div class="row">
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title">
            Exam Report
        </h3>
    </div>
</div>

<div class="table px-2">
    <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if(Session::has('alert-' . $msg)): ?>
    <div class="alert alert-success alert-dismissible fade show alert-<?php echo e($msg); ?>" role="alert">
        <strong></strong><?php echo e(Session::get('alert-' . $msg)); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php if(Session::has('error_message')): ?>
    <div class="alert alert-danger fade show" role="alert">
        <?php echo e(Session::get('error_message')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
</div>

<div class="card card-preview">
    <div class="card-inner">
        <table class="table datatable-init table-bordered table-responsive-lg table-hover">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center" scope="col">No</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $course_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $course_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id="sid<?php echo e($course_list->id); ?>">
                    <td class="text-center" scope="row"><?php echo e($key+1); ?></td>
                    <td class="text-center"><?php echo e($course_list->name); ?></td>

                    <td class="text-center">
                        <a href="<?php echo e(route('show-course-report',$course_list->id)); ?>" class="btn btn-icon btn-xs btn-secondary"><em class="icon ni ni-eye "></em>View Report</a>
                    </td>
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/admin/report/exam-report/index.blade.php ENDPATH**/ ?>