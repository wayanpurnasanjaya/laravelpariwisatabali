
<?php $__env->startSection('content'); ?>
<main role="main">
	</div>
	<section class="jumbotron text-center mt-3">
		<div class="container">
			<h1><?php echo e(config('app.name')); ?></h1>
			<p class="lead text-muted">
			Hasil Pencarian <strong><?php echo e($search); ?></strong> 
			</p>
		</div>
	</section>

	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-1 mb-4">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-ligt">
						<li class="breadcrumb-item"><a href="<?php echo e(route(
							'homepage')); ?>" class="text-decoration-none"><?php echo e(config('app.name')); ?></a></li>
						<li class="breadcrumb-item active" aria-current="page">result</li>
					</ol>
				</nav>
			</div>
		</div>
		<?php if($contents->isEmpty()): ?>
		<div class="col-md-12">
			<div class="jumbotron jumbotron-fluid">
				<div class="container">
					<h1 class="display-4">Hasil Pencarian Tidak Ditemukan</h1>
					<p class="lead">Silahkan menggunakan kata kunci lain</p>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<div class="row">
			<?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="col-md-4">
				<div class="shadow card mb-4">
					<div class="d-flex flex-wrap">
						<img src="<?php echo e($content->getThumbnail()); ?>" alt="<?php echo e($content->title); ?>" class="card-img-top">
						<h4 class="text-image position-absolute"><?php echo e($content->kecamatan->name); ?></h4>
					</div>
					<div class="card-body">
						<h5 class="card-title"><?php echo e($content->title); ?></h5>
						<p class="card-text"><?php echo Str::words($content->content,10); ?></p>
						<a href="<?php echo e(route('detailContent',[$content->kecamatan->kabupaten->slug, $content->kecamatan->slug, $content])); ?>" class="btn btn-primary">Explore</a>
					</div>
				</div>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
		<?php echo e($contents->render()); ?>

	</div>

</main>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
	img{
		max-height: 200px;
	}
	.text-image{
		font-size: 16px;
		margin-left: 5px;
		margin-top: 175px;
		color: #ffffff;
		background-color: black;
	}
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('template.frontend.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\objekwisata\resources\views/homepage/result.blade.php ENDPATH**/ ?>