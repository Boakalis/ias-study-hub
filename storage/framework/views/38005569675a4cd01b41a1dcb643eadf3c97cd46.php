<ol class="breadcrumb breadcrumb-arrow">
    <li class="breadcrumb-item" >
        <i class="fa fa-home"></i>
        <a href="<?php echo e(route('home')); ?>">HOME</a>
    </li>

    <?php for($i = 2; $i <= count(Request::segments()); $i++): ?>
       <li class="breadcrumb-item" >
          <a href="<?php echo e(URL::to( implode( '/', array_slice(Request::segments(), 0 ,$i, true)))); ?>">
             <?php echo e(strtoupper(Request::segment($i))); ?>

          </a>
       </li>
    <?php endfor; ?>
 </ol>

<?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/website/Layout/breadcrumb.blade.php ENDPATH**/ ?>