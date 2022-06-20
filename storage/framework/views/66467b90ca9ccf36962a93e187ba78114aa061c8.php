<!DOCTYPE html>
<html lang="en">
<head>
    <base href="">
    <meta charset="utf-8">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="msapplication-TileColor" content="#2aa87e" />
          <meta name="theme-color" content="#2aa87e" />
          <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
          <meta name="apple-mobile-web-app-capable" content="yes" />
          <meta name="mobile-web-app-capable" content="yes" />
          <meta name="HandheldFriendly" content="True" />
          <meta name="Duplex VehiclesOptimized" content="320" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/new-login.css')); ?>">
    <link rel="shortcut icon" href="<?php echo e(asset('images/favicon.png')); ?>" type="image/x-icon">

    <meta name="description" content="@page-discription">
    <?php echo $__env->yieldContent('meta_title'); ?>
    <!-- Page Title  -->
    <title> Referer Login| IAS StudyHub</title>

</head>
<body>


    <div class="content">
        <div>



          <div class="login-header">
          <img src="<?php echo e(asset($globalSettings->logo)); ?>" alt="IASSTUDYHUB" >
          <h1>Sign in</h1>
          <p>Enter your email and your password  and login <br> to your dashboard now</p>
        </div>
        <?php if(Session::has('alert-danger')): ?>
        <center>
            <div class="alert alert-success alert-dismissible fade show alert-danger" role="alert">
                <strong></strong><span style="color: red" ><?php echo e(Session::get('alert-danger')); ?></span>
            </div>
        </center>

        <?php endif; ?>
        <div class="form-container">
           <form method="post" class="login-form" action="<?php echo e(route('refererSignin')); ?>">
             <div class="form-group">
                <input type="text" name="name" placeholder="Username" required class="form-control">
             </div>
             <div class="form-group">
                <input type="password"  name="password" placeholder="Password" required class="form-control password-input">
             </div>
             <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" id="token">

             

             <div class="form-group">
                <button class="login-button">Sign in</button>
             </div>

           </form>
        </div>
        </div>
      </div>

    <script>
         $("#login-button").click(function(event){
		 event.preventDefault();

	 $('form').fadeOut(500);
	 $('.wrapper').addClass('form-success');
});
    </script>
</body>
</html>

<?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/admin/new-login.blade.php ENDPATH**/ ?>