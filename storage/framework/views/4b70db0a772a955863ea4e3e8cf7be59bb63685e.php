 <?php $__env->startSection('content'); ?>
<div class="row">
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title">
            Test Cloning - Add/Edit Details<a href="<?php echo e(route('test')); ?>"
                class="btn btn-secondary btn-rounded float-right"> <em class="icon ni ni-chevrons-left"></em> Back</a>
        </h3>
    </div>
</div>
<?php echo $__env->make('admin.layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="card">
    <div class="card-inner">

        <form class="mb-5" action="<?php echo e(route('clone_test',$datas->id)); ?>" method="POST" id="test-form"
            enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <div class="">

                <div class="form-group row">
                    <label class="form-label col-md-3" for="name">Test Name<span
                            class=" text-danger">*</span></label>
                    <div class="col-md-9">
                        <div class="form-control-wrap">
                            <input type="text" name="name" class="form-control  " required  />
                            <?php if($errors->has('name')): ?>
                            <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="form-label col-md-3" for="batch">Select Batch<span
                            class="required text-danger">*</span></label>
                    <div class="col-md-9">
                        <div class="form-control-wrap">
                            <select class="form-select col-md-11 " data-search="on" name="batch_id" id="batch">
                                <?php $__currentLoopData = $batch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <option value="<?php echo e($value['id']); ?>"
                                    <?php echo e($datas->batch['id'] == $value['id'] ? 'selected' : ''); ?>>
                                    <?php echo e($value->series->name); ?>--<?php echo e($value['name']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('batch_id')): ?>
                            <span class="text-danger"><?php echo e($errors->first('batch_id')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="form-label col-md-3" for="duration">Test Duration (in minutes)<span
                            class="required text-danger">*</span></label>
                    <div class="col-md-9">
                        <div class="form-control-wrap">
                            <input type="text" value="<?php echo e($datas['duration']); ?>" name="duration" class="form-control"
                                id="">
                            <?php if($errors->has('duration')): ?>
                            <span class="text-danger"><?php echo e($errors->first('duration')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="form-label col-md-3" for="mark">Mark<span
                            class="required text-danger">*</span></label>
                    <div class="col-md-9">
                        <div class="form-control-wrap">
                            <input type="text" name="mark" class="form-control" value="<?php echo e($datas['mark']); ?>">
                            <?php if($errors->has('mark')): ?>
                            <span class="text-danger"><?php echo e($errors->first('mark')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="form-label col-md-3" for="negativemark">Negative mark<span
                            class="required text-danger">*</span></label>
                    <div class="col-md-9">
                        <input type="text" value="<?php echo e($datas['negativemark']); ?>"
                        class="form-control" name="negativemark">
                        <?php if($errors->has('negativemark')): ?>
                        <span
                        class="text-danger"><?php echo e($errors->first('negativemark')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>



                <div class="form-group row">
                    <label class="form-label col-md-3" for="type">Select Type<span
                            class="required text-danger">*</span></label>
                    <div class="col-md-9">
                        <div class="form-control-wrap">
                            <select class="form-select" data-search="on" name="type"
                                                            id="type">
                                                                <option value="0"
                                                                <?php echo e($datas['type'] == 0 ? 'selected' : ''); ?>>Free</option>
                                                                <option value="1"
                                                                <?php echo e($datas['type'] == 1 ? 'selected' : ''); ?>>Paid</option>
                                                            </select>
                            <?php if($errors->has('type')): ?>
                            <span class="text-danger"><?php echo e($errors->first('type')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="form-label col-md-3" for="startdate">Start Date<span  class="required text-danger">*</span></label>
                    <div class="col-md-9">
                        <input type="text" name="start_date"  data-date-format="yyyy-mm-dd" class="form-control date-picker" placeholder="Enter Starting Date" />
                        <?php if($errors->has('start_date')): ?>
                        <span class="text-danger"><?php echo e($errors->first('start_date')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="form-label col-md-3" for="slug">Slug </label>
                    <div class="col-md-9">
                        <div class="form-control-wrap">
                            <input type="text" name="slug" class="form-control" />
                            <?php if($errors->has('slug')): ?>
                            <span class="text-danger"><?php echo e($errors->first('slug')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="status" class=" form-label col-md-3">Status</label>
                    <div class="col-md-9">
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input <?php echo e($errors->has('status')?'is-invalid':''); ?>"
                                type="radio" id="Active" name="status" checked value="1" />
                            <label class="custom-control-label" for="Active">Active</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input <?php echo e($errors->has('status')?'is-invalid':''); ?>"
                                type="radio" id="InActive" name="status" value="0" />
                            <label class="custom-control-label" for="InActive">Inactive</label>
                        </div>
                    </div>

                </div>


                <div class="form-group row">
                    <label for="status" class=" form-label col-md-3"></label>
                    <div class="col-md-9">
                        <button type="submit" class="btn btn-lg btn-primary btn-xs">Add</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/admin/ias/test/add.blade.php ENDPATH**/ ?>