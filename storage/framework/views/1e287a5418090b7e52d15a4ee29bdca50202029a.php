
<?php $__env->startSection('content'); ?>
<main role ="main">
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-5 mb-4">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-light">
						<li class="breadcrumb-item"><a href="<?php echo e(route(
							'homepage')); ?>" class="text-decoration-none"><?php echo e(config('app.name')); ?></a></li>
						<li class="breadcrumb-item active" aria-current="page">Kabupaten</li>
					</ol>
				</nav>
			</div>
			<div class="col-md-12">
				<div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead class="bg-info" style="color:white;">
                    <tr>
                      <th width="10%">No</th>
                      <th>Nama Kabupaten</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php
                  		$no = 0;
                  	?>
                   <?php $__currentLoopData = $kabupatens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kabupaten): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   	<?php
                   		$no++;
                   	?>
                    <tr>
                      <td><?php echo e($no); ?></td>
                      <td><a href="<?php echo e(route('getContentKabupaten',$kabupaten)); ?>" class="text-decoration-none"><?php echo e($kabupaten->name); ?></a></td>
                    </tr>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   
                  </tbody>
                </table>
              </div>
			</div>
		</div>
	</div>
</main>			
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.frontend.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\objekwisata\resources\views/homepage/getKabupaten.blade.php ENDPATH**/ ?>