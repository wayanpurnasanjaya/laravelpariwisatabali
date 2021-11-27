
<?php $__env->startSection('title'); ?>
<h1><i class="fa fa-list"></i>Data Kontent</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumbs'); ?>
<?php echo e(Breadcrumbs::render('content')); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <div class="col-md-12">
          <div class="tile">
          	<a href="<?php echo e(route('content.create')); ?>" class="btn btn-success mb-3">Tambah Data</a>
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kecamatan</th>
                      <th>Penulis</th>
                      <th>Title</th>
                      <th>Content</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php
                  		$no = 0;
                  	?>
                   <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   	<?php
                   		$no++;
                   	?>
                    <tr>
                      <td><?php echo e($no); ?></td>
                      <td><?php echo e($content->kecamatan->name); ?></td>
                      <td><?php echo e($content->user->name); ?></td>
                      <td><?php echo e($content->title); ?></td>
                      <td><?php echo Str::words($content->content,10); ?></td>
                      <td>
                        <?php if($content->status_publish == 0): ?>
                        <span class="badge badge-danger">Belum Publish</span>
                        <?php else: ?>
                        <span class="badge badge-success">Publish</span>
                        <?php endif; ?>
                      </td>
                      <td>
                        <a href="<?php echo e(route('content.show', $content)); ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                        <a href="<?php echo e(route('content.editStatus',$content)); ?>" class="btn btn-default btn-sm"><i class="fa fa-share"></i></a>

                      	<a href="<?php echo e(route('content.edit',$content)); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                      	<button id="delete" href="<?php echo e(route('content.destroy',$content)); ?>" class="btn btn-danger btn-sm" data-title="<?php echo e($content->title); ?>"><i class="fa fa-trash"></i></button>
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
      title:"Apakah Sudah Yakin menghapus Data Content "+title+"?",
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
<?php echo $__env->make('template.admin.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\objekwisata\resources\views/admin/content/index.blade.php ENDPATH**/ ?>