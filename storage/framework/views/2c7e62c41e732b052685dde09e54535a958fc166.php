 <?php $__env->startSection('content'); ?>

<div class="row">
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title text-uppercase">
            Test Management <a href="#" class="btn btn-success btn-rounded float-right" data-toggle="modal" data-target="#createTest"> <em class="icon ni ni-plus-circle"></em> Add New</a>
        </h3>
    </div>
</div>


<?php echo $__env->make('admin.layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<span class=" alert-success   " role="alert" style="display: none" id="position_alert" > Position Updated Successfully</span><br>

<div class="card card-preview">
    <div class="card-inner">
        <form action="<?php echo e(route('qb_filter')); ?>" method="post" >
            <?php echo csrf_field(); ?>
            <div class="container bg-light pt-3 pb-3"  >
                <div class="row">
                    <div class="col-lg-4">
                        <select name="category" id="category_data" class="form-control form-select" data-search="on"  >
                           <?php if(isset($categoryDatas) && !empty($categoryDatas)): ?>
                           <option class="text-center" value="0"  >All</option>
                           <?php $__currentLoopData = $categoryDatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($categoryData->id); ?>"><?php echo e($categoryData->subject); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <?php endif; ?>
                        </select>

                    </div>
                    <div class="col-lg-4">
                        <select name="subcategory_data" id="subcategory_data" class="form-control form-select" >
                            <option value=""></option>
                        </select>

                    </div>
                    <div class="col-lg-4">
                        <button type="submit" class="btn btn-info">Filter</button>
                        <a href="<?php echo e(route('previous_year_test')); ?>" class="btn btn-warning">Reset</a>
                    </div>
                </div>
            </div>
        </form><br>
        <table class="table datatable-init">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center" scope="col">No</th>
                    <th class="text-center" scope="col">Test Name</th>
                    <th class="text-center" scope="col">Category</th>
                    <th class="text-center" scope="col">Sub-Category</th>
                    
                    <th class="text-center" scope="col">Type</th>
                    <th class="text-center" scope="col">Status</th>
                    <th class="text-center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="tablecontents">
                <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="row1" data-id="<?php echo e($data->id); ?>"  >
                    <td class="text-center sort-class " scope="row"><?php echo e($key+1); ?></td>
                    <td class="text-center sort-class "><?php echo e($data->name); ?></td>
                    <td class="text-center sort-class "><?php echo e($data->subject->subject); ?></td>
                    <td class="text-center sort-class "><?php echo e($data->category->category); ?></td>
                    
                    <?php if($data->type==0): ?>
                    <td class="text-center sort-class "><span class="btn btn-xs btn-dim btn-outline-primary">Free</span></td>
                    <?php else: ?>
                    <td class="text-center sort-class "><span class="btn btn-xs btn-dim btn-outline-success">Paid</span></td>
                    <?php endif; ?>
                    <td class="text-center sort-class ">
                        <?php if( $data->status == 1 ): ?>
                        <span class="btn btn-xs btn-dim btn-outline-success">Active</span>

                        <?php else: ?>
                        <span class="btn btn-xs btn-dim btn-outline-danger">Inactive</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-center sort-class " width="20%">
                        <a title="copy" onclick="addId(<?php echo e($data->id); ?>)"  class="btn btn-icon btn-xs btn-success" data-toggle="modal" data-target="#cloneTest"><em class="icon ni ni-copy-fill"></em></a>
                        <a title="add" class="btn btn-icon btn-xs btn-success" href="<?php echo e(route('edit_question_bank_question',['id' =>$data->id, 'tab' => 2])); ?>"><em class="icon ni ni-plus"></em></a>
                        <a title="edit" class="btn btn-icon btn-xs btn-secondary" href="<?php echo e(route('edit_question_bank_question',['id' =>$data->id, 'tab' => 1])); ?>"><em class="icon ni ni-edit"></em></a>
                        <a href="#" class="btn btn-icon btn-xs btn-danger remove" onclick="deleteConfirmation(<?php echo e($data->id); ?>)" title="Delete"><em class="icon ni ni-trash"></em></a>

                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <br>
        <div style="float:left;">
            <?php echo e(($datas ->currentpage()-1) * $datas ->perpage() +count ($datas)); ?> of <?php echo e($datas->total()); ?> entries
            </div>
            <div style="float:right;">
            <?php echo e($datas->appends(request()->input())->links()); ?>

            </div>

    </div>
</div>



<div class="modal fade zoom" id="createTest" tabindex="-1" role="dialog" aria-labelledby="testModal" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold text-uppercase ">Add Test</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="post" name="testStore" id="testStore">
                    <div class="alert alert-danger" style="display: none;"></div>

                    <div class="md-form">
                        <label class="form-label" for="name"> Test Name<span  class="required text-danger">*</span></label>
                        <input name="name" id="test" class="form-control" type="text" required oninvalid="this.setCustomValidity('Please Enter Name')" oninput="setCustomValidity('')"/>
                    </div>
                    <br>
                    <div class="md-form">
                        <label class="form-label" for="subject"> Category<span  class="required text-danger">*</span></label>
                        <select class="form-select" data-search="on" name="subject_id" id="category">
                            <option value="">Please Select</option>
                            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($subject->id); ?>"><?php echo e($subject->subject); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <br />
                        <br />
                        <label class="form-label" for="subject">Sub-Category<span  class="required text-danger">*</span></label>
                        <select class="form-select" data-search="on" name="category_id" id="subcategory">
                            <option value=""> </option>
                        </select>
                        <br />
                    </div>
                    <br />
                    <div class="md-form">
                        <label class="form-label" for="duration"> Duration<span  class="required text-danger">*</span></label>
                        <input name="duration" id="duration" class="form-control" type="text" required oninvalid="this.setCustomValidity('Please Enter Duration')" oninput="setCustomValidity('')" />
                    </div>
                    <br>
                    <div class="md-form">
                        <label class="form-label" for="type">Type</label>
                        <select class="form-select" data-search="on" name="type" id="type">
                            <option value="1">Paid</option>
                            <option value="0">Free</option>
                        </select>
                    </div><br>

                    <div class="md-form">
                        <label class="form-label" for="mark"> Mark<span  class="required text-danger">*</span></label>
                        <input name="mark" id="mark1" class="form-control" type="text" required oninvalid="this.setCustomValidity('Please Enter Mark')" oninput="setCustomValidity('')" />
                    </div>
                    <br>

                    <div class="md-form">
                        <label class="form-label" for="negativemark"> Negativemark<span  class="required text-danger">*</span></label>
                        <input name="negativemark" id="negativemark1" class="form-control" type="text" required oninvalid="this.setCustomValidity('Please Enter Negativemark')" oninput="setCustomValidity('')" />
                    </div>
                    <br>

                    <div class="md-form">
                        <label class="form-label" for="slug"> Slug<span  class="required text-danger">*</span></label>
                        <input name="slug" id="slug1" class="form-control" type="text" />
                    </div>
                    <br>

                    <label for="status" class="d-block">Status</label>

                    <div class="custom-control custom-radio">
                        <input class="custom-control-input <?php echo e($errors->has('status')?'is-invalid':''); ?>" type="radio" id="Active" name="status" checked value="1" />
                        <label class="custom-control-label" for="Active">Active</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input <?php echo e($errors->has('status')?'is-invalid':''); ?>" type="radio" id="InActive" name="status" value="0" />
                        <label class="custom-control-label" for="InActive">Inactive</label>
                    </div>
                    <br />

                    <br />



                    <input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>" />

                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" id="ajaxSubmit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<div class="modal fade zoom" id="cloneTest" tabindex="-1" role="dialog" aria-labelledby="testModal" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold text-uppercase ">Clone Test</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="post" name="testClone" id="testClone">
                    <div class="alert alert-danger" style="display: none;"></div>

                    <div class="md-form">
                        <label class="form-label" for="name"> Test Name<span  class="required text-danger">*</span></label>
                        <input name="name" id="test" class="form-control" type="text" />
                    </div>
                    <br>
                    

                    
                    

                    

                    

                    

                    <div class="md-form">
                        <label class="form-label" for="slug1"> Slug<span  class="required text-danger">*</span></label>
                        <input name="slug" id="slug1" class="form-control" type="text" />
                    </div>
                    <br>

                    <label for="status" class="d-block">Status</label>

                    <div class="custom-control custom-radio">
                        <input class="custom-control-input <?php echo e($errors->has('status')?'is-invalid':''); ?>" type="radio" id="Active1" name="status" checked value="1" />
                        <label class="custom-control-label" for="Active1">Active</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input <?php echo e($errors->has('status')?'is-invalid':''); ?>" type="radio" id="InActive1" name="status" value="0" />
                        <label class="custom-control-label" for="InActive1">Inactive</label>
                    </div>
                    <br />

                    <br />



                    <input type="hidden" name="_token" id="token1" value="<?php echo e(csrf_token()); ?>" />
                    <input type="hidden" name="id" id="id" value="" />

                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" id="cloneSubmit" class="btn btn-primary">Add</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>




<?php $__env->stopSection(); ?> <?php $__env->startSection('javascript'); ?> 

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>


<script>
    function addId(id) {
        $("#id").val(id);
    }
</script>

<script>
    $("#testClone").on("submit", function (e) {
        e.preventDefault();
        let id = $('#id').val();
        $.ajax({
            url:  "/admin/qb/test/store-clone/"+id ,
            type: "post",
            data: $(this).serialize(),

            success: function (response) {
                if (response.errors) {
                    $(".alert-danger").html("");

                    $.each(response.errors, function (key, value) {
                        $(".alert-danger").show();
                        $(".alert-danger").append("<li>" + value + "</li>");
                    });
                } else {
                    $(".alert-danger").hide();
                    $("#cloneTest").modal("hide");
                    location.reload(true);
                }
            },
            error: function (error) {
                console.log(error);
                  alert('data not saved')
            },
        });
    });
</script>




<script type="text/javascript">
    $(function () {

        $("#table").DataTable();


        $("#tablecontents").sortable({
            items: "tr",
            cursor: 'move',
            opacity: 0.6,
            update: function () {
                sendOrderToServer();
            }
        });

        function sendOrderToServer() {
            var order = [];
            var token = $('meta[name="csrf-token"]').attr('content');
            $('tr.row1').each(function (index, element) {
                order.push({
                    id: $(this).attr('data-id'),
                    position: index + 1
                });

            });

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "<?php echo e(route('qb-order-change')); ?>",
                data: {
                    order: order,
                    _token: token
                },
                success: function (response) {
                    if (response.status == 200) {
                         $("#position_alert").show();
                         setTimeout(function(){ $("#position_alert").hide(); }, 1000);

                    } else {
                        console.log(response);
                    }
                }
            });
        }
    });

</script>



<script>
    $("#testStore").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            url: "/admin/question-bank-management/test/store",
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
                    $("#createTest").modal("hide");
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


<script type="text/javascript">
    $(document).ready(function () {
        $("#category").on("change", function (e) {
            var subject_id = e.target.value;
            $.ajax({
                url: "<?php echo e(route('subcat')); ?>",
                type: "POST",
                data: {
                    subject_id: subject_id,
                },

                success: function (data) {
                    $("#subcategory").empty();
                    $.each(data.subcategories, function (index, subcategory) {
                        $("#subcategory").append('<option value="' + subcategory.id + '">' + subcategory.category + "</option>");
                    });
                },
            });
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
    type: 'GET',
    url: '/admin/question-bank-management/test/destroy-bank/' + id,
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


<script>
    $('#category_data').on('change',function(e){
        var category_id = e.target.value;
        $.ajax({
                url: "<?php echo e(route('previous-subcategory')); ?>",
                type: "POST",
                data: {
                    category_id: category_id,
                    filter    :2 ,

                },

                success: function (data) {
                    $("#subcategory_data").empty();

                    $.each(data.subcategories, function (index, subcategory) {

                        $("#subcategory_data").append('<option value="' + subcategory.id + '">' + subcategory.category + "</option>");
                    });
                },
            });

    })
</script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/admin/questionbank/question-bank/index.blade.php ENDPATH**/ ?>