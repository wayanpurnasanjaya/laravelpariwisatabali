
<?php $__env->startSection('content'); ?>

<main role ="main">
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-5 mb-4">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-light">
						<li class="breadcrumb-item"><a href="<?php echo e(route(
							'homepage')); ?>" class="text-decoration-none"><?php echo e(config('app.name')); ?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?php echo e($content->kecamatan->name); ?></li>
					</ol>
				</nav>
				<h1><?php echo e($content->title); ?></h1>
				<h6 class="text-muted"><?php echo e($content->created_at->diffForHumans()); ?> Oleh <?php echo e($content->user->name); ?></h6>
				<span class="text-muted"><?php echo e($content->kecamatan->kabupaten->name); ?>,<?php echo e($content->kecamatan->name); ?></span>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<div class="picture mb-3">
					<img src="<?php echo e($content->getThumbnail()); ?>" alt="<?php echo e($content->title); ?>" class="img-fluid img-responsive">
				</div>
				<div class="article">
					<span class="text-muted">
						<?php echo $content->content; ?>

					</span>
				</div>
			</div>
			<div class="col md-4">
				<div class="card">
					<div class="card-header">
						Lainnya
					</div>
					<ul class="list-group list-group-flush">
						<?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li class="list-group-item">
								<a href="<?php echo e(route('detailContent',[$item->kecamatan->kabupaten->slug, $item->kecamatan->slug, $item])); ?>" class="text-decoration-none"><?php echo e($item->title); ?></a>
							</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
				</div>
				<hr>
				<div class="card">
					<div class="card-header">
						Kabupaten
					</div>
					<ul class="list-group list-group-flush">
						<?php $__currentLoopData = $kabupatens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li class="list-group-item">
								<a href="<?php echo e(route('getContentKabupaten',$item)); ?>" class="text-decoration-none"><?php echo e($item->name); ?></a>
							</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
					
				</div>
				
			</div>
		</div>
	</div>
</main>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
	.article{
		font-family: Arial,Helvetica, sans-serif;
		font-weight: 500;
		font-style: normal;
		font-size: 12pt;
	}
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('template.frontend.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\objekwisata\resources\views/homepage/detail.blade.php ENDPATH**/ ?>