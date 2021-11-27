
<?php $__env->startSection('title'); ?>
<h1><i class="fa fa-list"></i><?php echo e($content->title); ?></h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumbs'); ?>
<?php echo e(Breadcrumbs::render('content')); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col-md-12">	
	<div class="tile">
		<div class="timeline-post">
			<div class="post-media">
				<div class="content">
					<h5><?php echo e($content->title); ?></h5>
					<p class="text-muted"><small><?php echo e($content->created_at); ?> By <?php echo e($content->user->name); ?></small> </p>
				</div>
			</div>
			<div>
				<hr>
				<img src="<?php echo e($content->getThumbnail()); ?>" class="img-thumbnail">
				<p><?php echo $content->content; ?></p>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.admin.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\objekwisata\resources\views/admin/content/show.blade.php ENDPATH**/ ?>