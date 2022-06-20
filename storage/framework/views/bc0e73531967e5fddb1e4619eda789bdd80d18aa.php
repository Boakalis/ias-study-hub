<?php if(Session::has('message')): ?>
    <div class="alert alert-<?php echo e(Session::get('message-type')); ?> alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <i class="glyphicon glyphicon-<?php echo e(Session::get('message-type') == 'success' ? 'ok' : 'remove'); ?>"></i> <?php echo e(Session::get('message')); ?>

    </div>
<?php endif; ?>

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
<?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/admin/layouts/error.blade.php ENDPATH**/ ?>