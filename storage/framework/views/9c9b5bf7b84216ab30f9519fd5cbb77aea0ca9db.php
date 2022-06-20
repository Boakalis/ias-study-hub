<?php $__env->startSection('title',$data->name); ?>
<?php $__env->startSection('content'); ?>
    <!-- content @s  -->
    <div class="nk-content px-0">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block">

                        <div class="row">
                            <div class="col-xl-12 col-lg-12 ">
                                <div class="card">
                                    <div class="card-inner card-inner-md">
                                        <div class="nk-block-head nk-block-head-md">
                                            <div class="nk-block-between">
                                                <div class="nk-block-head-content col-lg-12 px-0 ">
                                                    <h4 class="nk-block-title text-uppercase float-left "><?php echo e($data->name); ?> </h4>
                                                        <a href="<?php echo e(url()->previous()); ?>" class="float-right " ><em class="icon ni ni-arrow-left backarrow"></em> </a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="nk-data data-list mt-0">
                                            <?php echo $__env->make('admin.layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                            <ul class="sp-pdl-list">
                                                <?php if(isset($data->batch) && !empty($data->batch)): ?>
                                                <?php $__currentLoopData = $data->batch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $batch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <input type="hidden" id="batch<?php echo e($batch->id); ?>" value="<?php echo e(route('testoverview',['series_slug' =>$batch->series->slug, 'batch_slug' =>$batch->slug])); ?>" >
                                                <?php if($batch->isClosed == 1): ?>
                                                <li onclick="modalfun(this)" data-name="<?php echo e($batch->name); ?>" class="btn btn-hover color-1 mt-2 mb-2 ml-0 test-series-box">
                                                <?php else: ?>
                                                <li onclick="routefun(<?php echo e($batch->id); ?>)" class="btn btn-hover color-1 mt-2 mb-2 ml-0 test-series-box">
                                                <?php endif; ?>
                                                    <div class="nk-block">

                                                            <?php if($batch->isClosed == 1): ?>
                                                            <h6 class="mb-2"><a href="#" onclick="modalfun(this)"  data-name="<?php echo e($batch->name); ?>" class="text-center text-white"> <?php echo e($batch->name); ?></a></h6>
                                                            <?php else: ?>
                                                            <h6 class="mb-2"><a href="<?php echo e(route('testoverview',['series_slug' =>$batch->series->slug, 'batch_slug' =>$batch->slug])); ?>" class="text-white"><?php echo e($batch->name); ?></a></h6>
                                                            <?php endif; ?>

                                                            

                                                            <table class="table table-bordered font-16">
                                                                <tr class="text-white">
                                                                    <td>Total Test</td>
                                                                    <td><?php echo e($batch->test->count()); ?></td>
                                                                </tr>
                                                                <?php if($batch->isClosed == 1): ?>
                                                                <tr>
                                                                    <th colspan="2"> <span class="btn btn-md btn-warning d-block  font-16">Batch Closed</span></th>
                                                                </tr>
                                                                 <?php else: ?>
                                                                <tr class="text-white">
                                                                    <td>Start Date</td>
                                                                    <td><?php echo e(date('d-M-Y',strtotime($batch->start_date))); ?></td>
                                                                </tr>
                                                                <?php endif; ?>
                                                                <tr>
                                                                    <th colspan="2"> <span class="btn btn-md btn-warning d-block  font-16">
                                                                            
                                                                            <?php if($batch->slug === 'pts-1' || $batch->slug === 'pts-2' ): ?>
                                                                            Online Only
                                                                            <?php else: ?>
                                                                            Online + PDF
                                                                            <?php endif; ?>
                                                                        </span></th>
                                                                </tr>
                                                            </table>
                                                            

                                                    </div>
                                                    
                                                </li><!-- .sp-pdl-item -->
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <?php endif; ?>
                                            </ul>
                                        </div><!-- data-list -->

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

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" id="batchModal" >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body"  >

            </div>
          </div>
        </div>
      </div>
    <?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<script>
    function routefun(id) {
        let url = id
        url_path = $('#batch'+id).val()
        document.location.href = url_path;
    }


</script>

<script>
    function modalfun(e){
        var name  = $(e).attr('data-name');
        Swal.fire({
            icon : 'error',
            title: name+' closed.',
            text: 'Please proceed to the current batch',
            //padding: '3em',
            background: '#fff url(/images/trees.png)',
            timer:1500,
            backdrop: `
                rgba(0,0,123,0.4)
                url("/images/nyan-cat.gif")
                left top
                no-repeat
            `
})
                    }

</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('website.Layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/website/Users/IAS/seriesbatch.blade.php ENDPATH**/ ?>