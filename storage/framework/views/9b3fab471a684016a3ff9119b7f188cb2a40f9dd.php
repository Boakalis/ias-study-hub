 <?php $__env->startSection('content'); ?>
<div class="row">
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title text-uppercase ">
            Test Management <a href="<?php echo e(route('create_test')); ?>" class="btn btn-success btn-rounded float-right"> <em class="icon ni ni-plus-circle"></em> Add New</a>
        </h3>
    </div>
</div>


<?php echo $__env->make('admin.layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<span class=" alert-success   " role="alert" style="display: none" id="position_alert" > Position Updated Successfully</span><br>

<form action="<?php echo e(route('ias_filter')); ?>" method="post" >
    <?php echo csrf_field(); ?>
    <div class="container bg-light pt-3 pb-3"  >
        <div class="row">
            <div class="col-lg-4">
                <select name="category" id="category_data" class="form-control form-select" data-search="on"  >
                   <?php if(isset($categoryDatas) && !empty($categoryDatas)): ?>
                   <option class="text-center" value="0"  >All</option>
                   <?php $__currentLoopData = $categoryDatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($categoryData->id); ?>"><?php echo e($categoryData->name); ?></option>
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
                <a href="<?php echo e(route('test')); ?>" class="btn btn-warning">Reset</a>
            </div>
        </div>
    </div>
</form>

<div class="table px-2">

    <div class="card card-preview">
        <div class="card-inner">
            <table class="datatable-init table table table-bordered table-md">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">Series</th>
                        <th scope="col">Batch</th>
                        <th scope="col" class="text-center">Type</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody id="tablecontents">
                    <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="row1" data-id="<?php echo e($data->id); ?>" >
                        <td class="sort-class"><?php echo e($key+1); ?></td>
                        <td class="sort-class"><?php echo e($data->name); ?></td>
                        <td class="sort-class"><?php echo e($data->start_date); ?></td>
                        <td class="sort-class"><?php echo e($data->batch->series['name']); ?></td>
                        <td class="sort-class"><?php echo e($data->batch['name']); ?></td>

                        <td class="text-center sort-class">
                            <?php if($data->type==0): ?>
                            <a class="btn btn-xs btn-dim btn-outline-primary">Free</a>
                            <?php else: ?>
                            <a s class="btn btn-xs btn-dim btn-outline-success">Paid</a>
                            <?php endif; ?>
                        </td>
                        <td class="text-center sort-class"><span class="btn btn-xs btn-dim btn-outline-<?php echo e(isset($data->status) && ($data->status == 1) ? "success" : "danger"); ?>"><?php echo e(($data->status == 1)? "Active" : "Inactive"); ?></span></td>

                        <td class="text-center sort-class">
                                <a href="<?php echo e(route('clone-ias-test',$data['id'])); ?>" class="btn btn-icon btn-xs btn-dark"><em class="icon ni ni-copy-fill"></em></a>
                                <a href="<?php echo e(route('edit_test',['id' =>$data['id'],'tab' => 2])); ?>" class="btn btn-icon btn-xs btn-success"><em class="icon ni ni-plus"></em></a>
                                <a href="<?php echo e(route('edit_test',['id' =>$data['id'],'tab' => 1])); ?>" class="btn btn-icon btn-xs btn-secondary"><em class="icon ni ni-edit"></em></a>
                                <button class=" btn btn-icon btn-xs btn-danger" onclick="deleteConfirmation(<?php echo e($data->id); ?>)"><em class="icon ni ni-trash"></em></button>

                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <div style="float:left;">
        <?php echo e(($datas ->currentpage()-1) * $datas ->perpage() +count ($datas)); ?> of <?php echo e($datas->total()); ?> entries
        </div>
        <div style="float:right;">
        <?php echo e($datas->appends(request()->input())->links()); ?>

        </div>
</div>



<?php $__env->stopSection(); ?> <?php $__env->startSection('javascript'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>


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
                url: "<?php echo e(route('ias-order-change')); ?>",
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
    url: "/admin/ias/test/destroy-all/" + id,
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
                    filter    :1 ,

                },

                success: function (data) {
                    $("#subcategory_data").empty();

                    $.each(data.subcategories, function (index, subcategory) {

                        $("#subcategory_data").append('<option value="' + subcategory.id + '">' + subcategory.name + "</option>");
                    });
                },
            });

    })
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/admin/ias/test/index.blade.php ENDPATH**/ ?>