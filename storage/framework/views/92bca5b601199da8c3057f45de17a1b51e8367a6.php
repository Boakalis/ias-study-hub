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
        <table class="table datatable-init table-bordered table-responsive-lg table-hover">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center" scope="col">No</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Banner Image</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id="sid<?php echo e($data->id); ?>">
                    <td class="text-center" scope="row"><?php echo e($key+1); ?></td>
                    <td class="text-center"><?php echo e($data->subject); ?></td>
                    <td class="text-center">
                        <?php if($data->price != null): ?>
                        <?php echo e($data->price); ?>

                        <?php else: ?>
                        NA
                        <?php endif; ?>
                        </td>
                        <td class="text-center"> <img  style="height: 50px; width:50px;" src="<?php echo e(asset($data->image)); ?>" alt=""> </td>

                    <td class="text-center">
                        <?php if( $data->status == 1 ): ?>
                        <span class="btn btn-xs btn-dim btn-outline-success">Active</span>
                        <?php else: ?>
                        <span class="btn btn-xs btn-dim btn-outline-danger">Inactive</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                            <a href="javascript:void(0)" onclick="editSubject(<?php echo e($data->id); ?>)"  title="Edit" class="btn btn-icon btn-xs btn-secondary"><em class="icon ni ni-edit"></em></a>
                            <a href="#" class="btn btn-icon btn-xs btn-danger remove" onclick="deleteConfirmation(<?php echo e($data->id); ?>)" title="Delete"><em class="icon ni ni-trash"></em></a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade zoom" id="createSubject" tabindex="-1" role="dialog" aria-labelledby="categoryModal" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold text-uppercase ">Add Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" name="subjectStore" id="subjectStore" enctype="multipart/form-data" >
                <div class="modal-body">
                    <div class="alert alert-danger" style="display: none;"></div>
                    <div class="md-form">
                        <label class="form-label" data-error="wrong" data-success="right" for="subjectName">Category<span  class="required text-danger">*</span></label>
                        <input type="text" class="form-control" name="subject" id="name" required oninvalid="this.setCustomValidity('Please Enter Category')" oninput="setCustomValidity('')" />
                    </div>
                    <br />
                    <div class="md-form">
                        <label class="form-label" data-error="wrong" data-success="right" for="price">Price (Rs)<span  class="required text-danger">*</span></label>
                        <input type="text" class="form-control" name="price" id="price" required oninvalid="this.setCustomValidity('Please Enter Price')" oninput="setCustomValidity('')" />
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="form-label" for="default-06">Select Banner Image<span  class="required text-danger">*</span></label>
                        <div class="form-control-wrap">
                            <div class="custom-file">
                                <input type="file" multiple="" name="image" class="custom-file-input" id="image" required oninvalid="this.setCustomValidity('Please Select Image')" oninput="setCustomValidity('')" >
                                <label class="custom-file-label" for="customFile">Choose image</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="md-form">
                        <label class="form-label" for="slug"> Slug<span  class="required text-danger">*</span></label>
                        <input name="slug" id="slug" class="form-control " type="text" />
                    </div>
                    <br />
                    <label class="form-label" for="status">Status</label><br />

                    <div class="custom-control custom-radio">
                        <input class="custom-control-input <?php echo e($errors->has('status')?'is-invalid':''); ?>" type="radio" name="status" value="1" checked id="status_active" />
                        <label class="custom-control-label" for="status_active">Active</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input <?php echo e($errors->has('status')?'is-invalid':''); ?>" type="radio" name="status" value="0" id="status_inactive" />
                        <label class="custom-control-label" for="status_inactive">Inactive</label>
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

 
<div class="modal fade" id="editSubject" tabindex="-1" role="dialog" aria-labelledby="categoryModal" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold text-uppercase ">Edit Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" name="updateStore" id="updateStore"  enctype="multipart/form-data"  >
                <input type="hidden" name="id" id="id" />
                <div class="modal-body">
                    <div class="alert alert-danger" style="display: none;"></div>
                    <div class="md-form">
                        <label class="form-label" data-error="wrong" data-success="right" for="subjectName">Category<span  class="required text-danger">*</span></label>
                        <input type="text" class="form-control" name="subject" id="name1" required oninvalid="this.setCustomValidity('Please Enter Category')" oninput="setCustomValidity('')" />
                    </div>
                    <br />

                    <div class="md-form">
                        <label class="form-label" data-error="wrong" data-success="right" for="amount">Price (Rs)<span  class="required text-danger">*</span></label>
                        <input type="text" class="form-control" name="price" id="price1" required oninvalid="this.setCustomValidity('Please Enter Price')" oninput="setCustomValidity('')" />
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="form-label" for="default-06">Select Banner Image</label>
                        <div class="form-control-wrap">
                            <div class="custom-file">
                                <input type="file" multiple="" name="image"   class="custom-file-input" >
                                <label class="custom-file-label" for="customFile">Choose image</label>
                                <img id="image1" src="" style="height: 50px;">

                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="md-form">
                        <label class="form-label" for="slug"> Slug</label>
                        <input name="slug" id="slug1" class="form-control col-md-5" type="text" />
                    </div>
                    <br />
                    <label class="form-label" for="status">Status<span  class="required text-danger">*</span></label><br />
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input <?php echo e($errors->has('status')?'is-invalid':''); ?>" type="radio" name="status" value="1" checked id="status_active1" />
                        <label class="custom-control-label" for="status_active1">Active</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input <?php echo e($errors->has('status')?'is-invalid':''); ?>" type="radio" name="status" value="0" id="status_inactive1" />
                        <label class="custom-control-label" for="status_inactive1">Inactive</label>
                    </div>

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
    //Script For Storing
    $("#subjectStore").on("submit", function (e) {
        e.preventDefault();
        var formData = new FormData($('#subjectStore')[0]);
        $.ajax({
            url: "/admin/question-bank-management/category/store",
            type: "post",
            data: formData,
            contentType: false,
            processData: false,
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
                    $("#createSubject").modal("hide");
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



<script>
    function editSubject(id) {
        $.get("/admin/question-bank-management/category/edit/" + id, function (subject) {

            $("#id").val(subject.id);
            $("#name1").val(subject.subject);
            $("#price1").val(subject.price);
            $("#image1").attr("src","/" + subject.image);
            $("#slug1").val(subject.slug);
            if (subject.status == 0) $("#editSubject").find(":radio[name=status][value=0]").prop("checked", true);
            else $("#editSubject").find(":radio[name=status][value=1]").prop("checked", true);

            $("#editSubject").modal("toggle");
        });
    }
</script>


<script>
    $("#updateStore").submit(function (e) {
        e.preventDefault();
        var formData = new FormData($('#updateStore')[0]);
        let id = $("#id").val();


        $.ajax({
            url: "/admin/question-bank-management/category/update/" + id,
            type: "post",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.errors) {
                    $(".alert-danger").html("");

                    $.each(response.errors, function (key, value) {
                        $(".alert-danger").show();
                        $(".alert-danger").append("<li>" + value + "</li>");
                    });
                } else {
                    $(".alert-danger").hide();
                    $("#editSubject").modal("hide");
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
    url: '/admin/question-bank-management/category/destroy/' + id,
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/admin/questionbank/subject/index.blade.php ENDPATH**/ ?>