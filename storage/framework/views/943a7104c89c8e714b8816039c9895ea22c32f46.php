 <?php $__env->startSection('content'); ?>
<div class="row">
    
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title text-uppercase">
            Series Management - Edit<a href="<?php echo e(route('series')); ?>" class="btn btn-secondary btn-rounded float-right"> <em class="icon ni ni-chevrons-left"></em> Back</a>
        </h3>
    </div>
</div>

<div class="card">
    <div class="card-inner">
        <form class="mb-5" action="<?php echo e(route('update_series',$datas->id)); ?>" method="POST" id="series-form" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <div class="">

                <div class="form-group row">
                    <label class="form-label col-md-3" for="name">Series Name<span  class="required text-danger">*</span></label>
                    <div class="col-md-9"><div class="form-control-wrap">
                        <input type="text" value="<?php echo e($datas->name); ?>" name="name" class="form-control" required oninvalid="this.setCustomValidity('Please Enter Series Name')" oninput="setCustomValidity('')" />
                        <?php if($errors->has('name')): ?>
                        <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                        <?php endif; ?>
                    </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="form-label col-md-3" for="image">Series Image <span class="required text-danger">*</span> </label>

                    <div class="col-md-9">
                        <div class="form-control-wrap">
                            <div class="input-group mb-3">
                                <div class="form-control-wrap">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="customFile" />
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    <?php if($errors->has('image')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('image')); ?></span>
                                    <?php endif; ?>
                                </div>
                                <input type="hidden" name="previousimage" value="<?php echo e($datas->image); ?>" />

                                <div class="input-group-append">
                                    <span class="p-0" id="basic-addon1">
                                    <img src="<?php echo e(asset($datas->image)); ?>" class="img-thumbnail ml-2" width="30" /></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="form-label col-md-3" for="description">Series Description<span  class="required text-danger">*</span></label>
                    <div class="col-md-9">
                        <div class="form-control-wrap">
                            <textarea name="description" value="" rows="5" cols="40" class="form-control tinymce-editor" placeholder="Enter Description For Series"><?php echo e($datas->description); ?></textarea>
                            <?php if($errors->has('description')): ?>
                            <span class="text-danger"><?php echo e($errors->first('description')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="form-label col-md-3" for="slug">Series Slug</label>
                    <div class="col-md-9">
                        <div class="form-control-wrap">
                            <input class="form-control " type="text" name="slug" value="<?php echo e($datas->slug); ?>" />
                            <?php if($errors->has('slug')): ?>
                            <span class="text-danger"><?php echo e($errors->first('slug')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <label  for="status" class="form-label col-md-3 ">Status</label>

                    <div class="col-md-9">
                        <div class="form-control-wrap">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input <?php echo e($errors->has('status')?'is-invalid':''); ?>" type="radio" id="Active" name="status" value="1" <?php echo e(($datas['status'] == "1" )? 'checked' : ""); ?>  />
                                <label class="custom-control-label" for="Active">Active</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input <?php echo e($errors->has('status')?'is-invalid':''); ?>" type="radio" id="InActive" name="status" value="0" <?php echo e(($datas['status'] == "0" )? 'checked' : ""); ?> />
                                <label class="custom-control-label" for="InActive">Inactive</label>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <label  for="status" class="form-label col-md-3 "><span>&nbsp;</span></label>
                    <div class="col-md-9">
                        <button type="submit" class="btn btn-lg btn-primary btn-xs ">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/admin/ias/series/edit.blade.php ENDPATH**/ ?>