<?php $__env->startSection('content'); ?>
<div class="page-title-content text-center bg-default-3">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-7">
          <h2 class="page-title-content__heading">FAQs</h2>
          
        </div>
      </div>
    </div>
    <div class="shape">
      <img class="w-100" src="<?php echo e(asset('website/image/png/inner-banner-shape.png')); ?>" alt="">
    </div>
  </div>
<div class="faqs-area faqs-area--inner bg-default pt-5 mt-5">
    <div class="container">
      
      <div class="faq-body bg-default">
        <div class="row justify-content-center">
          <div class="col-xl-10">
            <div class="row justify-content-center justify-md-content-start">
              <div class="col-xl-3 col-lg-4 col-md-5 col-xs-8 mb-6 mb-lg-0">
                <div class="faq-tabs">
                  <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a class="nav-link show-faq" data-category="<?php echo e($category->id); ?>" data-category-name="<?php echo e($category->name); ?>" id="v-pills-<?php echo e($category->name); ?>-tab" data-bs-toggle="pill" href="#v-pills-<?php echo e($category->name); ?>" role="tab" aria-controls="v-pills-<?php echo e($category->name); ?>" aria-selected="true"><?php echo e($category->name); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>
              </div>
              <div class="col-xl-9 col-lg-8 col-md-11">
                <div class="tab-content" id="v-pills-tabContent">

                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="tab-pane fade " id="v-pills-<?php echo e($category->name); ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo e($category->name); ?>">

                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ .Testimonial Area -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script>

    $(function(){
        $('.show-faq:first-child').trigger('click');
    })
    $('.show-faq').on('click',function(){
        var category = $(this).data('category');
        var category_name =  $(this).data('category-name');

        if(category != undefined && category != null){
            $.ajax({
                method:"GET",
                url:"<?php echo e(route('getCategoryFaq')); ?>",
                data:{"_token":"<?php echo e(csrf_token()); ?>",'category':category},
                success:(function(response){
                    $('#v-pills-'+category_name).html(response.html);
                    $('.tab-pane').removeClass('show active');
                    $('#v-pills-'+category_name).addClass('show active');
                })
            })
        }
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.website-layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/website/faq.blade.php ENDPATH**/ ?>