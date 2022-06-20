<?php $__env->startSection('content'); ?>
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
<div class="nk-block-head-content">
    <h3 class="nk-block-title page-title">Update Password</h3>
</div>
    </div></div>
<div class="container"pt-3>

    <?php if(Session::has('success_message')): ?>
    <div class="alert alert-success fade show" role="alert">
        <?php echo e(Session::get('success_message')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <?php endif; ?>

    <?php if(Session::has('error_message')): ?>
    <div class="alert alert-danger  fade show " role="alert">
        <?php echo e(Session::get('error_message')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <?php endif; ?>

<form action="<?php echo e(route('update_pwd')); ?>" method="post" name="updatePasswordForm" id="updatePasswordForm"><?php echo csrf_field(); ?>
    
    <div class="form-group">
      <label for="exampleInputPassword1">Current Password</label>
      <input type="password" id="current_pwd" name="current_pwd" class="form-control" required="" placeholder="Enter Old Password">
      <span id="chkCurrentPwd"></span>
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">New Password</label>
        <input type="password" id="new_pwd" name="new_pwd" class="form-control" required="" placeholder="Enter New Password">
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Confirm New Password</label>
        <input type="password" class="form-control" id="confirm_pwd" name="confirm_pwd" required="" placeholder="Confirm New Password">
      </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/admin/admin_changepassword.blade.php ENDPATH**/ ?>