 <?php $__env->startSection('content'); ?>
<div class="row">
    
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title text-uppercase ">
            Category Management <a href="#" data-toggle="modal" data-target="#createSubject" class="btn btn-success btn-rounded float-right"> <em class="icon ni ni-plus-circle"></em> Add New</a>
        </h3>
    </div>
</div>
 <?php echo $__env->make('admin.layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="card card-preview">
    <div class="card-inner">
        <table class="datatable-init table table table-md">
            <thead class="bg-secondary text-white">
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Name</th>
                    <th scope="col" class="text-center">Status</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id="sid<?php echo e($data->id); ?>">
                    <td><?php echo e($key+1); ?></td>
                    <td><?php echo e(Str::ucfirst($data->name)); ?></td>
                    <td class="text-center">
                        <?php if($data->status==1): ?>
                        <span class="btn btn-xs btn-dim btn-outline-success">Active</span>

                        <?php else: ?>
                        <span class="btn btn-xs btn-dim btn-outline-danger">Inactive</span>
                        <?php endif; ?>
                    </td>

                    <td class="text-center">
                        <a href="javascript:void(0)" onclick="editSubject(<?php echo e($data->id); ?>)" title="edit" class="btn btn-icon btn-xs btn-secondary"><em class="icon ni ni-edit"></em></a>
                        <a href="#" class="btn btn-icon btn-xs btn-danger remove" onclick="deleteConfirmation(<?php echo e($data->id); ?>)" title="Delete"><em class="icon ni ni-trash"></em></a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <br>
    <div style="float:left;">
        <?php echo e(($datas ->currentpage()-1) * $datas ->perpage() +count ($datas)); ?> of <?php echo e($datas->total()); ?> entries
        </div>
        <div style="float:right;">
        <?php echo e($datas->appends(request()->input())->links()); ?>

        </div>
</div>

<!-- Model For Creating Subject  -->
<div class="modal fade zoom" id="createSubject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form method="post" name="subjectStore" id="subjectStore">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Add Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="alert alert-danger" style="display: none;"></div>
                    <div class="md-form">
                        <label data-error="wrong" data-success="right" for="subjectName">Category<span  class="required text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="name" required oninvalid="this.setCustomValidity('Please Enter Category')" oninput="setCustomValidity('')" />
                    </div>
                    <br />

                    <label for="status" class="d-block">Status</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input <?php echo e($errors->has('status')?'is-invalid':''); ?>" type="radio" id="Active" name="status" checked value="1" />
                        <label class="custom-control-label" for="Active">Active</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input <?php echo e($errors->has('status')?'is-invalid':''); ?>" type="radio" id="InActive" name="status" value="0" />
                        <label class="custom-control-label" for="InActive">Inactive</label>
                    </div>
                </div>
                <input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>" />

                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" id="ajaxSubmit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Model For Editing Subject  -->
<div class="modal fade zoom" id="editSubject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form method="post" name="updateStore" id="updateStore">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Edit Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <input type="hidden" name="id" id="id" />
                <div class="modal-body">
                    <div class="alert alert-danger" style="display: none;"></div>
                    <div class="md-form">
                        <label data-error="wrong" data-success="right" for="subjectName">Category<span  class="required text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="name1" required oninvalid="this.setCustomValidity('Please Enter Category')" oninput="setCustomValidity('')" />
                    </div>
                    <br />
                    <label for="status" class="d-block">Status</label>

                    <div class="custom-control custom-radio">
                        <input class="custom-control-input <?php echo e($errors->has('status')?'is-invalid':''); ?>" type="radio" id="Active1" name="status" value="1" />
                        <label class="custom-control-label" for="Active1">Active</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input <?php echo e($errors->has('status')?'is-invalid':''); ?>" type="radio" id="InActive1" name="status" value="0" />
                        <label class="custom-control-label" for="InActive1">Inactive</label>
                    </div>
                </div>
                <input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>" />
                <div class="modal-footer justify-content-center">
                    <button type="submit" id="Submit" class="btn btn-primary center">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?> <?php $__env->startSection('javascript'); ?> 
<script>
    $("#subjectStore").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('store_subject')); ?>",
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
                    setTimeout(function(){
                          $(".alert-danger").hide();
                    }, 3000);
                } else {
                    $(".alert-danger").hide();
                    $("#createSubject").modal("hide");
                    location.reload(true);
                }
            },
            complete: function (response) {
                $("#loader").hide();
            },
            error: function (error) {
                console.log(error);
            },
        });
    });
</script>

<!-- Script For Editing -->
<script>
    function editSubject(id) {
        $.get("/admin/question-management/categories/edit/" + id, function (subject) {
            $("#id").val(subject.id);
            $("#name1").val(subject.name);
            if (subject.status == 0) $("#editSubject").find(":radio[name=status][value=0]").prop("checked", true);
            else $("#editSubject").find(":radio[name=status][value=1]").prop("checked", true);

            $("#editSubject").modal("toggle");
        });
    }
</script>

<!-- Script for updating -->
<script>
    $("#updateStore").submit(function (e) {
        e.preventDefault();
        let id = $("#id").val();
        $.ajax({
            url: "/admin/question-management/categories/update/" + id,
            type: "post",
            data: $("#updateStore").serialize(),
            beforeSend: function () {
                // Show image container
                $("#loader").show();
            },
            success: function (response) {
                //console.log(response);
                if (response.errors) {
                    $(".alert-danger").html("");

                    $.each(response.errors, function (key, value) {
                        $(".alert-danger").show();
                        $(".alert-danger").append("<li>" + value + "</li>");
                    });

                     setTimeout(function(){
                          $(".alert-danger").hide();
                    }, 3000);

                } else {
                    $(".alert-danger").hide();
                    $("#editSubject").modal("hide");
                    location.reload(true);
                }
            },
            complete: function (response) {
                $("#loader").hide();
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
    url: '/admin/question-management/categories/delete/' + id,
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
    $(".alert").delay(2000).fadeOut(300);
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/admin/subject/index.blade.php ENDPATH**/ ?>