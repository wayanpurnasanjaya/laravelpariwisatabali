
<?php $__env->startSection('title'); ?>
<h1><i class="fa fa-dashboard"></i>Administrator</h1>
<p>Halaman Administrator Website Pariwisata Bali</p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumbs'); ?>
<?php echo e(Breadcrumbs::render('dashboard')); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if(auth()->user()->hasRole('administrator')): ?>
<div class="col-md-3">
	<div class="widget-small primary coloured-icon">
		<i class="icon fa fa-users fa-3x"></i>
		<div class="info">
			<h5>Users</h5>
			<p><b><?php echo e($users->count()); ?></b></p>
		</div>
	</div>
</div>
<div class="col-md-3">
	<div class="widget-small danger coloured-icon">
		<i class="icon fa fa-database fa-3x"></i>
		<div class="info">
			<h5>Content</h5>
			<p><b><?php echo e($content); ?></b></p>
		</div>
	</div>
</div>
<div class="col-md-3">
	<div class="widget-small warning coloured-icon">
		<i class="icon fa fa-upload fa-3x"></i>
		<div class="info">
			<h5>Publish</h5>
			<p><b><?php echo e($publish); ?></b></p>
		</div>
	</div>
</div>
<div class="col-md-3">
	<div class="widget-small info coloured-icon">
		<i class="icon fa fa-archive fa-3x"></i>
		<div class="info">
			<h5>NotPublish</h5>
			<p><b><?php echo e($notPublish); ?></b></p>
		</div>
	</div>
</div>

<div class="col-md-12">
	<div class="tile">
		<h3 class="tile-title">Data Content oleh User</h3>
		<div class="table-responsive">
			<table class="table table-hover table-bordered">
				<thead>
					<th>Nomor</th>
					<th>Nama User</th>
					<th>Content</th>
					<th>Publish</th>
					<th>Not Publish</th>
				</thead>
				<tbody>
					<?php
					$no=0;
					?>
					<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php
					$no++
					?>
						<tr>
							<td><?php echo e($no); ?></td>
							<td><?php echo e($user->name); ?></td>
							<td><?php echo e($getCountContent->getCountContent($user->id)); ?></td>
							<td><?php echo e($getCountContentPublish->getCountContentPublish($user->id)); ?></td>
							<td><?php echo e($getCountContentNotPublish->getCountContentNotPublish($user->id)); ?></td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php else: ?>
<div class="col-md-4">
	<div class="widget-small danger coloured-icon">
		<i class="icon fa fa-database fa-3x"></i>
		<div class="info">
			<h5>Content</h5>
			<p><b><?php echo e($userContent); ?></b></p>
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="widget-small warning coloured-icon">
		<i class="icon fa fa-upload fa-3x"></i>
		<div class="info">
			<h5>Publish</h5>
			<p><b><?php echo e($userContentPublish); ?></b></p>
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="widget-small info coloured-icon">
		<i class="icon fa fa-archive fa-3x"></i>
		<div class="info">
			<h5>NotPublish</h5>
			<p><b><?php echo e($userContentNotPublish); ?></b></p>
		</div>
	</div>
</div>
<?php endif; ?> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.admin.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\objekwisata\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>