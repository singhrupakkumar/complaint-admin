<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 Generate PDF Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1 style="text-align: center;color: #0179ff;"><?php echo e($title); ?></h1>
    <p><?php echo e($date); ?></p>

  
    <table class="table table-bordered">
        <tr>
            <th>NO</th>
            <th>REJ. DATE</th>
            <th>PROD. DATE</th>
            <th>PROD. TIME</th>
            <th>REJ. DEPT.</th>
            <th>TANK</th>
            <th>CUST. CODE</th>
            <th>JOB NO</th>
            <th>CIR</th>
            <th>LENGTH</th>
            <th>CYL. NO</th>
            <th>MT</th>
            <th>REMARKS</th>

        </tr>
        <?php $__currentLoopData = $complain; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($key+1); ?></td>
            <td><?php echo e($user->rej_date); ?></td>
            <td><?php echo e($user->prod_date); ?></td>
            <td><?php echo e($user->prod_time); ?></td>
            <td><?php echo e($user->rejdept?$user->rejdept->name:''); ?></td>
            <td><?php echo e($user->tank); ?></td>
            <td><?php echo e($user->custcode?$user->custcode->code:''); ?></td>
            <td><?php echo e($user->job_number); ?></td>
            <td><?php echo e($user->cir); ?></td>
            <td><?php echo e($user->length); ?></td>
            <td><?php echo e($user->cyl_number); ?></td>
            <td><?php echo e($user->mt); ?></td>
            <td><?php echo $user->remarks; ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
  
</body>
</html><?php /**PATH C:\xamppnew\htdocs\june\complaint-admin\resources\views/reportPdf.blade.php ENDPATH**/ ?>