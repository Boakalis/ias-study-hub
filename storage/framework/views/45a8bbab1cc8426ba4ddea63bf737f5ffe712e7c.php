<?php $__env->startSection('title','DAILY QUIZ'); ?>
<?php $__env->startSection('content'); ?>

<!-- content @s  -->
<div class="nk-content ">

    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-aside-wrap">
                            <div class="card-inner card-inner-md">
                                <div class="nk-block-head nk-block-head-md">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h4 class="nk-block-title text-uppercase ">Daily Quiz</h4>

                                            <div class="nk-block-des">
                                                <p></p>
                                            </div>
                                        </div>
                                        <a href="<?php echo e(url()->previous()); ?>" class="float-right " ><em class="icon ni ni-arrow-left backarrow"></em> </a>

                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block ">

                                    <div class="row">
                                        <?php if(!$years->isEmpty()): ?>
                                        <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-xl-3">
                                            <div class="card daily-quiz-box">
                                                
                                                <a href="<?php echo e(route('getDailyQuizList',['year' => $year->year,'month' => $year->month])); ?>"
                                                    class="btn btn-hover color-1 text-center text-uppercase " style="border-radius:0%" >
                                                    <?php switch($year->month):
                                                        case ($year->month = 1): ?>
                                                            <span class="text-center" > January&nbsp;<?php echo e($year->year); ?></span>
                                                            <?php break; ?>
                                                        <?php case ($year->month = 2): ?>
                                                            <span class="text-center" > Febuary&nbsp;<?php echo e($year->year); ?></span>
                                                            <?php break; ?>
                                                        <?php case ($year->month = 3): ?>
                                                            <span class="text-center" > March&nbsp;<?php echo e($year->year); ?></span>
                                                            <?php break; ?>
                                                        <?php case ($year->month = 4): ?>
                                                            <span class="text-center" > April&nbsp;<?php echo e($year->year); ?></span>
                                                            <?php break; ?>
                                                        <?php case ($year->month = 5): ?>
                                                            <span class="text-center" > May&nbsp;<?php echo e($year->year); ?></span>
                                                            <?php break; ?>

                                                        <?php case ($year->month = 6): ?>
                                                            <span>June&nbsp;<?php echo e($year->year); ?></span>
                                                            <?php break; ?>
                                                        <?php case ($year->month = 7): ?>
                                                            <span>July&nbsp;<?php echo e($year->year); ?></span>
                                                            <?php break; ?>
                                                        <?php case ($year->month = 8): ?>
                                                            <span>August&nbsp;<?php echo e($year->year); ?></span>
                                                            <?php break; ?>
                                                        <?php case ($year->month = 9): ?>
                                                            <span>September&nbsp;<?php echo e($year->year); ?></span>
                                                            <?php break; ?>
                                                        <?php case ($year->month = 10): ?>
                                                            <span>October&nbsp;<?php echo e($year->year); ?></span>
                                                            <?php break; ?>
                                                        <?php case ($year->month = 11): ?>
                                                            <span>November&nbsp;<?php echo e($year->year); ?></span>
                                                            <?php break; ?>
                                                        <?php case ($year->month = 12): ?>
                                                            <span>December&nbsp;<?php echo e($year->year); ?></span>
                                                            <?php break; ?>
                                                        <?php default: ?>
                                                            <span>Something went wrong, please try again</span>
                                                    <?php endswitch; ?></a>
                                            </div>
                                        </div><!-- .col -->
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div><!-- .row -->

                                </div><!-- .nk-block -->
                            </div>

                        </div><!-- .card-aside-wrap -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
<!-- content @e  -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script>
    // display a modal (small modal)
    $(document).on("click", ".test-show", function (event) {
        event.preventDefault();

        let href = $(this).attr("data-attr");
        $.ajax({
            url: href,
            beforeSend: function () {
                $("#loader").show();
            },
            // return the result
            success: function (result) {
                $('#showTest').empty();

                var testdetails = (result.html);
                var indexdiv = $('#showTest'); //create wrapper element
                indexdiv.append(testdetails); //move element into wrapper

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


<script>
    function scrollWin() {
        window.scrollBy(0, 200);
    }

</script>

<script>
    $(document).on("click", ".test-page", function (event) {
        event.preventDefault();

        let href = $(this).attr("data-attr");
        $.ajax({
            url: href,
            beforeSend: function () {
                $("#loader").show();
            },
            // return the result
            success: function (result) {
                $('#showTest').empty();

                var testdetails = (result.html);
                var indexdiv = $('#showTest'); //create wrapper element

                // testdetails.after(indexdiv); //insert wrapper after found element
                indexdiv.append(testdetails); //move element into wrapper
                // $("#showTest").append($("#test-index").html(result.html));

            },
            complete: function () {
                $("#loader").hide();
            },
            error: function (jqXHR, testStatus, error) {
                console.log(error);
                // alert("Page " + href + " cannot open. Error:" + error);
                $("#loader").hide();
            },
            timeout: 8000,
        });
    });

</script>

<script type="text/javascript">
    function submitDetailsForm() {

        event.preventDefault();
        let id = $("#id").val();

        $.ajax({
            url: "/home/daily-quiz/test-submit/" + id,
            type: 'post',
            data: $("#sessionupdate").serialize(),
            beforeSend: function () {
                $("#loader").show();
            },
            // return the result
            success: function (result) {
                $('#showTest').empty();

                var testdetails = (result.html);
                var indexdiv = $('#showTest'); //create wrapper element
                // testdetails.after(indexdiv); //insert wrapper after found element
                indexdiv.append(testdetails); //move element into wrapper
                // $("#showTest").append($("#test-index").html(result.html));

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

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.Layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/website/daily-quiz/index.blade.php ENDPATH**/ ?>