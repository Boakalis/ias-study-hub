
<?php if(isset($datas)&& !empty($datas)): ?>

<?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


<ul class="nk-nav nav nav-tabs">

    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#personal"><span class="text-dark text-uppercase" >Attempted on  <span class="text-danger" ><?php echo e(\Carbon\Carbon::parse($data->date)->format('d-F-Y H:i:s')); ?> </span> </span> :   </a>
    </li>
    <li class="nav-item">
    </li>
</ul><!-- .nav-tabs -->
<div class="tab-content">
    <div class="tab-pane active" id="personal">
        <div class="nk-block">

            <div class="row gy-gs">
                <div class="col-md-3 col-lg-3">
                    <div class="nk-wg-card is-s1 card card-bordered bg-success ">
                        <div class="card-inner">

                            <div class="nk-iv-wg2">
                                <div class="nk-iv-wg2-title">
                                    <h6 class="title text-white">Correct<em class="icon ni ni-check"></em></h6>
                                </div>
                                <div class="nk-iv-wg2-text">
                                    <div class="nk-iv-wg2-amount text-white"> <?php echo e($data->correct); ?> </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .card -->
                </div><!-- .col -->
                <div class="col-md-3 col-lg-3">
                    <div class="nk-wg-card is-s1 card card-bordered bg-danger">
                        <div class="card-inner">
                            <div class="nk-iv-wg2">
                                <div class="nk-iv-wg2-title text-white">
                                    <h6 class="title text-white">Incorrect <em class="icon ni ni-cross"></em></h6>
                                </div>
                                <div class="nk-iv-wg2-text">
                                    <div class="nk-iv-wg2-amount text-white"> <?php echo e($data->incorrect); ?></div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .card -->
                </div><!-- .col -->
                <div class="col-md-3 col-lg-3">
                    <div class="nk-wg-card is-s1 card card-bordered bg-info">
                        <div class="card-inner">
                            <div class="nk-iv-wg2">
                                <div class="nk-iv-wg2-title">
                                    <h6 class="title text-white">Un-Attempt <em class="icon ni ni-stop"></em></h6>
                                </div>
                                <div class="nk-iv-wg2-text">
                                    <div class="nk-iv-wg2-amount text-white"> <?php echo e($data->unattempt); ?></div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .card -->
                </div><!-- .col -->
                <div class="col-md-3 col-lg-3">
                    <div class="nk-wg-card is-s1 card card-bordered bg-warning">
                        <div class="card-inner">
                            <div class="nk-iv-wg2">
                                <div class="nk-iv-wg2-title">
                                    <h6 class="title text-white">Review <em class="icon ni ni-info"></em></h6>
                                </div>
                                <div class="nk-iv-wg2-text">
                                    <div class="nk-iv-wg2-amount text-white"> <?php echo e($data->review); ?></div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .card -->
                </div><!-- .col -->
            </div><!-- .row -->
            <div class="row gy-gs">
                <div class="col-md-12 col-lg-12">
                    <div class="nk-wg-card alert-info card card-bordered">
                        <div class="card-inner">
                            <div class="nk-iv-wg2 text-center">
                                <div class="nk-iv-wg2-title">
                                    <h6 class="title">Your Result <em class="icon ni ni-info"></em></h6>
                                </div>
                                <div class="nk-iv-wg2-text text-center">
                                    <div class="nk-iv-wg2-amount d-block"> <?php echo e($data->marks_obtained); ?>/<?php echo e(($data->total_marks)); ?> </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .card -->
                    <?php
                        $parameter =[
                            'id' =>$data->id,
                        ];
                    $parameter= Crypt::encrypt($parameter);
                    ?>
                    <div class="text-center">
                        
                        <form action="<?php echo e(route('generatePDF',['parameter' => $parameter , 'encrypted_user_id' =>Crypt::encrypt(Auth::user()->id)])); ?>" method="get"  class="d-inline-block">
                            <?php echo csrf_field(); ?>

                            <input type="hidden" name="test" value="<?php echo e(@$data->test['name']); ?>">
                            <input type="hidden" name="batch" value="<?php echo e(@$data->batch['name']); ?>">
                            <input type="hidden" name="course_id" value="1">
                            <input type="hidden" name="test_id" value ="<?php echo e(@$data->id); ?>">
                            <input type="hidden" name="series" value="<?php echo e(@$data->batch['series']['name']); ?>">
                            <button class="btn btn-dim  btn-warning p-1 mt-2" href="" title="download"><i class="fas fa-cloud-download-alt"></i>&nbsp;Download</button>
                        </form>


                    </div>
                </div><!-- .col -->
            </div><!-- .row -->
        </div>
    </div><!-- .tab-pane -->

</div>

<hr class="hr-4">


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php else: ?>

<ul class="nk-nav nav nav-tabs">

    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#personal"><span class="text-dark text-uppercase" >Reports  <span class="text-danger" ></span> </span> :   </a>
    </li>
    <li class="nav-item">
    </li>
</ul><!-- .nav-tabs -->
<div class="tab-content">
    <div class="tab-pane active" id="personal">
        <div class="nk-block">

            <div class="row gy-gs">
                <div class="col-md-3 col-lg-3">
                    <div class="nk-wg-card is-s1 card card-bordered bg-success ">
                        <div class="card-inner">

                            <div class="nk-iv-wg2">
                                <div class="nk-iv-wg2-title">
                                    <h6 class="title text-white">Correct<em class="icon ni ni-check"></em></h6>
                                </div>
                                <div class="nk-iv-wg2-text">
                                    <div class="nk-iv-wg2-amount text-white"> <?php echo e($data->correct); ?> </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .card -->
                </div><!-- .col -->
                <div class="col-md-3 col-lg-3">
                    <div class="nk-wg-card is-s1 card card-bordered bg-danger">
                        <div class="card-inner">
                            <div class="nk-iv-wg2">
                                <div class="nk-iv-wg2-title text-white">
                                    <h6 class="title text-white">Incorrect <em class="icon ni ni-cross"></em></h6>
                                </div>
                                <div class="nk-iv-wg2-text">
                                    <div class="nk-iv-wg2-amount text-white"> <?php echo e($data->incorrect); ?></div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .card -->
                </div><!-- .col -->
                <div class="col-md-3 col-lg-3">
                    <div class="nk-wg-card is-s1 card card-bordered bg-info">
                        <div class="card-inner">
                            <div class="nk-iv-wg2">
                                <div class="nk-iv-wg2-title">
                                    <h6 class="title text-white">Un-Attempt <em class="icon ni ni-stop"></em></h6>
                                </div>
                                <div class="nk-iv-wg2-text">
                                    <div class="nk-iv-wg2-amount text-white"> <?php echo e($data->unattempt); ?></div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .card -->
                </div><!-- .col -->
                <div class="col-md-3 col-lg-3">
                    <div class="nk-wg-card is-s1 card card-bordered bg-warning">
                        <div class="card-inner">
                            <div class="nk-iv-wg2">
                                <div class="nk-iv-wg2-title">
                                    <h6 class="title text-white">Review <em class="icon ni ni-info"></em></h6>
                                </div>
                                <div class="nk-iv-wg2-text">
                                    <div class="nk-iv-wg2-amount text-white"> <?php echo e($data->review); ?></div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .card -->
                </div><!-- .col -->
            </div><!-- .row -->
            <div class="row gy-gs">
                <div class="col-md-12 col-lg-12">
                    <div class="nk-wg-card alert-info card card-bordered">
                        <div class="card-inner">
                            <div class="nk-iv-wg2 text-center">
                                <div class="nk-iv-wg2-title">
                                    <h6 class="title">Your Result <em class="icon ni ni-info"></em></h6>
                                </div>
                                <div class="nk-iv-wg2-text text-center">
                                    <div class="nk-iv-wg2-amount d-block"> <?php echo e($data->marks_obtained); ?>/<?php echo e(($data->total_marks)); ?> </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .card -->
                    <?php
                        $parameter =[
                            'id' =>$data->id,
                        ];
                    $parameter= Crypt::encrypt($parameter);
                    ?>
                    <div class="text-center">
                        
                        <form action="<?php echo e(route('generatePDF',['parameter' => $parameter , 'encrypted_user_id' =>Crypt::encrypt(Auth::user()->id)])); ?>" method="get"  class="d-inline-block">
                            <?php echo csrf_field(); ?>

                            <input type="hidden" name="test" value="<?php echo e($data->test['name']); ?>">
                            <input type="hidden" name="batch" value="<?php echo e($data->batch['name']); ?>">
                            <input type="hidden" name="course_id" value="1">
                            <input type="hidden" name="test_id" value ="<?php echo e($data->id); ?>">
                            <input type="hidden" name="series" value="<?php echo e($data->batch['series']['name']); ?>">
                            <button class="btn btn-dim  btn-warning p-1 mt-2" href="" title="download"><i class="fas fa-cloud-download-alt"></i>&nbsp;Download</button>
                        </form>


                    </div>
                </div><!-- .col -->
            </div><!-- .row -->
        </div>
    </div><!-- .tab-pane -->

</div>

<hr class="hr-4">





<?php endif; ?>


<?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/website/Users/IAS/report.blade.php ENDPATH**/ ?>