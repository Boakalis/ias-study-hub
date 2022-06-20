<?php $__env->startSection('meta_title'); ?>
 <!-- Fav Icon  -->
 <link rel="shortcut icon" href="<?php echo e(asset('images/favicon.png')); ?>">
 <!-- Page Title  -->
 <title>Reset Passcode | IAS STUDYHUB</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h5 class="nk-block-title">Reset password</h5>
                <div class="nk-block-des">
                    <p>If you forgot your password, well, then we’ll email you instructions to reset your password.</p>
                </div>
            </div>
        </div>
                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(route('password.email')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="default-01">Email</label>
                                <a class="link link-primary link-sm" href="#">Need Help?</a>
                            </div>
                                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        </div>

                        <div class="form-group">
                                <button type="submit" class="tn btn-lg btn-primary btn-block">
                                    Send Reset Link
                                </button>
                        </div>
                        <div class="form-note-s2 pt-5">
                            <a href="/"><strong>Return to login</strong></a>
                        </div>
                    </form>
                </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.Layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>