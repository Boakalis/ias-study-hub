    <div class="form-group"  >
        <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="custom-control mt-2 mb-2 custom-control-lg custom-checkbox">
            <input type="checkbox" name="ids[]" class="custom-control-input chk " id="subject<?php echo e(@$data->slug); ?>" value="<?php echo e(\Crypt::encrypt($data->id)); ?>" id="
            ids"  data-price="<?php echo e($data->price); ?>" >
            <label class="custom-control-label" for="subject<?php echo e(@$data->slug); ?>"><?php echo e(@$data->subject); ?>&nbsp;(Rs.<?php echo e(@$data->price); ?>/-) </label>
        </div><br>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
<?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/website/question-bank/course-list.blade.php ENDPATH**/ ?>