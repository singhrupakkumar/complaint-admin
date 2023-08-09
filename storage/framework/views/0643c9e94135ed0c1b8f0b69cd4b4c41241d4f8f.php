<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>INTERNAL COMPLAIN MANAGEMENT SYSTEM</title>

    
    <?php echo $__env->make('admin.partials.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link rel="shortcut icon" href="https://dev.twentyfirstgen.com/complaint-admin/public/storage/upload_image/logo-dummy.png" />
	<style>
	.mdi-delete {
		color:#ff0000;
	}
	.card .card-title {
		margin-bottom: 2.2rem !important;
		text-transform: capitalize;
		font-size: 2.125rem !important;
		font-weight: 600;
		text-align: center !important;
		color: #0179ff !important;  
	}
	</style>
</head>

<body>
    <div class="container-scroller">
        <?php echo $__env->make('admin.partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
        <div class="container-fluid page-body-wrapper">
            <?php echo $__env->make('admin.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
            <div class="content-wrapper">
			<?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
                <?php echo $__env->yieldContent('content'); ?> 
            </div>
        </div>
    </div>
    
    <?php echo $__env->make('admin.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('scripts'); ?> 

</body>

</html>
<?php /**PATH C:\xamppnew\htdocs\june\complaint-admin\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>