<?php
Use App\Models\TestReport;
?>
<?php $__env->startSection('title',$batch->name.' | '.$batch->series->name); ?>
<?php $__env->startSection('content'); ?>
<!-- content @s  -->
<div class="nk-content bg-white">
    
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">

                    <div class="row">
                        <div class="col-xl-4 p-1">
                            <div class="card card-bordered">
                                <?php if(isset($batch->series->image) && !empty($batch->series->image)): ?>
                                <img src="<?php echo e(asset($batch->series->image)); ?>" class="card-img-top" />
                                <?php else: ?>
                                <img src="<?php echo e(asset('images/others/testseries-1.jpg')); ?>" class="card-img-top" />
                                <?php endif; ?>
                                <?php if(Auth::user()): ?>
                                <?php ($checkSubscription = \App\Models\User::checkSubscription($batch->id,1)); ?>
                                <?php else: ?>
                                <?php ($checkSubscription=0); ?>
                                <?php endif; ?>
                                <div class="card-inner card-sm p-1">
                                    
                                    <?php if($batch->isClosed != 1): ?>
                                    <?php if($checkSubscription !=1): ?>
                                    <div class="alert alert-xs alert-success mt-3 mb-3 text-white text-center">
                                        <span class="text-uppercase font-weight-bold text-dark">
                                            Special Discount <?php echo e($batch->discount); ?>% <br>
                                            Fee <strike><?php echo e($batch->price); ?></strike>/- <br> Pay Just &nbsp;
                                            ₹<?php echo e($amount= (($batch->price)-($batch->price*($batch->discount/100)))); ?>/-<br />
                                        </span>
                                    </div>
                                    <a href="javascript:void(0)" id="buy" class="btn btn-block btn-readical-red text-white btn-lg pay_now"
                                        data-batch-id="<?php echo e($batch->id); ?>" data-amount="<?php echo e($amount); ?>"><span class="">
                                            ₹<?php echo e($amount); ?> &nbsp;BUY NOW</span></a>
                                    <?php else: ?>
                                    <br>
                                    <a class="btn btn-block btn-outline-primary " href="javascript:void(0)"><span
                                            class="">PURCHASED</span></a>
                                    <?php endif; ?>
                                    <?php if(!empty($batch->schedule)): ?>
                                    <a href="<?php echo e(route('download',$batch->id)); ?>" class="btn btn-block btn-outline-warning text-uppercase">Download Schedule </a>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <a href="https://api.whatsapp.com/send?phone=916385752831"
                                        class="btn btn-block btn-outline-success text-uppercase text-uppercase"  target="_blank"> <i
                                            class="fab fa-whatsapp fa-lg "></i> &nbsp; +916385752831 </a>

                                </div>
                            </div>


                        </div><!-- .col -->
                        <div class="col-xl-8 p-1">

                            <div class="card bg-transparent">
                                <div class="card-inner card-inner-md p-1">
                                    <a href="<?php echo e(url()->previous()); ?>" class="float-right " ><em class="icon ni ni-arrow-left backarrow"></em> </a>

                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link pl-0 py-0 pb-1 text-uppercase " data-toggle="tab"
                                                href="#tabItem5"><em class="icon ni ni-folder"></em><span>Overview</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active pl-0 py-0 pb-1 text-uppercase " data-toggle="tab"
                                                href="#tabItem6"><em class="icon ni ni-file-edit"></em> <span>Section</span> </a>
                                        </li>

                                    </ul>

                                    <div class="tab-content">
                                        <div class="tab-pane bg-white p-2" id="tabItem5">
                                            <?php echo $__env->make('admin.layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <div class="alert alert-sm bg-secondary text-white">
                                                <h6><?php echo e($batch->series->name); ?></h6>
                                            </div>
                                            <div class="entry mt-3">
                                                <div class="list list-lg list-checked-circle list-success">
                                                    <?php echo $batch->description; ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane active " id="tabItem6">
                                            <?php echo $__env->make('admin.layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <div class="nk-data data-list">

                                                <ul class="sp-pdl-list">

                                                    <?php if($batch->isClosed == 1): ?>
                                                    <?php $__currentLoopData = $batch->test; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="sp-pdl-item">
                                                        <div class="sp-pdl-desc">
                                                            <div class="sp-pdl-img"><em class="icon ni ni-play-circle font-35 text-primary"></em></div>
                                                            <div class="sp-pdl-info">
                                                                <h6 class="sp-pdl-title">
                                                                    <a href="javascript:void(0)" class="sp-pdl-name"><?php echo e($test->name); ?></a>
                                                                    
                                                                </h6>
                                                                <div class="sp-pdl-meta">
                                                                    <span class="release"> </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="sp-pdl-btn">
                                                            <a href="javascript:void(0)" class="btn btn-danger text-uppercase">Closed</a>
                                                        </div>
                                                    </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php else: ?>
                                                    <?php $__currentLoopData = $batch->test; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                    <li class="sp-pdl-item">
                                                        <div class="sp-pdl-desc">

                                                            <?php if($test->type==0): ?>
                                                            <div class="sp-pdl-img"><em
                                                                    class="icon ni ni-play-circle font-35 text-primary"></em>
                                                            </div>
                                                            <div class="sp-pdl-info">
                                                                <h6 class="sp-pdl-title">
                                                                    <?php if(!(Auth::check())): ?>
                                                                    <a href="<?php echo e(route('testoverview',['series_slug' => $batch->series->slug,'batch_slug' =>$batch->slug,'test_slug' =>$test->slug])); ?>"
                                                                        class="sp-pdl-name test_attend   test_now text-dark"><?php echo e($test->name); ?>

                                                                    </a>
                                                                   <?php else: ?>

                                                                    <a href="<?php echo e(route('testoverview',['series_slug' => $batch->series->slug,'batch_slug' =>$batch->slug,'test_slug' =>$test->slug])); ?>"
                                                                        class="sp-pdl-name text-dark"><?php echo e($test->name); ?>

                                                                    </a>
                                                                    <?php endif; ?>
                                                                    <?php if(auth()->guard()->check()): ?>
                                                                    <?php if(@$checkSubscription == 1): ?>
                                                                    <span
                                                                    class="badge badge-dim  badge-pill badge-primary ">Free</span>
                                                                    <?php else: ?>
                                                                    <span
                                                                    class="badge badge-dim  badge-pill badge-<?php echo e(TestReport::where([['user_id', Auth::user()->id], ['type', 0], ['test_id', $test->id]])->exists() ? 'danger' : 'primary'); ?> "> <?php echo e(TestReport::where([['user_id', Auth::user()->id], ['type', 0], ['test_id', $test->id]])->exists() ? 'Trial Expired. Buy for Unlimited Access ' : 'Free'); ?></span>
                                                                    <?php endif; ?>

                                                                    <?php endif; ?>
                                                                    <?php if(auth()->guard()->guest()): ?>
                                                                    <span
                                                                    class="badge badge-dim  badge-pill badge-primary ">Free</span>
                                                                    <?php endif; ?>
                                                                    <?php else: ?>


                                                                    <?php if($checkSubscription ==1): ?>
                                                                    <div class="sp-pdl-img"><em
                                                                            class="icon ni     ni-play-circle font-35 text-primary"></em>
                                                                    </div>
                                                                    <div class="sp-pdl-info">
                                                                        <h6 class="sp-pdl-title">
                                                                            <?php if($date=(\Carbon\Carbon::createFromFormat('Y-m-d',$test->start_date))->gt( \Carbon\Carbon::now()->format('Y-m-d'))): ?>
                                                                            <a href="javascript:void(0)"
                                                                                class="sp-pdl-name  text-dark"> <?php echo e($test->name); ?></a>

                                                                            <?php else: ?>
                                                                            <a href="<?php echo e(route('testoverview',['series_slug' => $batch->series->slug,'batch_slug' =>$batch->slug,'test_slug' =>$test->slug])); ?>"
                                                                                class="sp-pdl-name text-dark"> <?php echo e($test->name); ?></a>
                                                                            <?php endif; ?>
                                                                            <?php else: ?>
                                                                            <div class="sp-pdl-img"><em
                                                                                    class="icon ni  opacity-5   ni-lock-fill font-35 text-danger"></em>
                                                                            </div>
                                                                            <div class="sp-pdl-info">
                                                                                <h6 class="sp-pdl-title">

                                                                                    <a href="javascript:void(0)"
                                                                                        class="sp-pdl-name opacity-5 pay_now text-dark"
                                                                                        data-batch-id="<?php echo e($batch->id); ?>"
                                                                                        data-amount="<?php echo e($amount); ?>"
                                                                                        data-id="<?php echo e((Auth::user()==null)? "" : (Auth::User()->id)); ?>">
                                                                                        <?php echo e($test->name); ?></a>

                                                                                    <?php endif; ?>
                                                                                    
                                                                                    <?php endif; ?>
                                                                                </h6>
                                                                                <div class="sp-pdl-meta">


                                                                                    <span class="release">
                                                                                        <span class="text-soft"><i class="fas fa-question-circle"></i>&nbsp;Questions:
                                                                                        </span> <span class="text-soft" ><?php echo e($test->questions->count()); ?></span>
                                                                                    </span>

                                                                                    <span class="release">
                                                                                    <span class="text-soft"> <i class="  fas fa-chart-pie"></i>&nbsp;Marks:
                                                                                    </span> <span class="text-soft" ><?php echo e($test->questions->count() * $test->mark); ?></span>
                                                                                   </span>

                                                                                   <span class="release">
                                                                                    <span class="text-soft"><i class="fas fa-stopwatch"></i>&nbsp;Duration:
                                                                                    </span> <span class="text-soft" ><?php echo e($test->duration); ?> Mins</span>
                                                                                   </span>
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                    <div class="sp-pdl-btn">

<?php if($date=(\Carbon\Carbon::createFromFormat('Y-m-d',$test->start_date)->subDays(1))->gte( \Carbon\Carbon::now()->format('Y-m-d'))): ?>
    
    <?php if($checkSubscription == 1): ?>
                                                                            <a href="javascript::void(0)"
                                                                                class="btn btn-info text-uppercase"><em
                                                                                class="icon ni  opacity-5   ni-lock-fill font-35 text-dark"></em> <span>Unlock on <?php echo e(\Carbon\Carbon::parse($test->start_date)->format('d-M')); ?></span>
                                                                            </a>

    <?php else: ?>
        
        <?php if($test->type == 0): ?>
             
            <?php if(!(Auth::check())): ?>
            <a href="<?php echo e(route('testoverview',['series_slug' => $batch->series->slug,'batch_slug' =>$batch->slug,'test_slug' =>$test->slug])); ?>"
            class="btn btn-primary test_now test_attend text-uppercase">Take
            Test</a>
            
            <?php else: ?>
                
                <?php if( TestReport::where([['user_id', Auth::user()->id], ['type', 0], ['test_id', $test->id]])->exists()): ?>
                                                                                    <button class="btn btn-xs btn-dim btn-primary p-1" data-toggle="modal" id="reportShow" data-target="#test-report"
                                                                                    data-attr="<?php echo e(route('show.report.testindex',$test->id)); ?>" title="show">
                                                                                    <em class="fas fa-eye "></em>&nbsp;View</button>

                
                <?php else: ?>
                                                                                    <a href="<?php echo e(route('testoverview',['series_slug' => $batch->series->slug,'batch_slug' =>$batch->slug,'test_slug' =>$test->slug])); ?>"
                                                                                        class="btn btn-primary text-uppercase">Take
                                                                                        Test</a>
                <?php endif; ?>
            <?php endif; ?>
        
        
        <?php else: ?>
                                                                        <a class="btn btn-primary text-uppercase pay_now"
                                                                            style="color: white; opacity: 0.5;"
                                                                            data-batch-id="<?php echo e($batch->id); ?>"
                                                                            data-amount="<?php echo e($amount); ?>"
                                                                            data-id="<?php echo e((Auth::user()==null)? "" : (Auth::User()->id)); ?>">&nbsp;Take Test</a>

        <?php endif; ?>
        
    <?php endif; ?>
    

    
<?php else: ?>
    
    <?php if($test->type==0): ?>
            
            <?php if(!(Auth::check())): ?>
                                                                        <a href="<?php echo e(route('testoverview',['series_slug' => $batch->series->slug,'batch_slug' =>$batch->slug,'test_slug' =>$test->slug])); ?>"
                                                                            class="btn btn-primary test_now test_attend text-uppercase">Take
                                                                            Test</a>
            
            <?php else: ?>
                
                
                <?php if(@$checkSubscription ==1): ?>
                        <?php if( TestReport::where([['user_id', Auth::user()->id], ['type', 0], ['test_id', $test->id]])->exists()): ?>
                        <button class="btn btn-xs btn-dim btn-primary p-1" data-toggle="modal" id="reportShow" data-target="#test-report"
                        data-attr="<?php echo e(route('show.report.testindex',$test->id)); ?>" title="show">
                        <em class="fas fa-eye "></em>&nbsp;View</button>
                        <a href="<?php echo e(route('testoverview',['series_slug' => $batch->series->slug,'batch_slug' =>$batch->slug,'test_slug' =>$test->slug])); ?>"
                            class="btn btn-primary text-uppercase">Re-Take
                            Test</a>
                       
                       <?php else: ?>
                        <a href="<?php echo e(route('testoverview',['series_slug' => $batch->series->slug,'batch_slug' =>$batch->slug,'test_slug' =>$test->slug])); ?>"
                            class="btn btn-primary text-uppercase">Take
                            Test</a>

                       <?php endif; ?>
                <?php else: ?>
                    <?php if( TestReport::where([['user_id', Auth::user()->id], ['type', 0], ['test_id', $test->id]])->exists()): ?>
                    <button class="btn btn-xs btn-dim btn-primary p-1" data-toggle="modal" id="reportShow" data-target="#test-report"
                    data-attr="<?php echo e(route('show.report.testindex',$test->id)); ?>" title="show">
                    <em class="fas fa-eye "></em>&nbsp;View</button>
                    <a class="btn btn-primary text-uppercase pay_now"
                    style="color: white; opacity:0.5;"
                    data-batch-id="<?php echo e($batch->id); ?>"
                    data-amount="<?php echo e($amount); ?>"
                    data-id="<?php echo e((Auth::user()==null)? "" : (Auth::User()->id)); ?>">Re-Take Test</a>
                    <?php else: ?>
                    <a href="<?php echo e(route('testoverview',['series_slug' => $batch->series->slug,'batch_slug' =>$batch->slug,'test_slug' =>$test->slug])); ?>"
                        class="btn btn-primary text-uppercase">Take
                        Test</a>

                   <?php endif; ?>
                <?php endif; ?>


            <?php endif; ?>

        <?php elseif($checkSubscription ==1): ?>
                                                                        <a href="<?php echo e(route('testoverview',['series_slug' => $batch->series->slug,'batch_slug' =>$batch->slug,'test_slug' =>$test->slug])); ?>"
                                                                            class="btn btn-primary text-uppercase">Take
                                                                            Test</a>
        <?php else: ?>
                                                                        <a class="btn btn-primary text-uppercase pay_now"
                                                                            style="color: white; opacity:0.5;"
                                                                            data-batch-id="<?php echo e($batch->id); ?>"
                                                                            data-amount="<?php echo e($amount); ?>"
                                                                            data-id="<?php echo e((Auth::user()==null)? "" : (Auth::User()->id)); ?>">&nbsp;Take Test</a>
        <?php endif; ?>
<?php endif; ?>
                                                                    </div>
                                                    </li><!-- .sp-pdl-item -->
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>


                                                </ul>
                                            </div><!-- data-list -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div><!-- .col -->

                    </div><!-- .row -->

                </div>
            </div>
        </div>
    </div>
</div>
<!-- content @e  -->
<!-- medium modal -->
<div class="modal fade zoom" id="test-report" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">REPORT SUMMARY</h5>
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
                                                    <h6 class="title">Incorrect <em class="icon ni ni-info"></em></h6>
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>




<?php if(auth()->guard()->check()): ?>


<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    var SITEURL = '<?php echo e(URL::to('/')); ?>';
    $('.pay_now').on('click', function () {

        var totalAmount = $(this).attr("data-amount");
        var batchid = <?php echo e($batch-> id); ?>;
        var course_id = 1; // 1-IAS
        var id = "<?php echo e(Auth::user()->id); ?>";
        var order_id = '';
        var encrypted_id = '<?php echo e(Crypt::encryptString($batch->id)); ?>';
        var emailCheck = '<?php echo e(!empty(Auth::user()->email)?'200':'400'); ?>'
        var phoneCheck = '<?php echo e(!empty(Auth::user()->phone)?'200':'400'); ?>'
        if ( phoneCheck == 400 || emailCheck == 400 )  {
            $('#profileDetailError').html("");
            document.getElementById('profileDetailsForm').reset();
            $('#profileDetailsModal').modal('show')
         }else{
        $.ajax({
            url: '<?php echo e(route('createOrder')); ?>',
            type: 'post',
            data: {
                '_token': '<?php echo e(csrf_token()); ?>',
                'totalAmount': totalAmount,
                'batch_id': batchid,
                'course_id': course_id,
            },

            success: function (response) {
                if (response.status == 200) {
                    order_id = response.payment.order_id;

                }
            }
        });


        var options = {
            "key": "<?php echo e(Config::get('app.razorpay_key')); ?>",
            "amount": (totalAmount * 100), // 2000 paise = INR 20
            "currency": "INR",
            "name": "<?php echo e(Auth::User()->name); ?>",
            "image": "<?php echo e(asset(@$globalSettings->logo)); ?>",

            "handler": function (response) {
                $("#loader").show();

                $.ajax({
                    url: "<?php echo e(route('paysuccess')); ?>",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        'payment_id': response.razorpay_payment_id,
                        'amount': totalAmount,
                        'response': response,
                        'batch_id': batchid,
                        '_token': '<?php echo e(csrf_token()); ?>',
                        'order_id': order_id,
                        'course_id': 1,

                    },
                    success: function (msg) {

                        if (msg.status == true) {
                            window.location.href = SITEURL+'/payment/thank-you/'+encrypted_id+'/'+order_id;
                        } else if (msg.banned == 1) {
                            Swal.fire({
                                text: 'Our Secutiy System Detected something strange.',
                                imageUrl: SITEURL+'/images/ban.jpg',
                                imageWidth: 500,
                                imageHeight: 400,
                                imageAlt: 'Custom image',
                            });
                        }
                    }
                });

            },

            "prefill": {
                "contact": '<?php echo e(Auth::user()->phone); ?>',
                "email": '<?php echo e(Auth::user()->email); ?>'
            },
            "theme": {
                "color": '#B94A5D'
            },
            "modal": {
        "ondismiss": function(){
            const note = document.querySelector('.nk-content');
            note.style.cssText += 'overflow-y:auto; height:550px';
        }
    }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();

        rzp1.on('payment.failed', function (response) {
            var err = (response.error);

            $.ajax({
                url: SITEURL+'/payment/pay-failure',
                type: 'post',
                data: {
                    payment_id: response.razorpay_payment_id,
                    amount: totalAmount,
                    response: response.error,
                    batch_id: batchid,
                    order_id: order_id,
                    _token: '<?php echo e(csrf_token()); ?>',
                    course_id: 1,
                },

            });

        });
        }
    });

</script>
<?php endif; ?>

<script type="text/javascript">
</script>

<script>
    window.addEventListener("pageshow", function (event) {
        var historyTraversal = event.persisted ||
            (typeof window.performance != "undefined" &&
                window.performance.navigation.type === 2);
        if (historyTraversal) {
            // Handle page restore.
            window.location.reload();
        }
    });

</script>

<script>
    var url = window.location.href;

    if (url.search("razorpay") >= 0) {
        $('#buy').click();
    }

</script>

<script>
    var url = window.location.href;

    if (url.search("payment_gateways") >= 0) {
        $('.pay_all_now').click();
    }

</script>

<script>
    $(window).on("load", function () {
        Tawk_API.onLoad = function(){
Tawk_API.hideWidget();
};
    });
</script>

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

<?php echo $__env->make('website.Layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/website/Users/IAS/testoverview.blade.php ENDPATH**/ ?>