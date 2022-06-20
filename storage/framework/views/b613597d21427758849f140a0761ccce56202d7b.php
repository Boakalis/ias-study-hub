<?php ($generalSetting = \App\Models\SettingGeneral::first()); ?>

<?php $__env->startSection('title',ucwords($test_questions->name).' | '.$test_questions->category->category.' | '.$test_questions->subject->subject); ?>
<?php $__env->startSection('content'); ?>

<div class="nk-content p-0">
   <div class="container-fluid p-0">
      <div class="nk-content-inner">
         <div class="nk-content-body">
            <div class="nk-block">
               <form action="<?php echo e(route('resultUpdate',$test_questions->id)); ?>" method="POST" id="sessionupdate"  enctype="multipart/form-data" >
                  <?php echo csrf_field(); ?>
                  <div class="card card-bordered">
                     <div class="card-aside-wrap test-questions">
                        <div class="card-inner card-inner-lg p-0">
                           <div class="nk-block">
                              <div class="card-header bg-white border-bottom position-fixed-top">
                                 <h5 class="text-primary">
                                    <span class="text-uppercase current-exam-title" ><?php echo e($test_questions->name); ?></span>
                                    <div class="float-right">
                                       <span class="d-inline-block text-center">
                                       </span>
                                       <div class="d-lg-none d-inline-block">
                                          <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                       </div>
                                    </div>
                                    <span class="float-right min-remainig text-center  text-danger"><i class="far fa-clock"></i>
                                    <span id="time" class="" data-time="<?php echo e($test_questions->duration); ?>" ><?php echo e($test_questions->duration); ?>:00
                                    </span>
                                    </span>
                                 </h5>
                              </div>
                              <div class="card-body mt-5 mb-5">
                                 <div class="mh-vh100">
                                    <?php if($question_count >0): ?>
                                    <?php ($question_key = 1); ?>
                                    <?php $__currentLoopData = $test_questions->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="question-ans quiz-type" data-id="<?php echo e($question->question->id); ?>" data-simplebar
                                       style="display:<?php echo e(($question_key ==1)?'block':'none'); ?>" id="question-<?php echo e($question_key); ?>">
                                       <div class="">
                                          <div class="test-questions w-100 d-block mb-4">
                                             <h5 class="card-title" >
                                                Question <?php echo e($question_key); ?>

                                                
                                             </h5>
                                             <div class="card-text text-questions-details"><?php echo $question->question->question; ?></div>
                                             <div class="custom-control custom-radio mr-3 p-0 text-left">
                                                <input type="radio"  id="questans-<?php echo e($question->question->id); ?>-1" name="questionans[<?php echo e($question->question->id); ?>]" class="custom-control-input option-answer" value="1" data-question-id="<?php echo e($question_key); ?>"  data-option="1"  data-correct-answer="<?php echo e($question->question->answers); ?>">
                                                <label class="custom-control-label  w-100" for="questans-<?php echo e($question->question->id); ?>-1"><?php echo $question->question->option_1; ?><span class="err-<?php echo e($question_key); ?>" data-option="1"></span></label>
                                             </div>
                                             <div class="custom-control custom-radio mr-3  p-0 text-left">
                                                <input type="radio"  id="questans-<?php echo e($question->question->id); ?>-2" name="questionans[<?php echo e($question->question->id); ?>]" class="custom-control-input option-answer" value="2" data-question-id="<?php echo e($question_key); ?>"  data-option="2"  data-correct-answer="<?php echo e($question->question->answers); ?>">
                                                <label class="custom-control-label  w-100" for="questans-<?php echo e($question->question->id); ?>-2"><?php echo $question->question->option_2; ?><span class="err-<?php echo e($question_key); ?>" data-option="2"></span></label>
                                             </div>
                                             <div class="custom-control custom-radio mr-3  p-0 text-left">
                                                <input type="radio"  id="questans-<?php echo e($question->question->id); ?>-3" name="questionans[<?php echo e($question->question->id); ?>]" class="custom-control-input option-answer" value="3" data-question-id="<?php echo e($question_key); ?>"  data-option="3"  data-correct-answer="<?php echo e($question->question->answers); ?>">
                                                <label class="custom-control-label  w-100" for="questans-<?php echo e($question->question->id); ?>-3"><?php echo $question->question->option_3; ?><span class="err-<?php echo e($question_key); ?>" data-option="3"></span></label>
                                             </div>
                                             <div class="custom-control custom-radio mr-3  p-0 text-left">
                                                <input type="radio" id="questans-<?php echo e($question->question->id); ?>-4" name="questionans[<?php echo e($question->question->id); ?>]" class="custom-control-input option-answer" value="4" data-question-id="<?php echo e($question_key); ?>"  data-option="4"  data-correct-answer="<?php echo e($question->question->answers); ?>">
                                                <label class="custom-control-label  w-100" for="questans-<?php echo e($question->question->id); ?>-4"><?php echo $question->question->option_4; ?><span class="err-<?php echo e($question_key); ?>" data-option="4"></span></label>
                                             </div>
                                          </div>
                                          <div class="clear"></div>
                                       </div>
                                    </div>
                                    <?php ($question_key++); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    <div class="explanation-section">
                                       <div id="mark-as-review">
                                       </div>
                                       <input type="hidden" value="<?php echo e($test_questions->type); ?>" name="type"  >
                                       <input type="hidden"  name="course_id" value= "2">
                                       <input type="hidden"  name="correct" value= "0" id="positive" >
                                       <input type="hidden"  name="incorrect" value= "0" id="negative" >
                                       <input type="hidden" name="test_name" value="<?php echo e($test_questions['name']); ?>">
                                       <input type="hidden" name="series_name" value="<?php echo e($test_questions->category['category']); ?>">
                                       <input type="hidden" name="batch_name" value="<?php echo e($test_questions->subject['subject']); ?>">
                                       <div>
                                          <?php ($question_key = 1); ?>
                                          <?php $__currentLoopData = $test_questions->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <div class="explanation-answer" id="question-explanation-<?php echo e($question_key); ?>" style="display: none">
                                             <P>Correct Answer: <?php echo e($question->question->answers); ?></P>
                                             <p>Explanation :</p>
                                             <div class="question-explanation-details"><?php echo $question->question->explanation; ?></div>
                                          </div>
                                          <?php ($question_key++); ?>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="card-footer text-muted test-buttons bg-white test-buttons border-top position-fixed-bottom">
                                 <button type="button" class="btn btn-outline-danger text-uppercase font-weight-bolder rounded-0" id="previous"><i class="icon ni ni-chevron-left"></i> <span class="btn-label  " title="previous">Previous</span></button>
                                 <button type="button" class="btn btn-outline-danger text-uppercase font-weight-bolder rounded-0" id="next"><span class="btn-label  " title="Save & Next">Save & Next </span><i class="icon ni ni-chevron-right"></i> </button>
                                 <button type="button"  class="btn btn-primary exam-submit text-uppercase font-weight-bolder rounded-0" title="Submit" data-toggle="modal" data-target="#submit-quiz"><i class="icon ni ni-check"></i> Submit</button>
                              </div>
                           </div>
                           <!-- .nk-block -->
                        </div>
                        <div class="card-aside card-aside-right user-aside toggle-slide toggle-slide-left toggle-break-lg test-answers" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                           <div class="card-inner-group" data-simplebar>
                              <div class="card-inner p-0  answer-bg">
                                 <div class="card-header">
                                    <div class="test-answers-info mb-2">
                                       <div class="btn-group btn-group-md d-block" role="group" aria-label="Basic example">
                                          <button type="button" class="btn btn-success rounded-0"><span id="answered_count" title="Answered">1 </span> Attempted</button>
                                          <button type="button" class="btn btn-danger rounded-0"><span id="review_count" title="Not Answered">2 </span> Review</button>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="card-body">
                                    <div class="test-answers-list mb-5">
                                       <ul>
                                          <?php if($question_count > 0): ?>
                                          <?php for($i=1;$i<=$question_count;$i++): ?>
                                          <li><span class=" btn btn-md
                                             <?php echo e(($i ==1)?'btn-secondary':'btn-outline-secondary'); ?> question" title="Question" data-qno="<?php echo e($i); ?>" id="question-button-<?php echo e($i); ?>"><?php echo e($i); ?></span></li>
                                          <input type="hidden" name="questionarray[<?php echo e($i); ?>]" id="totalquestion" value="<?php echo e($i); ?>">
                                          <?php endfor; ?>
                                          <?php endif; ?>
                                       </ul>
                                    </div>
                                 </div>
                                 
                              </div>
                              <!-- .card-inner -->
                           </div>
                           <!-- .card-inner-group -->
                        </div>
                        <!-- card-aside -->
                     </div>
                     <!-- .card-aside-wrap -->
                  </div>
                  <!-- .card -->
               </form>
            </div>
            <!-- .nk-block -->
         </div>
      </div>
   </div>
</div>
<!-- Modal Content Code -->
<div class="modal fade zoom submit-modal" tabindex="-1">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <a href="#" class="close" data-dismiss="modal" aria-label="Close">
         <em class="icon ni ni-cross"></em>
         </a>
         <!-- <div class="modal-header">
            <h5 class="modal-title">Complete Quiz</h5>
            </div> -->
         <div class="modal-body modal-body-md text-center">
            <h4 class="modal-title">Are you sure want to complete?</h4>
            <br>
            <div class="row">
               <div class="col-md-6">
                  <h6>Total Question : <?php echo e($question_count); ?> </h6>
               </div>
               <div class="col-md-6">
                  <h6 id="modal-answered-count">Answered : </h6>
               </div>
            </div>
            <br>
            <div class="row">
               <div class="col-md-6">
                  <h6 id="modal-review-count" name="review">Review :    </h6>
               </div>
               <div class="col-md-6">
                  <h6 id="modal-not-attempt-count" name="not attempt">Not Attempt :    </h6>
               </div>
            </div>
            <br>
            <div class="text-center">
               <button type="button" class="btn btn-danger close-modal" data-bs-dismiss="modal">No</button>
               <button type="button" class="btn btn-success" id="submit-test" >Yes</button>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- content @e  -->
<div class="modal fade zoom" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <div class="row w-100">
               <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 ">
                  <img style="" src="<?php echo e(asset($test_questions->subject['image'])); ?>" alt="">
               </div>
               <div class="col-md-7 col-lg-7 col-sm-7 col-xs-7 ">
                  <h5 class="mt-2 mb-2" ><?php echo e($test_questions->name); ?></h5>
                  <span>SUBJECT : <?php echo e($test_questions->subject['subject']); ?></span><br>
                  <span>TOPIC : <?php echo e($test_questions->category['category']); ?></span>
               </div>
               <div class="col-md-2 mt-2 mb-2 col-lg-2 col-sm-2 col-xs-2 ">
                  <a href="<?php echo e(url()->previous()); ?>" class=" float-right  btn btn-light" >Back</a>
               </div>
            </div>
         </div>
         <div class="modal-body" id="showBody">
            <div class="row">
               <div class="col-md-4 col-sm-12 col-xs-4 col-lg-4 ">
                  <div class="row">
                     <h5 class="col-md-12 col-sm-12 col-xs-12 col-lg-12" >Test Details:</h5>
                     <table class="table table-bordered table-md table-striped">
                        <tbody>
                           <tr>
                              <td><i class="far fa-clipboard fa-lg text-info font-24 mr-1"></i> Questions</td>
                              <th><?php echo e($test_questions->questions->count()); ?> </th>
                           </tr>
                           <tr>
                              <td><i class="far fa-check-circle fa-lg text-danger font-24 mr-1"></i> Minutes</td>
                              <th><?php echo e($test_questions->duration); ?></th>
                           </tr>
                           <tr>
                              <td><i class="far fa-clipboard fa-lg text-success font-24 mr-1"></i> Total Marks</td>
                              <th><?php echo e(($test_questions->questions->count())*($test_questions->mark)); ?></th>
                           </tr>
                           
                        </tbody>
                     </table>
                     
                  </div>
               </div>
               <div class="col-md-8 col-sm-8 col-xs-8 col-lg-8 list list-lg list-checked-circle list-success ">
                  <h5>Test Instructions:</h5>
                  <p>
                  <ul>
                     <li>
                        The exam comprises of the following types of questions: - Multiple Choice Single Response (MCSR) - Multiple Choice Multiple Response (MCMR) <br>
                     </li>
                     <li>There is a timer at the upper-right corner of the exam screen that indicates the time remaining for the completion of the exam.</li>
                  </ul>
                  </p>
               </div>
            </div>
         </div>
         <div class="modal-footer" style="justify-content: center" >
            <a href="<?php echo e(url()->previous()); ?>" class=" " data-dismiss="modal" aria-label="Close">
            <button  class=" text-dark btn btn-success btn-lg">Proceed</button>
            </a>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
   var wrongmark = 0 ;
   var correctmark = 0 ;

    var question_no = 1;
    var review_count = answered_count = 0;
    var not_attempt = "<?php echo e($question_count); ?>";
    var mark_for_review = [];
    var question_id=$('.question-ans').data('id');
    $(function(){
      updateCount();
    })

    function updateCount(){
        $('#review_count').html(review_count);
        $('#answered_count').html(answered_count);
        $('#modal-review-count').html('Review : '+review_count);
        $('#modal-answered-count').html('Answered : '+answered_count);
        $('#modal-not-attempt-count').html('Not Attempt : '+not_attempt)
    }

    $('.question').on('click',function(){

        /** Change Question Button Color to Normal */
        $('#question-button-'+question_no+'.question').removeClass('btn-secondary');
        if($('#question-button-'+question_no+'.question').hasClass('btn-success') != 1){
            $('#question-button-'+question_no+'.question').addClass('btn-outline-secondary');
        }

        /** Hide All Questions */
        $('.question-ans').css('display','none');

        /** Change Button Color to Active */
        $(this).removeClass('btn-outline-secondary');

        if($(this).hasClass('btn-success') != 1){
            $(this).addClass('btn-secondary');
        }

         /** Show Question based on Number */
        question_no = $(this).data('qno');
        $('#question-'+question_no).css('display','block');

        /** Show Hide Explanation */
        $('.explanation-answer').css('display','none');
        if($('input:radio.option-answer[data-question-id='+ question_no +']').is(":checked")){
            $('#question-explanation-'+question_no).css('display','block');
             $('input:radio.option-answer[data-question-id='+ question_no +']').prop("disabled","true");
        }

    })

    $('.option-answer').on('click',function(){

         /** Change Button Color to Answered */
        var question = $(this).data('question-id');
        var correct_answer   = $(this).val();
        var user_answer = $(this).data('correct-answer');


        $('#question-button-'+question+'.question').removeClass('btn-secondary');
        $('#question-button-'+question+'.question').removeClass('btn-danger');
        if($('#question-button-'+question_no+'.question').hasClass('btn-success') != 1){
             answered_count+=1;
             not_attempt-=1;
        }
        $('#question-button-'+question+'.question').addClass('btn-success');


        /** Show Correct Answer Span Tag **/
        if(correct_answer != user_answer){

            $('.err-'+question+'[data-option='+correct_answer+']').html('<span class="btn mr-1 btn-light  float-right"><i class="fa fa-times text-danger"></i></span>')
            $('.err-'+question+'[data-option='+correct_answer+']').closest('.custom-control-label').addClass('text-white bg-danger border-danger');
            $('.err-'+question+'[data-option='+user_answer+']').html('<span class="btn mr-1 btn-light float-right"><i class="fa fa-check text-success "></i></span>')
            $('.err-'+question+'[data-option='+user_answer+']').closest('.custom-control-label').addClass('text-white bg-success border-success');
            wrongmark++;
            $("#negative").val(wrongmark);
        }else{

            $('.err-'+question+'[data-option='+user_answer+']').html('<span class="btn mr-1 btn-light float-right"><i class="fa fa-check text-success "></i></span>')
            $('.err-'+question+'[data-option='+user_answer+']').closest('.custom-control-label').addClass('text-white bg-success border-success');
             correctmark++;
             $("#positive").val(correctmark);
        }
            /** Show Correct Answer Span Tag **/
             /*   if(correct_answer != user_answer){

            $('.err-'+question+'[data-option='+correct_answer+']').html('<span class="btn mr-1 btn-danger float-right"><i class="fa fa-times "></i></span>')
            $('.err-'+question+'[data-option='+correct_answer+']').closest('.custom-control-label').addClass('border-danger');
            $('.err-'+question+'[data-option='+user_answer+']').html('<span class="btn mr-1 btn-success float-right"><i class="fa fa-check "></i></span>')
            $('.err-'+question+'[data-option='+user_answer+']').closest('.custom-control-label').addClass('border-success');
            }else{

            $('.err-'+question+'[data-option='+user_answer+']').html('<span class="btn mr-1 btn-success float-right"><i class="fa fa-check "></i></span>')
            $('.err-'+question+'[data-option='+user_answer+']').closest('.custom-control-label').addClass('border-success');

            }
            */

        /** Show Hide Explanation */
        $('.explanation-answer').css('display','none');
        $('#question-explanation-'+question).css('display','block');
        $('input:radio.option-answer[data-question-id='+ question +']').prop("disabled","true");

        updateCount();

    })


    $('#next').on('click',function()
    {
            var count = "<?php echo e($question_count); ?>";

             /** Change Question Button Color to Normal */
            $('#question-button-'+question_no+'.question').removeClass('btn-secondary');
                if($('#question-button-'+question_no+'.question').hasClass('btn-success') != 1 && $('#question-button-'+question_no+'.question').hasClass('btn-danger') != 1){
                    $('#question-button-'+question_no+'.question').addClass('btn-outline-secondary');
            }

            question_no+=1;

             /** Change Current question to Next question
                  If Last Question comes Disable the Next Button
              */
            if(count >= question_no){

                /** Show Next Question */
                $('.question-ans').css('display','none');
                $('#question-'+question_no).css('display','block');

                /** Change Button Color to Visited */
                $('#question-button-'+question_no+'.question').removeClass('btn-outline-secondary');
                if($('#question-button-'+question_no+'.question').hasClass('btn-success') != 1){
                    $('#question-button-'+question_no+'.question').addClass('btn-secondary');
                }

               /** Show Hide Explanation */
                $('.explanation-answer').css('display','none');
                if($('input:radio.option-answer[data-question-id='+ question_no +']').is(":checked")){
                    $('#question-explanation-'+question_no).css('display','block');
                     $('input:radio.option-answer[data-question-id='+ question_no +']').prop("disabled","true");
                }


            }else{
                question_no-=1;
                /** Change Button Color to Visited */
                $('#question-button-'+question_no+'.question').removeClass('btn-outline-secondary');
                if($('#question-button-'+question_no+'.question').hasClass('btn-success') != 1){
                    $('#question-button-'+question_no+'.question').addClass('btn-secondary');
                }
                $('.submit-modal').modal('show');
            }

    })

    $('.close-modal').click(function(){
        $('.submit-modal').modal('hide');
    })

    $('.exam-submit').click(function(){
        $('.submit-modal').modal('show');
    })

    $('#previous').on('click',function()
    {
        if(question_no != 1){

             /** Change Question Button Color to Normal */
            $('#question-button-'+question_no+'.question').removeClass('btn-secondary');
            if($('#question-button-'+question_no+'.question').hasClass('btn-success') != 1 && $('#question-button-'+question_no+'.question').hasClass('btn-danger') != 1){
                $('#question-button-'+question_no+'.question').addClass('btn-outline-secondary');
            }

            question_no-=1;

            /** Change Question Button Color to Normal */
            $('#question-button-'+question_no+'.question').removeClass('btn-outline-secondary');
            if($('#question-button-'+question_no+'.question').hasClass('btn-success') != 1 && $('#question-button-'+question_no+'.question').hasClass('btn-danger') != 1){
                $('#question-button-'+question_no+'.question').addClass('btn-secondary');
            }

            $('.question-ans').css('display','none');
            $('#question-'+question_no).css('display','block');

            /** Show Hide Explanation */
            $('.explanation-answer').css('display','none');
            if($('input:radio.option-answer[data-question-id='+ question_no +']').is(":checked")){
                $('#question-explanation-'+question_no).css('display','block');
                 $('input:radio.option-answer[data-question-id='+ question_no +']').prop("disabled","true");
            }

        }
    })


    $('#submit-test').on('click',function(){
        $('form#sessionupdate').submit();
    })


</script>
<script>
   $(window).on('load',function(){
       $('#showModal').modal('show');
    });
</script>
<script>
   $('#showModal').on('hidden.bs.modal', function () {
       let mint = $('#time').data('time');
       if ($('#time').length) {

           function countdown( elementName, minutes, seconds )
           {
               var element, endTime, hours, mins, msLeft, time;
               function twoDigits( n )
               {
                   return (n <= 9 ? "0" + n : n);
               }
               function updateTimer()
               {
                   msLeft = endTime - (+new Date);
                   if ( msLeft < 1000 ) {
                       element.innerHTML = "Time is up!";
                       window.onbeforeunload = null;
                       $('form#sessionupdate').submit();

                   } else {
                       time = new Date( msLeft );
                       hours = time.getUTCHours();
                       mins = time.getUTCMinutes();
                       element.innerHTML = (hours ? hours + ':' + twoDigits( mins ) : mins) + ':' + twoDigits( time.getUTCSeconds() );
                       setTimeout( updateTimer, time.getUTCMilliseconds() + 500 );
                   }
               }
               element = document.getElementById( elementName );
               endTime = (+new Date) + 1000 * (60*minutes + seconds) + 500;
               updateTimer();
           }

           countdown( "time", mint, 0 );
       }

   });
</script>
<script>
   $('#sessionupdate').on('submit',function(){
       $('#test-loader').css('display','block');
   })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.TestLayout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/website/question-bank/testpage.blade.php ENDPATH**/ ?>