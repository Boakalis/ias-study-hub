<div class="card-inner">
    <div class="quiz-result">
		<div>
			<div class="">
				<?php $__currentLoopData = $questions_html; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="p-2">
					<h5 class="card-title text-success ">Question <?php echo e($key+1); ?>:</h5>
					<div class="text-questions-details "><?php echo $question['question']; ?></div>
					<ul class="list-group">
						<?php for($i=1;$i<=4;$i++): ?>
						<?php ($option ='option_'.$i); ?>
						<li class="list-group-item
						<?php if($question['answers']  == $i && $question['user_answer'] == $i): ?>
						list-group-item-success
						<?php elseif($question['answers']  == $i && $question['user_answer'] != $i ): ?>
						list-group-item-success
						<?php elseif($question['answers']  != $i&& $question['user_answer'] == $i ): ?>
						list-group-item-danger
						<?php else: ?>
						<?php endif; ?>
						">
						<?php echo $question[$option]; ?>

							<?php if($question['answers']  == $i && $question['user_answer'] == $i): ?>
							<span class="btn btn-sm btn-light float-right bg-white"><i class="fa fa-check text-success"></i></span>
                            <?php elseif($question['answers']  == $i && $question['user_answer'] != $i): ?>
                            <span class="btn btn-sm btn-light float-right bg-white"><i class="fa fa-check text-success"></i></span>
							<?php elseif($question['answers']  != $i&& $question['user_answer'] == $i ): ?>
							<span class="btn btn-sm btn-light float-right bg-white"><i class="fa fa-times text-danger"></i></span>
							<?php endif; ?>
						</li>
						<?php endfor; ?>
					</ul><br>
                    <h5 class="card-title text-info ">Explanation:</h5>
                    <div class="question-explanation-details">
                    <?php echo $question['explanation']; ?></div>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
	</div>
</div>



<?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/website/daily-quiz/result-page.blade.php ENDPATH**/ ?>