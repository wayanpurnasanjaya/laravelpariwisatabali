
<?php $__env->startSection('title'); ?>
<h1><i class="fa fa-list"></i>Edit Status Publish</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumbs'); ?>
<?php echo e(Breadcrumbs::render('Edit Data Status',$content)); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Form Edit Status</h3>
            <div class="tile-body">
              <form action="<?php echo e(route('content.updatestatus',$content)); ?>" method="POST" class="needs-validation" novalidate>
              	<?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="form-group">
                  <label class="control-label">Pilih Status</label>
                 <select name="status" id="" class="form-control">
                   <option value="0">Belum Publish</option>
                   <option value="1">Publish</option>
                 </select>
                </div>
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="<?php echo e(route('content.index')); ?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
           </form>
          </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.admin.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\objekwisata\resources\views/admin/content/editStatus.blade.php ENDPATH**/ ?>