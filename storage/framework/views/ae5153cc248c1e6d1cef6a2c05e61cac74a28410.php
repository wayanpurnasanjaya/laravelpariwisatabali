<!DOCTYPE html>
<html>
<head>
	<?php echo $__env->make('template.frontend.partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
	<header>
		<?php echo $__env->make('template.frontend.partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</header>

<?php echo $__env->yieldContent('content'); ?>



<?php echo $__env->make('template.frontend.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>	
<?php echo $__env->make('template.frontend.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\objekwisata\resources\views/template/frontend/default.blade.php ENDPATH**/ ?>