   
<?php $__env->startSection('meta_title'); ?>
 <!-- Fav Icon  -->
 <!-- Page Title  -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title',$subject->category.'-'.''.'Previous Year Question'); ?>

<?php $__env->startSection('content'); ?>
<?php  use Illuminate\Support\Facades\Crypt; ?>

<div class="nk-content bg-white"  >
    <?php if($subject->subject['isFree'] == 1): ?>
    

    <?php endif; ?>
     
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="row">
                        <div class="col-xl-4 p-1">

                            <div class="card card-bordered">
                                <?php if(isset($subject->subject->image) && !empty($subject->subject->image)): ?>
                                    <img style="" src="<?php echo e(asset($subject->subject->image)); ?>" class="card-img-top" />
                                <?php else: ?>
                                    <img style="" src="<?php echo e(asset('images/others/testseries-1.jpg')); ?>" class="card-img-top" />
                                <?php endif; ?>
                                

                                        
                                        
										
                                    
							</div>


						</div><!-- .col -->
                        <div class="col-xl-8 p-1">
                            <div class="card bg-transparent test-details-page">
                                <div class="card-inner card-inner-md p-1" >
                                    <a href="<?php echo e(url()->previous()); ?>" class="float-right " ><em class="icon ni ni-arrow-left backarrow"></em> </a>

                                    <?php echo $__env->make('admin.layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <ul class="nav nav-tabs">

                                        <li class="nav-item">
                                            <a class="nav-link active  text-uppercase pl-0 py-0 pb-1" data-toggle="tab" href="#testtab"><em class="icon ni ni-file-edit"></em><span>TEST DETAILS</span></a>
										</li>

									</ul>
                                    <div class="tab-content">

                                        <div class="tab-pane active" id="testtab">
                                            <div class="nk-data data-list">
                                                <ul class="sp-pdl-list">
                                                    <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="sp-pdl-item">
                                                    <div class="sp-pdl-desc">

                                                        <?php if($data->type==0): ?>
                                                            <div class="sp-pdl-img"><em class="icon ni ni-play-circle font-35 text-primary"></em></div>
                                                            <div class="sp-pdl-info">
                                                            <h6 class="sp-pdl-title"><a href="<?php echo e(route('previousYearTestIndex',['category' => $subject->subject->slug,'sub_category' => $subject->slug,'test_slug' => $data->slug])); ?>" class="sp-pdl-name <?php echo e(Auth::check()?'':'test_attend'); ?>  text-dark"><?php echo e($data->name); ?></a>
                                                            <span class="badge badge-dim badge-primary badge-pill">Free</span>
                                                        <?php else: ?>
                                                            <div class="sp-pdl-img"><em class="icon ni     ni-play-circle font-35 text-primary"></em></div>
                                                            <div class="sp-pdl-info">
                                                                <?php if($subscribe_check == 1): ?>
                                                                <h6 class="sp-pdl-title"><a href="<?php echo e(route('previousYearTestIndex',['category' => $subject->subject->slug,'sub_category' => $subject->slug,'test_slug' => $data->slug])); ?>" class="sp-pdl-name  text-dark "><?php echo e($data->name); ?></a>
                                                                    <span class="badge badge-dim badge-primary badge-pill">Free</span>

                                                                <?php else: ?>
                                                                <h6 class="sp-pdl-title"><a class="sp-pdl-name text-uppercase pay_now text-dark" href="javascript:void(0)"    data-batch-id="<?php echo e($subject->subject['id']); ?>" data-amount="<?php echo e($subject->subject['price']); ?>" data-id="<?php echo e((Auth::user()==null)? "" : (Auth::User()->id)); ?>"><?php echo e($data->name); ?></a>
                                                                    <span class="badge badge-dim badge-primary badge-pill">Paid Test</span>

                                                                <?php endif; ?>
                                                        <?php endif; ?>
                                                            </h6>
                                                            <div class="sp-pdl-meta">
                                                                <span class="release">
																	<?php if(Auth::user()): ?>
																		<?php if($data->type==0): ?>
																			<?php if($data->getTestReports->count() != 0): ?>
																				
																			<?php endif; ?>
																		<?php elseif($subscribe_check ==1): ?>
																			<span class="text-soft">Subscribed: </span> <span>Yes</span>
																		<?php else: ?>
																			<span class="text-soft">Subscribed: </span> <span>No</span>
																		<?php endif; ?>
																	<?php endif; ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sp-pdl-btn">
                                                        <?php if($data->type==0): ?>
                                                            <a href="<?php echo e(route('previousYearTestIndex',['category' => $subject->subject->slug,'sub_category' => $subject->slug,'test_slug' => $data->slug])); ?>" class=" <?php echo e(Auth::check()?'':'test_attend'); ?> btn btn-primary text-uppercase">Take Test</a>
                                                        <?php elseif($subscribe_check ==1): ?>
                                                            <a href="<?php echo e(route('previousYearTestIndex',['category' => $subject->subject->slug,'sub_category' => $data->slug,'test_slug' => $data->slug])); ?>" class="btn btn-primary text-uppercase">Take Test</a>
                                                        <?php else: ?>
                                                            <a class="btn btn-danger text-uppercase pay_now"  style="color: white" data-batch-id="<?php echo e($subject->subject['id']); ?>" data-amount="<?php echo e($subject->subject['price']); ?>" data-id="<?php echo e((Auth::user()==null)? "" : (Auth::User()->id)); ?>"><i class="fas fa-shopping-cart"></i>&nbsp;Buy</a>
                                                        <?php endif; ?>
                                                    </div>
                                                </li>


												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<div class="modal fade" tabindex="-1" id="paymentModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header" style="align-self: center">
                    <h5 class="text-uppercase">Select Course</h5>
                </div>

                <div class="modal-body">
                    <form action="#" id="form_calc" class="form-validate is-alter">

                    <span class="text-danger" id="alert" style="display: none"><i class="fas fa-info-circle"></i>&nbsp;Atleast Select One Course</span>
                    <div id="contentdiv"></div>
                    <input type="hidden" id="course_ids" data-value="" value="">
                    <input type="hidden" id="course_price" value="">
                </div>

                <div class=" text-center bg-success">
                    <center>
                        <button id="price" type="submit" style=" width:100%; cursor: pointer"
                            class="text-dark pt-3 pb-3 text-center btn-success sub-text">Pay Rs.&nbsp;<span>0</span>/-
                        </button>
                    </center>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<?php if(auth()->guard()->check()): ?>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    jQuery(document).ready(function ($) {

        $("#form_calc").change(function () {

            var totalPrice = 0,
                values = [];
            ids = [];
            $('input[type=checkbox], input[type=radio]').each(function () {
                if ($(this).is(':checked')) {
                    values.push($(this).attr('data-price'));
                    ids.push($(this).val());
                    totalPrice += parseInt($(this).attr('data-price'));
                }
            });
            $("#price span").text(totalPrice);
            $('#course_price').val(totalPrice);
            $('#course_ids').data('value', ids);
        });

    });

</script>


<script>
    $(document).on("click", ".pay_now", function (event) {
        $('#course_ids').val('');
        $('#course_price').val('');
        $("#price span").text('0');
        let href = "<?php echo e(route('pyq-course-list')); ?>";
        var emailCheck = '<?php echo e(!empty(Auth::user()->email)?'200':'400'); ?>'
        var phoneCheck = '<?php echo e(!empty(Auth::user()->phone)?'200':'400'); ?>'
        if ( phoneCheck == 400 || emailCheck == 400 )  {
            $('#profileDetailError').html("");
            document.getElementById('profileDetailsForm').reset();
            $('#profileDetailsModal').modal('show')
         }else{

        $.ajax({
            url: href,
            // return the result
            success: function (result) {
                $("#paymentModal").modal("show");
                document.getElementById('contentdiv').innerHTML = "";
                var result = (result.html);
                var indexdiv = $('#contentdiv'); //create wrapper element
                indexdiv.append(result); //move element into wrapper
                $("#contentdiv").html(result).append();
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
         }
    });

</script>




<script>
    var SITEURL = '<?php echo e(URL::to('/')); ?>';
    $('#form_calc').on('submit', function (e) {
        e.preventDefault();
        checked = $("input[type=checkbox]:checked").length;
        if (!checked) {
            $('#alert').show()
            $('#alert').fadeOut(2000)
            return false;
        }
        $("#paymentModal").modal('hide');
        var totalAmount = $('#course_price').val();
        var batchid = $('#course_ids').data('value');
        var course_id = 3;
        var id = $(this).attr("data-id");
        var order_id = '';
        // var encrypted_id = '<?php echo e(Crypt::encryptString($subject->id)); ?>';
        // console.log(batchid);
        $.ajax({
            url: '<?php echo e(route('checkboxMethodPayment')); ?>',
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
                if (response.status === 666) {
                    Swal.fire({
                        text: 'Our Secutiy System Detected something strange.',
                        imageUrl: SITEURL+'/images/ban.jpg',
                        imageWidth: 500,
                        imageHeight: 400,
                        imageAlt: 'SECURITY BREACH',
                    });
                    location.reload(true);
                }
            }
        });


        var options = {
            "key": "<?php echo e(Config::get('app.razorpay_key')); ?>",
            "amount": (totalAmount * 100), // 2000 paise = INR 20
            "currency": "INR",
            "email": "<?php echo e(Auth::user()->email); ?>",
            "name": "<?php echo e(Auth::User()->name); ?>",
            "image": "<?php echo e(asset(@$globalSettings->logo)); ?>",
            "handler": function (response) {
                $("#loader").show();
                $.ajax({
                    url: "<?php echo e(route('buyAnyPYQ')); ?>",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        'payment_id': response.razorpay_payment_id,
                        'amount': totalAmount,
                        'response': response,
                        'batch_id': batchid,
                        '_token': '<?php echo e(csrf_token()); ?>',
                        'order_id': order_id,
                        'course_id': 3,
                    },
                    success: function (msg) {
                        if (msg.status == true) {
                            $('#payment-loader').css('display', 'none')
                            window.location.href = msg.thankyou;
                        }
                        if (msg.status === 666) {
                    Swal.fire({
                        text: 'Our Secutiy System Detected something strange.',
                        imageUrl: SITEURL+'/images/ban.jpg',
                        imageWidth: 500,
                        imageHeight: 400,
                        imageAlt: 'SECURITY BREACH',
                    });
                    location.reload(true);
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
            }
        };
        var rzp1 = new Razorpay(options);

        rzp1.open();

        rzp1.on('payment.failed', function (response) {
            var err = (response.error);

            $.ajax({
                url: "<?php echo e(route('payfailure')); ?>",
                type: 'post',
                data: {
                    payment_id: response.razorpay_payment_id,
                    amount: totalAmount,
                    response: response.error,
                    batch_id: batchid,
                    order_id: order_id,
                    _token: '<?php echo e(csrf_token()); ?>',
                    course_id: 3,
                },

            });

        });
    });

    $('.pay_all_now').on('click', function () {

        var totalAmount = $(this).attr("data-amount");
        var batchid = "PREMIUM";
        var course_id = 2;
        var id = $(this).attr("data-id");
        var order_id = '';
        var encrypted_id = '<?php echo e(Crypt::encryptString($subject->id)); ?>';
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
            "image": "<?php echo e(asset('/images/logo.png')); ?>",
            "handler": function (response) {
                $("#loader").show();
                $.ajax({
                    url: SITEURL + '/payment/pay-success',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        'payment_id': response.razorpay_payment_id,
                        'amount': totalAmount,
                        'response': response,
                        'batch_id': batchid,
                        '_token': '<?php echo e(csrf_token()); ?>',
                        'order_id': order_id,
                        'course_id': 2,
                    },
                    success: function (msg) {
                        if (msg.status == true) {
                            $('#payment-loader').css('display', 'none')
                            window.location.href = msg.thankyou;
                        } else if (msg.banned == 1) {
                            Swal.fire({
                                text: 'Our Secutiy System Detected something strange.',
                                imageUrl: SITEURL + '/images/ban.jpg',
                                imageWidth: 500,
                                imageHeight: 400,
                                imageAlt: 'SECURITY BREACH',
                            })
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
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();

        rzp1.on('payment.failed', function (response) {
            var err = (response.error);

            $.ajax({
                url: SITEURL + '/payment/pay-failure',
                type: 'post',
                data: {
                    payment_id: response.razorpay_payment_id,
                    amount: totalAmount,
                    response: response.error,
                    batch_id: batchid,
                    order_id: order_id,
                    _token: '<?php echo e(csrf_token()); ?>',
                    course_id: 2,
                },

            });

        });
    });

</script>
<?php endif; ?>

<script>
    var url = window.location.href;

    if (url.search("razorpay") >= 0) {
        $('.pay_now').click();
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.Layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/website/previous-year-question/test-index.blade.php ENDPATH**/ ?>