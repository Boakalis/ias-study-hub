 <?php $__env->startSection('content'); ?>

<div class="row">
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title text-uppercase ">
            Series Management <a href="<?php echo e(route('series')); ?>" class="btn btn-secondary btn-rounded float-right"> <em class="icon ni ni-chevrons-left"></em> Back</a>
        </h3>
    </div>
</div>

<div class="card">
    <div class="card-inner">
        <div class="card-head justify-content-center pb-1">
            <h5 class="justify-content-center text-uppercase ">Series Detailed view</h5>
        </div>

        <div class="form-group">
            <label class="form-label" for="name">Series Name </label>
            <input class="form-control" id="disabledInput" type="text" placeholder="" value="<?php echo e($datas->name); ?>" disabled />
        </div>
        <div class="form-group">
            <label class="form-label" for="description">Series Description </label>
            <textarea readonly name="description" value="" rows="5" cols="40" id="description" class="form-control "  placeholder="Enter Description For Series"  ><?php echo $datas->description; ?></textarea>
        </div>

        <div class="form-group">
            <label class="form-label" for="image">Series Image</label>
            <div>
                <img style="width: 20%; height: auto;" src="<?php echo e(url('/images/admin_images/series_images/'.$datas->image)); ?>" alt="series_images" />
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/admin/ias/series/show.blade.php ENDPATH**/ ?>