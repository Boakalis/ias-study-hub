<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Referer Dashboard</title>
</head>
<body>
    <div class="card card-preview">
        <div class="card-inner">
            <table class=" table table table-md">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Order-ID</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Date</th>
                        <th scope="col">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr id="sid<?php echo e($data->id); ?>">
                        <td><?php echo e($key+1); ?></td>
                        <td><?php echo e(($data->order_id)); ?></td>
                        <td><?php echo e(($data->user_id)); ?></td>
                        <td class="text-center">
                            <?php echo e($data->date); ?>

                        </td>

                        <td class="text-center">
                            <?php echo e($data->amount); ?>

                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <br>
        
    </div>

</body>
</html>
<?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/admin/referal-dashboard.blade.php ENDPATH**/ ?>