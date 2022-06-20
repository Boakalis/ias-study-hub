<?php if(!$faqs->isEmpty()): ?>
<div class="accordion accordion--inner" id="accordionExample2">
    <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingFive">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo e($key); ?>" aria-expanded="true" aria-controls="collapse<?php echo e($key); ?>">
            <?php echo e($faq->question); ?>

        </button>
        </h2>
        <div id="collapse<?php echo e($key); ?>" class="accordion-collapse collapse <?php echo e(($key ==0)?'show':''); ?>" aria-labelledby="headingFive" data-bs-parent="#accordionExample2">
        <div class="accordion-body">
            <?php echo e($faq->answer); ?>

        </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php else: ?>
    <h3 class="text-center"> No FAQ Found(S) </h3>
<?php endif; ?>
<?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/website/faq-render.blade.php ENDPATH**/ ?>