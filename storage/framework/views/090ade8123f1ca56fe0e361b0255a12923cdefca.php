 <?php $__env->startSection('content'); ?>

<div class="row">
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title text-uppercase ">
            Sub-Category Management <a href="#" data-toggle="modal" data-target="#createCategory" class="btn btn-success btn-rounded float-right"> <em class="icon ni ni-plus-circle"></em> Add New</a>
        </h3>
    </div>
</div>

<div class="table px-2">
   <?php echo $__env->make('admin.layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>


<div class="card card-preview">
    <div class="card-inner">
        <table class="table datatable-init table-bordered table-responsive-lg table-hover">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center" scope="col">No</th>
                    <th class="text-center" scope="col">Sub-Category</th>
                    <th class="text-center" scope="col">Category</th>
                    <th class="text-center" scope="col">Status</th>
                    <th class="text-center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id="sid<?php echo e($data->id); ?>">
                    <td class="text-center" scope="row"><?php echo e($key+1); ?></td>
                    <td class="text-center"><?php echo e($data->category); ?></td>
                    <td class="text-center"><?php echo e($data->subject['subject']); ?></td>

                    <td class="text-center">
                        <?php if( $data->status == 1 ): ?>
                        <span class="btn btn-xs btn-dim btn-outline-success">Active</span>
                        <?php else: ?>
                        <span class="btn btn-xs btn-dim btn-outline-danger">InActive</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-center" width="20%">
                            <a class="btn btn-icon btn-xs btn-secondary" href="javascript:void(0)" onclick="editCategory(<?php echo e($data->id); ?>)"  title="edit"><em class="icon ni ni-edit"></em></a>
                            <a href="#" class="btn btn-icon btn-xs btn-danger remove" onclick="deleteConfirmation(<?php echo e($data->id); ?>)" title="Delete"><em class="icon ni ni-trash"></em></a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>


<!-- Model For Creating Subject  -->
<div class="modal fade zoom"" id="createCategory" tabindex="-1" role="dialog" aria-labelledby="subCategoryModal" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form method="post" name="categoryStore" id="categoryStore">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold text-uppercase ">Add Sub-Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="alert alert-danger" style="display: none;"></div>
                    <div>
                        <label class="form-label" for="Subject"> Category<span  class="required text-danger">*</span></label>
                        <select class="form-select" data-search="on" name="subject_id" id="subject_id">
                            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($subject->id); ?>"><?php echo e($subject->subject); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <br />
                    <div class="md-form">
                        <label class="form-label" for="category"> Sub-Category<span  class="required text-danger">*</span></label>
                        <input name="category" class="form-control" type="text"  required oninvalid="this.setCustomValidity('Please Enter Sub-Category')" oninput="setCustomValidity('')"  />
                    </div>
                    <br />

                    <div class="md-form">
                        <label class="form-label" for="slug"> Slug<span  class="required text-danger">*</span></label>
                        <input name="slug" id="slug" class="form-control" type="text" />
                    </div>
                    <br />
                    <div>
                        <label class="form-label" for="status">Status<span  class="required text-danger">*</span></label><br />

                        <div class="custom-control custom-radio">
                            <input class="custom-control-input <?php echo e($errors->has('status')?'is-invalid':''); ?>" type="radio" id="Active" checked name="status" value="1" />
                            <label class="custom-control-label" for="Active">Active</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input <?php echo e($errors->has('status')?'is-invalid':''); ?>" type="radio" id="InActive" name="status" value="0" />
                            <label class="custom-control-label" for="InActive">Inactive</label>
                        </div>
                    </div>
                    <br />

                </div>
                <input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>" />

                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" id="ajaxSubmit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Model For Editing Subject -->
<div class="modal fade zoom" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="subCategoryModal" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form method="post" name="updateStore" id="updateStore">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold text-uppercase ">Edit Sub-Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <input type="hidden" name="id" id="id" />
                <div class="modal-body">
                    <div class="alert alert-danger" style="display: none;"></div>
                    <div>
                        <label class="form-label" data-error="wrong" data-success="right" for="Subject"> Category<span  class="required text-danger">*</span></label>
                        <select class="form-select" data-search="on" name="subject_id" id="subjectid1">
                            <option value="">Please Select</option>
                            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($subject->id); ?>"><?php echo e($subject->subject); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <br />
                    <div class="md-form">
                        <label class="form-label" data-error="wrong" data-success="right" for="subjectName">Sub-Category<span  class="required text-danger">*</span></label>
                        <input type="text" class="form-control" name="category" id="name1" required oninvalid="this.setCustomValidity('Please Enter Category')" oninput="setCustomValidity('')" />
                    </div>
                    <br />

                    <div class="md-form">
                        <label class="form-label" for="slug"> Slug</label>
                        <input name="slug" id="slug1" class="form-control" type="text" />
                    </div>
                    <br />
                    <label class="form-label" for="status">Status</label><br />

                    <div class="custom-control custom-radio">
                        <input class="custom-control-input <?php echo e($errors->has('status')?'is-invalid':''); ?>" type="radio" id="Active1" name="status" value="1" />
                        <label class="custom-control-label" for="Active1">Active</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input <?php echo e($errors->has('status')?'is-invalid':''); ?>" type="radio" id="InActive1" name="status" value="0" />
                        <label class="custom-control-label" for="InActive1">Inactive</label>
                    </div>
                    <br />

                </div>
                <input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>" />
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" id="Submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?> <?php $__env->startSection('javascript'); ?>

<script>
    // Script For Storing
    $("#categoryStore").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('store_question_bank_categories')); ?>",
            type: "post",
            data: $(this).serialize(),
            beforeSend: function () {
                // Show image container
                $("#loader").show();
            },

            success: function (response) {
                if (response.errors) {
                    $(".alert-danger").html("");

                    $.each(response.errors, function (key, value) {
                        $(".alert-danger").show();
                        $(".alert-danger").append("<li>" + value + "</li>");
                    });
                } else {
                    $(".alert-danger").hide();
                    $("#createCategory").modal("hide");
                    location.reload(true);

                }
            },
            complete: function (response) {
                $("#loader").hide();
            },
            error: function (error) {
                console.log(error);
                //   alert('data not saved')
            },
        });
    });
</script>

<!-- Script For Editing -->
<script>
    function editCategory(id) {
        $.get("/admin/question-bank-management/sub-category/edit/" + id, function (subject) {
            $("#id").val(subject.id);
            $("#subjectid1").val(subject.subject_id).change();
            $("#name1").val(subject.category);
            $("#slug1").val(subject.slug);



            if (subject.status == 0) $("#editCategory").find(":radio[name=status][value=0]").prop("checked", true);
            else $("#editCategory").find(":radio[name=status][value=1]").prop("checked", true);

            $("#editCategory").modal("toggle");
        });
    }
</script>

<!-- Script for updating -->
<script>
    $("#updateStore").submit(function (e) {
        e.preventDefault();
        let id = $("#id").val();
        $.ajax({
            url: "/admin/question-bank-management/sub-category/update/" + id,
            type: "post",
            data: $("#updateStore").serialize(),
            success: function (response) {
                if (response.errors) {
                    $(".alert-danger").html("");

                    $.each(response.errors, function (key, value) {
                        $(".alert-danger").show();
                        $(".alert-danger").append("<li>" + value + "</li>");
                    });
                } else {
                    $(".alert-danger").hide();
                    $("#editCategory").modal("hide");
                    location.reload(true);
                }
            },
            error: function (error) {
                console.log(error);
            },
        });
    });
</script>


<script type="text/javascript">
    function deleteConfirmation(id) {
    Swal.fire({
    title: "Delete?",
    text: "Please ensure and then confirm!",
    type: "warning",
    showCancelButton: !0,
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel!",
    reverseButtons: !0
    }).then(function (e) {
    if (e.value === true) {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
    type: 'POST',
    url: '/admin/question-bank-management/sub-category/destroy/' + id,
    data: {_token: CSRF_TOKEN},
    beforeSend: function () {
                // Show image container
                $("#loader").show();
            },
    success: function (results) {
     location.reload(true);

    },
    complete: function (response) {
                $("#loader").hide();
            },
    });
    } else {
    e.dismiss;
    }
    }, function (dismiss) {
    return false;
    })
    }
</script>

<script>
    //Script For Auto-Closing Alert
    $(".alert").delay(1500).fadeOut(300);
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/admin/questionbank/sub-category/index.blade.php ENDPATH**/ ?>