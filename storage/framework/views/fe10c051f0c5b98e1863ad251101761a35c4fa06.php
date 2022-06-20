 <?php $__env->startSection('content'); ?>

<div class="row">
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title text-uppercase ">
            Batch Management - Add Batch<a href="<?php echo e(route('batch')); ?>" class="btn btn-secondary btn-rounded float-right"> <em class="icon ni ni-chevrons-left"></em> Back</a>
        </h3>
    </div>
</div>
<?php echo $__env->make('admin.layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="card">
    <div class="card-inner">

        <form class="mb-5" action="<?php echo e(route('store_batch')); ?>" method="POST" id="question-form" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>


            <div class="">

                <div class="form-group row">
                    <label class="form-label col-md-3" for="name">Batch Name<span  class="required text-danger">*</span></label>
                    <div class="col-md-9">
                        <div class="form-control-wrap">
                            <input type="text" name="name" class="form-control" placeholder="Enter Name" required oninvalid="this.setCustomValidity('Please Enter Batch Name')" oninput="setCustomValidity('')" />
                            <?php if($errors->has('name')): ?>
                            <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="form-label col-md-3" for="series">Select Series<span  class="required text-danger">*</span></label>
                    <div class="col-md-9">
                        <div class="form-control-wrap">
                            <select class="form-select" name="series_id" id="" data-search="on" >
                                <option value="">Select</option>
                                <?php $__currentLoopData = $series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($val->id); ?>"><?php echo e($val->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('series_id')): ?>
                            <span class="text-danger"><?php echo e($errors->first('series_id')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="form-label col-md-3" for="price">Price (Rs)<span  class="required text-danger">*</span></label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">₹</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Enter Price" id="discount" name="price" required oninvalid="this.setCustomValidity('Please Enter Price')" oninput="setCustomValidity('')" />

                        </div>
                        <?php if($errors->has('price')): ?>
                        <span class="text-danger"><?php echo e($errors->first('price')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="form-label col-md-3" for="discount">Discount (%)<span  class="required text-danger">*</span></label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Enter Discount" id="discount" name="discount" required oninvalid="this.setCustomValidity('Please Enter Discount')" oninput="setCustomValidity('')" />

                        </div>
                        <?php if($errors->has('discount')): ?>
                        <span class="text-danger"><?php echo e($errors->first('discount')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="form-label col-md-3" for="description">Batch Description<span  class="required text-danger">*</span></label>
                    <div class="col-md-9">
                        <div class="form-control-wrap">
                            <textarea name="description" class="tinymce-editor" id="description" placeholder="Enter Batch Description" class="form-control ckeditor" cols="30" rows="10"></textarea>
                            <?php if($errors->has('description')): ?>
                            <span class="text-danger"><?php echo e($errors->first('description')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>



                <div class="form-group row">
                    <label class="form-label col-md-3" for="slug">Starting Date</label>
                    <div class="col-md-9">
                        <div class="form-control-wrap">
                            <input type="text" name="start_date"  data-date-format="yyyy-mm-dd" class="form-control date-picker" placeholder="Enter Starting Date" />
                            <?php if($errors->has('start_date')): ?>
                            <span class="text-danger"><?php echo e($errors->first('start_date')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="form-label col-md-3" for="schedule">Upload Schedule<span  class="required text-danger">*</span></label>
                    <div class="col-md-9"><div class="form-control-wrap">
                        <input type="file" class="form-control" name="schedule" id="schedule" />
                        <?php if($errors->has('schedule')): ?>
                        <span class="text-danger"><?php echo e($errors->first('schedule')); ?></span>
                        <?php endif; ?>
                    </div>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="form-label col-md-3" for="slug">Slug</label>
                    <div class="col-md-9">
                        <div class="form-control-wrap">
                            <input type="text" name="slug" class="form-control" placeholder="Enter Slug" />
                            <?php if($errors->has('slug')): ?>
                            <span class="text-danger"><?php echo e($errors->first('slug')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <label  for="status" class="form-label col-md-3 ">Status</label>
                    <div class="col-md-9">
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input <?php echo e($errors->has('status')?'is-invalid':''); ?>" type="radio" id="Active" name="status" checked value="1" />
                            <label class="custom-control-label" for="Active">Active</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input <?php echo e($errors->has('status')?'is-invalid':''); ?>" type="radio" id="InActive" name="status" value="0" />
                            <label class="custom-control-label" for="InActive">Inactive</label>
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <label  for="status" class="form-label col-md-3 "></label>
                    <div class="col-md-9">

                        <button type="submit" class="btn btn-lg btn-primary btn-xs">Add</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/admin/ias/batch/create.blade.php ENDPATH**/ ?>