<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title text-uppercase ">
            Question Management <a href="<?php echo e(route('create_question')); ?>" class="btn btn-success btn-rounded float-right"> <em class="icon ni ni-plus-circle"></em> Add New</a>
        </h3>
    </div>
</div>

<div class="table">

    <?php echo $__env->make('admin.layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="card card-preview">
        <div class="card-inner">
            <table class="datatable-init table table table-md">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Category</th>
                        <th scope="col">Difficulty Level</th>
                        <th scope="col" class="text-center">Status</th>

                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($key+1); ?></td>
                        <td><?php echo e(@$value->subject->name); ?></td>
                        <td>
                            <?php echo ($value->level == 1)?'<span class="badge badge-dot badge-success">Easy</span>': (($value->level == 2)?'<span class="badge badge-dot badge-secondary">Medium</span>':'
                            <span class="badge badge-dot badge-danger">Hard</span>'); ?>

                        </td>

                        <td class="text-center">
                            <?php if($value->status==1): ?>
                            <span class="btn btn-xs btn-dim btn-outline-success">Active</span>

                            <?php else: ?>
                            <span class="btn btn-xs btn-dim btn-outline-danger">Inactive</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">

                                <button class="btn btn-icon btn-xs btn-primary" data-toggle="modal" data-attr="<?php echo e(route('show_question', $value->id )); ?>" id="showButton" data-target="#showModal" title="show">
                                    <em class="icon ni ni-eye"></em>
                                </button>
                                <a href="<?php echo e(route('edit_question',$value->id)); ?>" class="btn btn-icon btn-xs btn-secondary"><em class="icon ni ni-edit"></em></a>

                                <a href="#" class="btn btn-icon btn-xs btn-danger remove" onclick="deleteConfirmation(<?php echo e($value->id); ?>)" title="Delete"><em class="icon ni ni-trash"></em></a>

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

<div class="modal fade zoom" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Question View</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body" id="showBody">
                <div>
                    <!-- the result to be displayed apply here -->
                </div>
            </div>
        </div>
    </div>
</div>


    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('javascript'); ?>
    <script>
        // display a modal (small modal)
        $(document).on("click", "#showButton", function (event) {
            event.preventDefault();

            let href = $(this).attr("data-attr");
            $.ajax({
                url: href,
                beforeSend: function () {
                    $("#loader").show();
                },
                // return the result
                success: function (result) {
                    $("#showModal").modal("show");
                    $("#showBody").html(result.html).show();
                },
                complete: function () {
                    $("#loader").hide();
                },
                error: function (jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $("#loader").hide();
                },
                timeout: 8000,
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
    url: "/admin/question-management/delete/" + id,
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
        $(".alert").delay(1500).fadeOut(300);
    </script>

    <?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/admin/question/index.blade.php ENDPATH**/ ?>