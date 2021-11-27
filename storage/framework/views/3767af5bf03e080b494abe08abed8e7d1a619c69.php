
<?php $__env->startSection('title'); ?>
<h1><i class="fa fa-list"></i>Data User</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumbs'); ?>
<?php echo e(Breadcrumbs::render('user')); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
 <div class="col-md-12">
          <div class="tile">
          	<a href="<?php echo e(route('user.create')); ?>" class="btn btn-success mb-3">Tambah Data</a>
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama User</th>
                      <th>Email</th>
                      <th>Hak Akses</th>
                      <th>Foto</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php
                  		$no = 0;
                  	?>
                   <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   	<?php
                   		$no++;
                   	?>
                    <tr>
                      <td><?php echo e($no); ?></td>
                      <td><?php echo e($user->name); ?></td>
                      <td><?php echo e($user->email); ?></td>
                      <td><?php echo e(str_replace(array('[',']','"'),'',$user->roles()->pluck('name') )); ?></td>
                      <td><img src="<?php echo e($user->getImage()); ?>" class="img-thumbnail" width="50px" height="50px"></td>
                      <td>
                       	<a href="<?php echo e(route('user.edit',$user)); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                      	<button id="delete" href="<?php echo e(route('user.destroy',$user)); ?>" class="btn btn-danger btn-sm" data-title="<?php echo e($user->name); ?>"><i class="fa fa-trash"></i></button>
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
      title:"Apakah Sudah Yakin menghapus Data User "+title+"?",
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
<?php echo $__env->make('template.admin.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\objekwisata\resources\views/admin/user/index.blade.php ENDPATH**/ ?>