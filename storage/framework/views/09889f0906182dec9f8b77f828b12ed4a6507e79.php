<?php $__env->startSection('stylesheet'); ?>
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/themes/base/jquery-ui.css?ver=1" rel="stylesheet" type="text/css"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title">
            Test Management <a href="#" class="btn btn-success btn-rounded float-right" data-toggle="modal" data-target="#createTest"> <em class="icon ni ni-plus-circle"></em> Add New</a>
        </h3>
    </div>
</div>


<div class="modal fade zoom" id="createTest" tabindex="-1" role="dialog" aria-labelledby="testModal" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Add Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="post" name="testStore" id="testStore">
                    <div class="alert alert-danger" style="display: none;"></div>

                    <div class="md-form">
                        <label class="form-label" for="name"> Test Name<span  class="required text-danger">*</span></label>
                        <input name="name" id="test" class="form-control" type="text" />
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="form-label">Date</label>
                        <div class="form-control-wrap">
                            <input type="text" name="date" class="form-control datepicker " data-date-format="dd-mm-yyyy" autocomplete="off" id="dateid" >
                        </div>
                    </div>
                    <br />
                    <div class="form-group">
                        <label class="form-label">Time</label>
                        <div class="form-control-wrap has-timepicker">
                            <input type="text" class="form-control time-picker" name="time" placeholder="Select Time">
                        </div>
                    </div>
                    <br>
                    <div class="md-form">
                        <label class="form-label" for="duration"> Duration<span  class="required text-danger">*</span></label>
                        <input name="duration" id="duration" class="form-control" type="text" />
                    </div>
                    <br>


                    <div class="md-form">
                        <label class="form-label" for="mark"> Mark<span  class="required text-danger">*</span></label>
                        <input name="mark" id="mark1" class="form-control" type="text" />
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

<?php echo $__env->make('admin.layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<span class=" alert-success   " role="alert" style="display: none" id="position_alert" > Position Updated Successfully</span><br>
<div class="card card-preview">
    <div class="card-inner">
        <table class="datatable-init table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Test Name</th>
                    <th scope="col" class="text-center">Date</th>
                    <th scope="col" class="text-center">Duration</th>
                    <th scope="col" class="text-center">Test Time</th>
                    <th scope="col" class="text-center">Mark</th>
                    <th scope="col" class="text-center">Status</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="tablecontents">
                <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="row1" data-id="<?php echo e($data->id); ?>" >
                    <td class="text-center sort-class"><?php echo e($key+1); ?></td>
                    <td class="text-center sort-class"><?php echo e($data->name); ?></td>
                    <td class="text-center sort-class"><?php echo e(date('d-F-Y',strtotime($data->date))); ?></td>
                    <td class="text-center sort-class"><?php echo e($data->duration); ?></td>
                    <td class="text-center sort-class"><?php echo e($data->time); ?></td>
                    <td class="text-center sort-class"><?php echo e($data->mark); ?></td>

                    <td class="text-center sort-class">
                        <?php if($data->status==1): ?>
                        <span class="btn btn-xs btn-dim btn-outline-success">Active</span>
                        <?php else: ?>
                        <span class="btn btn-xs btn-dim btn-outline-danger">InActive</span>

                        <?php endif; ?>
                    </td>


                    <td class="text-center sort-class ">
                        <a title="add" class="btn btn-icon btn-xs btn-success" href="<?php echo e(route('edit_daily_quiz',['id' =>$data->id, 'tab' =>2])); ?>"><em class="icon ni ni-plus"></em></a>
                        <a title="edit" class="btn btn-icon btn-xs btn-secondary" href="<?php echo e(route('edit_daily_quiz',['id' =>$data->id, 'tab' =>1])); ?>"><em class="icon ni ni-edit"></em></a>
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
            <span id="pagination_click"  ><?php echo e($datas->links()); ?></span>

        </div>

</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?> 

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js?v=1"></script>




<script>
    $("#testStore").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            url: "/admin/daily-quiz/store-daily-quiz",
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
                    $("#createTest").modal("hide");
                    location.reload(true);
                }
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
                url: "<?php echo e(route('previous-subcategory')); ?>",
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
    type: 'get',
    url: "<?php echo e(url('/admin/daily-quiz/delete-quiz/')); ?>/" + id,
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
$( "#dateid" ).datepicker("destroy");
$( "#dateid" ).datepicker({ minDate: 0});
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
                url: "<?php echo e(route('quiz-order-change')); ?>",
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



<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/admin/dailyquiz/index.blade.php ENDPATH**/ ?>