
<?php $__env->startSection('title'); ?>
<h1><i class="fa fa-list"></i>Tambah Data Kabupaten</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumbs'); ?>
<?php echo e(Breadcrumbs::render('Tambah Data Kabupaten')); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Form Tambah Data Kabupaten</h3>
            <div class="tile-body">
              <form action="<?php echo e(route('kabupaten.store')); ?>" method="POST" class="needs-validation" novalidate>
              	<?php echo csrf_field(); ?>
                <div class="form-group">
                  <label class="control-label">Nama Kabupaten</label>
                  <input class="form-control <?php $__errorArgs = ['kabupaten'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="kabupaten" type="text" placeholder="Masukkan Nama Kabupaten">
                  <?php $__errorArgs = ['kabupaten'];
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
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="<?php echo e(route('kabupaten.index')); ?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
           </form>
          </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.admin.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\objekwisata\resources\views/admin/kabupaten/create.blade.php ENDPATH**/ ?>