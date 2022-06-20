<?php $__env->startSection('content'); ?>
<div class="page-title-content text-center bg-default-3">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-7">
          <h2 class="page-title-content__heading"><?php echo e(ucwords($page->title)); ?></h2>
          
        </div>
      </div>
    </div>
    <div class="shape">
      <img class="w-100" src="<?php echo e(asset('website/image/png/inner-banner-shape.png')); ?>" alt="">
    </div>
  </div>
<div class="terms-area bg-default-7">
    <div class="container">
      
      <div class="row justify-content-center">
        <div class="col-xxl-12 col-xl-12 col-lg-12">
          <div class="terms-content">
            <p class="terms-content__text">
                <?php echo $page->page_content; ?>

            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.website-layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/website/page.blade.php ENDPATH**/ ?>