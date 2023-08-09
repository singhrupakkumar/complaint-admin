<!DOCTYPE html>
<html>
<head>
    <title>INTERNAL COMPLAIN MANAGEMENT SYSTEM</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1 style="text-align: center;color: #0179ff;"><?php echo e($title); ?></h1>
    <p><?php echo e($date); ?></p>

    <p>Monthly Internal Rejects</p>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Place</th>
            <th>Categories</th>
            <th>Jan</th>
            <th>Feb</th>
            <th>Mar</th>
            <th>Apr</th>
            <th>May</th>
            <th>Jun</th>
            <th>Jul</th>
            <th>Aug</th>
            <th>Sep</th>
            <th>Oct</th>
            <th>Nov</th>
            <th>Dec</th>

        </tr>
        </thead>
        <tbody>
        <?php
         $total01 = 0;
         $total02 = 0;
         $total03 = 0;
         $total04 = 0;
         $total05 = 0;
         $total06 = 0;
         $total07 = 0;
         $total08 = 0;
         $total09 = 0;
         $total10 = 0;
         $total11 = 0;
         $total12 = 0;
        ?>    
        <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td>KD-Internal</td>
            <td><?php echo e($user->category); ?></td>
            <?php $__currentLoopData = \App\Models\Complain::getCountByCatAndMonth($user->category); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            if($k==1){
                $total01 = $total01+$data;
            }
            if($k==2){
                $total02 = $total02+$data;
            }
            if($k==3){
                $total03 = $total03+$data;
            }
            if($k==4){
                $total04 = $total04+$data;
            }
            if($k==5){
                $total05 = $total05+$data;
            }
            if($k==6){
                $total06 = $total06+$data;
            }
            if($k==7){
                $total07 = $total07+$data;
            }

            if($k==8){
                $total08 = $total08+$data;
            }
            if($k==9){
                $total09 = $total09+$data;
            }
            if($k==10){
                $total10 = $total10+$data;
            }
            if($k==11){
                $total11 = $total11+$data;
            }
            if($k==12){
                $total12 = $total12+$data;
            }
            
            ?>
            <td><?php echo e($data); ?></td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
        </tr>
 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
         <tfoot>
            <tr>
              <th></th>
              <th>KUNDANG TOTAL -</th>
              <th><?php echo e($total01); ?></th>
              <th><?php echo e($total02); ?></th>
              <th><?php echo e($total03); ?></th>
              <th><?php echo e($total04); ?></th>
              <th><?php echo e($total05); ?></th>
              <th><?php echo e($total06); ?></th>
              <th><?php echo e($total07); ?></th>
              <th><?php echo e($total08); ?></th>
              <th><?php echo e($total09); ?></th>
              <th><?php echo e($total10); ?></th>
              <th><?php echo e($total11); ?></th>
              <th><?php echo e($total12); ?></th>
            </tr>
        </tfoot>
    </table>
  
</body>
</html><?php /**PATH C:\xamppnew\htdocs\june\complaint-admin\resources\views/catWisePdf.blade.php ENDPATH**/ ?>