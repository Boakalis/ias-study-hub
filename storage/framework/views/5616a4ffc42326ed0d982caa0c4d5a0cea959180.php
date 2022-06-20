<?php $__env->startSection('content'); ?>

<div class="row">
    <?php echo $__env->make('website.Layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title text-uppercase ">
            FAQ <button type="button" class="r-btnAdd btn btn-primary float-right">Add +</button>
        </h3>
    </div>
</div>
<div class="table">
    <?php echo $__env->make('admin.layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<div class="card card-preview">
    <div class="card-inner">
        <div class="card-body">


            <form class="mb-5" action="<?php echo e(route('faq.update')); ?>" method="POST" id="question-form" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="id" value="<?php echo e(@$datas->id); ?>">
                <div class="pb-4">
                    <?php if(!$faqs->isEmpty()): ?>
                    <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="r-group" style="margin-top:10px">

                        <div class="form-group row">
                            <label class="form-label col-md-3" for="file">Category</label>
                            <div class="col-md-9">
                           <select class="form-control" name="category_id[]">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>" <?php echo e(($category->id  == $faq->category_id)?'selected':''); ?>><?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="form-label col-md-3" for="file">Question</label>
                            <div class="col-md-9">
                            <textarea class="form-control tinymce-editor" name="question[]"><?php echo e($faq->question); ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="form-label col-md-3" for="file">Answer</label>
                            <div class="col-md-9">
                            <textarea class="form-control tinymce-editor" name="answer[]"><?php echo e($faq->answer); ?></textarea>
                            </div>
                        </div>

                        <button type="button" class="r-btnRemove btn btn-danger">Remove</button>

                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <div class="r-group" style="margin-top:10px">

                        <div class="form-group row">
                            <label class="form-label col-md-3" for="file">Category</label>
                            <div class="col-md-9">
                           <select class="form-control" name="category_id[]">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="form-label col-md-3" for="file">Question</label>
                            <div class="col-md-9">
                            <textarea class="form-control tinymce-editor" name="question[]"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="form-label col-md-3" for="file">Answer</label>
                            <div class="col-md-9">
                            <textarea class="form-control tinymce-editor" name="answer[]"></textarea>
                            </div>
                        </div>
                        <button type="button" class="r-btnRemove btn btn-danger">Remove</button>
                    </div>
                    <?php endif; ?>
                    <div id="append-fields">

                    </div>
                    <div class="form-group row">
                        <label class="form-label col-md-3">&nbsp;</label>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">

    $(document).ready(function() {


        $(".r-btnAdd").click(function(){
            var html = '<div class="r-group" style="margin-top:10px">'+

                        '<div class="form-group row">'+
                            '<label class="form-label col-md-3" for="file">Category</label>'+
                            '<div class="col-md-9">'+
                           '<select class="form-control" name="category_id[]">'+
                                '<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>'+
                                    '<option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>'+
                                '<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>'+
                           '</select>'+
                            '</div>'+
                        '</div>'+

                        '<div class="form-group row">'+
                            '<label class="form-label col-md-3" for="file">Question</label>'+
                            '<div class="col-md-9">'+
                            '<textarea class="form-control tinymce-editor" name="question[]"></textarea>'+
                            '</div>'+
                        '</div>'+

                        '<div class="form-group row">'+
                            '<label class="form-label col-md-3" for="file">Answer</label>'+
                            '<div class="col-md-9">'+
                            '<textarea class="form-control tinymce-editor" name="answer[]"></textarea>'+
                            '</div>'+
                        '</div>'+
                        '<button type="button" class="r-btnRemove btn btn-danger">Remove</button>'+
                    '</div>';
            $("#append-fields").append(html);
            tinymce.init(editor_config);
        });


        $("body").on("click",".r-btnRemove ",function(){
            $(this).parents(".r-group").remove();
        });

    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/admin/faq.blade.php ENDPATH**/ ?>