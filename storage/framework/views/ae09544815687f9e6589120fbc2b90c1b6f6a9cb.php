
<?php $__env->startSection('title'); ?>
<h1><i class="fa fa-list"></i>Data Kecamatan Pada Kabupaten <?php echo e($kabupaten->name); ?></h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumbs'); ?>
<?php echo e(Breadcrumbs::render('Kecamatan',$kabupaten)); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <div class="col-md-12">
          <div class="tile">
          	<a href="<?php echo e(route('kecamatan.create',$kabupaten)); ?>" class="btn btn-success mb-3">Tambah Data</a>
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Kecamatan</th>
                      <th>Slug</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php
                  		$no = 0;
                  	?>
                   <?php $__currentLoopData = $kecamatans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kecamatan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   	<?php
                   		$no++;
                   	?>
                    <tr>
                      <td><?php echo e($no); ?></td>
                      <td><?php echo e($kecamatan->name); ?></td>
                      <td><?php echo e($kecamatan->slug); ?></td>
                      <td>
                        
                      	<a href="<?php echo e(route('kecamatan.edit',[$kabupaten,$kecamatan])); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                      	<button id="delete" href="<?php echo e(route('kecamatan.delete',[$kabupaten,$kecamatan])); ?>" class="btn btn-danger btn-sm" data-title="<?php echo e($kecamatan->name); ?>"><i class="fa fa-trash"></i></button>
                      </td>
                      <form method="POST" id="deleteForm">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field("DELETE"); ?>
                        <input type="submit" style="display: none;">
                      </form>
                    </tr>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('admin/js/plugins/jquery.dataTables.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin/js/plugins/dataTables.bootstrap.min.js')); ?>"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
  $('button#delete').on('click',function(){
    var href = $(this).attr('href');
    var title = $(this).data('title')

    swal({
      title:"Apakah Sudah Yakin menghapus Data Kecamatan "+title+"?",
      text:"Data Yang Sudah di Hapus Tidak dapat dikembalikan",
      icon :"warning",
      buttons:true,
      dangerMode:true,
    })
    .then((willDelete)=> {
      if(willDelete){
        document.getElementById('deleteForm').action = href;
        document.getElementById('deleteForm').submit();
        swal("Data Berhasil Di hapus",{
          icon:"success",
        });
      }
    });
  });
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('template.admin.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\objekwisata\resources\views/admin/kecamatan/index.blade.php ENDPATH**/ ?>