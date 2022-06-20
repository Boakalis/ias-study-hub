<?php $__env->startSection('meta_title'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title',$test->name .' | Daily Quiz | IAS StudyHub'); ?>
<?php $__env->startSection('content'); ?>

<div class="nk-content ">
	<div class="container-fluid">
		<div class="nk-content-inner">
			<div class="nk-content-body">
				<div class="nk-block">
					<div class="card card-bordered card-stretch">
						<div class="card-inner-group">
							<!-- .card-inner -->
							<!-- .card-inner -->
                            <div class="card-inner">
                                <div class="card-title-group">
                                    <h3 class="nk-block-title page-title" style=" font-size: 20px; "><?php echo e($test->name); ?>  - <?php echo e(date("M",strtotime($test->date))); ?> - <?php echo e(date("Y",strtotime($test->date))); ?></h3>
								</div><!-- .card-title-group -->

							</div>
                            <div id="result-html">
                                <form action="<?php echo e(route('quizsubmit',$test->id)); ?>" id="sessionupdate"  method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="card-inner">
                                        <div class="">
                                                <div>
                                                    <div class="">
                                                        <?php if(sizeOf($test->questions)>0): ?>
                                                        <?php $__currentLoopData = $test->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="test-questions w-100 d-block mb-4" style="min-height:auto;">
                                                            <h5 class="card-title text-success pb-1">Question <?php echo e($unique=$key+1); ?>:</h5>
                                                            <div class="card-text text-questions-details"><?php echo $question->question['question']; ?></div>
                                                            <div class="custom-control custom-radio mr-3">
                                                                <input type="radio" id="quest1ans1<?php echo e($question->question->id); ?>"  name="questionans[<?php echo e($question->question->id); ?>]" class="custom-control-input"  value="1" >
                                                                <label class="custom-control-label w-100" for="quest1ans1<?php echo e($question->question->id); ?>"><?php echo $question->question['option_1']; ?> </label>
                                                            </div>
                                                            <div class="custom-control custom-radio mr-3">
                                                                <input type="radio" id="quest1ans2<?php echo e($question->question->id); ?>"  name="questionans[<?php echo e($question->question->id); ?>]" class="custom-control-input"  value="2">
                                                                <label class="custom-control-label w-100" for="quest1ans2<?php echo e($question->question->id); ?>"><?php echo $question->question['option_2']; ?> </label>
                                                            </div>
                                                            <div class="custom-control custom-radio mr-3">
                                                                <input type="radio" id="quest1ans3<?php echo e($question->question->id); ?>"   name="questionans[<?php echo e($question->question->id); ?>]" class="custom-control-input"  value="3">
                                                                <label class="custom-control-label w-100" for="quest1ans3<?php echo e($question->question->id); ?>"><?php echo $question->question['option_3']; ?> </label>
                                                            </div>
                                                            <div class="custom-control custom-radio mr-3">
                                                                <input type="radio" id="quest1ans4<?php echo e($question->question->id); ?>"  name="questionans[<?php echo e($question->question->id); ?>]" class="custom-control-input"  value="4">
                                                                <label class="custom-control-label w-100" for="quest1ans4<?php echo e($question->question->id); ?>"><?php echo $question->question['option_4']; ?> </label>
                                                            </div>
                                                        </div>

                                                        <div class="clear"></div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                        <span>Test Under Maintance</span>

                                                        <?php endif; ?>
                                                        <input type="hidden" name="id" id="id" value="<?php echo e($test->id); ?>" />
                                                        <input type="hidden"  name="course_id" value= "4">

                                                    </div>
                                                </div><!-- .nk-ibx-list -->

                                            <!-- .pagination-goto -->
                                        </div><!-- .nk-block-between -->
                                    </div><!-- .card-inner -->
                                    <div class="card-inner">
                                        <div class="g-3">
                                            <button type="submit" class="btn btn-success" id="submit-test" onclick="submitDetailsForm(this);" data-id="<?php echo e($test->id); ?>"><i class="icon ni ni-check"></i> Submit</button>
                                            <!-- .pagination-goto -->
                                        </div><!-- .nk-block-between -->
                                    </div><!-- .card-inner -->
                                </form>
                            </div>
						</div><!-- .card-inner-group -->
					</div><!-- .card -->
				</div><!-- .nk-block -->
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>

<script>
    $('#submit-test').on("click" ,function () {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    });
</script>



<script>
	function submitDetailsForm(d) {
		event.preventDefault();
		let id = $(d).data('id');
		$.ajax({
		    url: "/daily-quiz/test-submit/" + id,
		    type: 'post',
		    data: $("#sessionupdate").serialize(),
            beforeSend: function () {
                // Show image container
                $("#loader").show();
            },

		    success: function (result) {
                $('#result-html').html(result.html)
		    },
            complete: function (response) {
                $("#loader").hide();
            },

		});
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


<?php echo $__env->make('website.Layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/website/daily-quiz/test-page.blade.php ENDPATH**/ ?>