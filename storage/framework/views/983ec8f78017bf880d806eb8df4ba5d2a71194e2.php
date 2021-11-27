
<?php $__env->startSection('title'); ?>
<h1><i class="fa fa-list"></i>Edit Data Kecamatan</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumbs'); ?>
<?php echo e(Breadcrumbs::render('Edit Data Kecamatan',$kabupaten,$kecamatan)); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Form Edit Data Kecamatan</h3>
            <div class="tile-body">
              <form action="<?php echo e(route('kecamatan.update',[$kabupaten,$kecamatan])); ?>" method="POST" class="needs-validation" novalidate>
              	<?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="form-group">
                  <label class="control-label">Nama Kecamatan</label>
                  <input type="hidden" name="kabupaten" value="<?php echo e($kabupaten->id); ?>">
                  <input class="form-control <?php $__errorArgs = ['kecamatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="kecamatan" type="text" placeholder="Masukkan Nama Kecamatan" value="<?php echo e($kecamatan->name); ?>">
                  <?php $__errorArgs = ['kecamatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <p class="text-danger"><?php echo e($message); ?></p>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="<?php echo e(route('kecamatan.index',$kabupaten)); ?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
           </form>
          </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.admin.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\objekwisata\resources\views/admin/kecamatan/edit.blade.php ENDPATH**/ ?>