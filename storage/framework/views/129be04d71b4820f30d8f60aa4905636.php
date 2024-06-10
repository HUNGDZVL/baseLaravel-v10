<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php echo $__env->make("/frontend/scripts/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <h1>Home Blade</h1>

    <!-- == <= htmlspecialchars($1?:'rỗng); ?> chuyển về thực thể tránh lỗi xss bảo mật -->
    <h2><?php echo e($t1 ?: 'rỗng'); ?></h2>
    <!-- == <= ($htmlContent); ?> lấy nguyên kí tự code biên dịch mã dùng để render code html hoặc script -->
    <h2><?php echo $htmlContent; ?></h2>
    <!--  lấy slug url < ?> -->
    <h2><?= request()->key ?: "Rỗng" ?></h2>
    <!-- vòng for -->
    <?php for($i = 0; $i < 3; $i++): ?>
     <h1><?php echo e($i); ?></h1> 
    <?php endfor; ?>
    <!-- các cú pháp đưa trong @ với @php==<php> -->
    
    <?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <h1><?php echo e($key); ?>-<?php echo e($val); ?></h1>
    <h2>Phan tu <?= $val ?></h2>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    <?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    // tránh xung đột biên dich <?php echo e($val); ?> hoặc thêm {{$val}}
    
    

    // import view path 
    <?php echo $__env->make("frontend/homeblade/add", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
</body>

</html><?php /**PATH D:\baseLaravel-v10\resources\views/frontend/homeblade/index.blade.php ENDPATH**/ ?>