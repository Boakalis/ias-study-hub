<?php $__env->startSection('meta_title'); ?>
<title>My Courses | IAS StudyHub</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- content @s  -->
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview ">
                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title text-uppercase ">My Courses</h4>
                                <p> <span class="btn btn-xs btn-outline-info" >Note</span> Click <i class="fas fa-plus text-dark " ></i> &nbsp; Symbol in S.No to view Hidden details</p>

                            </div>
                        </div>
                        <div class="card card-preview">
                            <div class="card-inner">
                                <table class="datatable-init table">
                                    <thead>
                                        <tr >

                                            
                                            <th class="text-uppercase text-center" >Subject/Series</th>

                                            <th  class="text-uppercase text-center">Course Type</th>
                                            <th class="text-uppercase text-center">Amount</th>
                                            <th class="text-uppercase text-center" >Status</th>
                                            <th class="text-uppercase text-center" >Payment Mode</th>
                                            <th class="text-uppercase text-center" >Purchased Date</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php if(isset($datas) && !empty($datas)): ?>
                                        <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr >
                                            
                                            <td >
                                                <?php if(($data->course_id )=='1'): ?>
                                                <a class="text-uppercase" href="<?php echo e(route('testoverview',['series_slug'=>$data->batch->series['slug'],'batch_slug'=>$data->batch['slug']])); ?>" ><?php echo e($data->batch['name']); ?></a>
                                                <?php elseif($data->course_id=='2'): ?> <?php if($data->batch_id=="PREMIUM"): ?>
                                                <span>UNLIMITED ACCESS TO ALL QB COURSES (FOR 1 YEAR)</span>
                                                <?php else: ?> <a class="text-uppercase" href="<?php echo e(route('getQuestionBankPages',$data->qbbatch['slug'])); ?>"><span><?php echo e($data->qbbatch['subject']); ?></span>
                                                </a>
                                                <?php endif; ?> <?php elseif($data->course_id=='3'): ?> <?php if($data->batch_id=="PREMIUM"): ?>
                                                <span>PREMIUM PACKAGE</span>
                                                <?php else: ?>
                                                <span> <a class="text-uppercase" href="<?php echo e(route('previousYearTestIndex',['category'=>$data->pyqbatch['slug']])); ?>"><?php echo e($data->pyqbatch['name']); ?></a> </span>
                                                <?php endif; ?> <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($data->course_id == 1): ?>
                                                <span class="tb-amount text-uppercase "><?php echo e($data->type['name']); ?>/<?php echo e($data->batch->series['name']); ?></span>
                                                <?php else: ?>
                                                <span class="tb-amount text-uppercase "><?php echo e($data->type['name']); ?></span>
                                                <?php endif; ?>
                                            </td>

                                            <td >
                                                <span><?php echo e($data->amount); ?></span>
                                            </td>
                                            <td>
                                                <?php if($data->status == 1): ?>
                                                <span class="badge badge-dot badge-success">Paid</span>
                                                <?php else: ?>
                                                <span class="badge badge-dot badge-danger">Failed</span>
                                                <?php endif; ?>
                                            </td>
                                            <td >
                                                <?php if($data->payment_type == 1): ?>
                                                <span class="badge badge-pill badge-success">Online</span>
                                                <?php else: ?>
                                                <span class="badge badge-pill badge-info">Cash</span>
                                                <?php endif; ?>
                                            </td>

                                            <td >
                                                <span><?php echo e(date('d-M-y',strtotime($data->date))); ?></span>
                                            </td>

                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



<!-- medium modal -->
<div class="modal fade zoom" id="test-report" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Test Report</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="body">
            <div>
                <!-- the result to be displayed apply here -->
            </div>
        </div>
    </div>
</div>
</div>




<div class="modal fade zoom" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <h5 class="title">Update Profile</h5>
                <ul class="nk-nav nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#personal">Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#address">Answers</a>
                    </li>
                </ul><!-- .nav-tabs -->
                <div class="tab-content">
                    <div class="tab-pane active" id="personal">
                        <div class="nk-block">
                            <div class="row gy-gs">
                                <div class="col-md-4 col-lg-4">
                                    <div class="nk-wg-card is-s1 card card-bordered">
                                        <div class="card-inner">
                                            <div class="nk-iv-wg2">
                                                <div class="nk-iv-wg2-title">
                                                    <h6 class="title">Correct<em class="icon ni ni-info"></em></h6>
                                                </div>
                                                <div class="nk-iv-wg2-text">
                                                    <div class="nk-iv-wg2-amount"> 5 </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .card -->
                                </div><!-- .col -->
                                <div class="col-md-4 col-lg-4">
                                    <div class="nk-wg-card is-s1 card card-bordered">
                                        <div class="card-inner">
                                            <div class="nk-iv-wg2">
                                                <div class="nk-iv-wg2-title">
                                                    <h6 class="title">Icorrect <em class="icon ni ni-info"></em></h6>
                                                </div>
                                                <div class="nk-iv-wg2-text">
                                                    <div class="nk-iv-wg2-amount"> 4</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .card -->
                                </div><!-- .col -->
                                <div class="col-md-4 col-lg-4">
                                    <div class="nk-wg-card is-s1 card card-bordered">
                                        <div class="card-inner">
                                            <div class="nk-iv-wg2">
                                                <div class="nk-iv-wg2-title">
                                                    <h6 class="title">Un-Attempted <em class="icon ni ni-info"></em></h6>
                                                </div>
                                                <div class="nk-iv-wg2-text">
                                                    <div class="nk-iv-wg2-amount"> 3</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .card -->
                                </div><!-- .col -->
                            </div><!-- .row -->
                            <div class="row gy-gs">
                                <div class="col-md-12 col-lg-12">
                                    <div class="nk-wg-card is-dark card card-bordered">
                                        <div class="card-inner">
                                            <div class="nk-iv-wg2 text-center">
                                                <div class="nk-iv-wg2-title">
                                                    <h6 class="title">Your Result <em class="icon ni ni-info"></em></h6>
                                                </div>
                                                <div class="nk-iv-wg2-text text-center">
                                                    <div class="nk-iv-wg2-amount d-block"> 25/30</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .card -->
                                </div><!-- .col -->
                            </div><!-- .row -->
                        </div>
                    </div><!-- .tab-pane -->
                    <div class="tab-pane" id="address">
                        <div class="gy-4">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Correct Answer</th>
                                        <th scope="col">Your Answer</th>
                                        <th scope="col">Result</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>A</td>
                                        <td>B</td>
                                        <td>Correct</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>A</td>
                                        <td>B</td>
                                        <td>Inorrect</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>A</td>
                                        <td>B</td>
                                        <td>Un-Attempted</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- .tab-pane -->
                </div><!-- .tab-content -->
            </div><!-- .modal-body -->
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div><!-- .modal -->
<!-- content @e  -->


<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script>
    // display a modal (small modal)
    $(document).on('click', '#reportShow', function(event) {
        event.preventDefault();

        let href = $(this).attr('data-attr');
        $.ajax({
            url: href,
            beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#smallModal').modal("show");
                $('#body').html(result.html).show();
            },
            complete: function() {
                $('#loader').hide();
            },
            error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            },
            timeout: 8000

        })


    });
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('website.Layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/website/Users/myorders.blade.php ENDPATH**/ ?>