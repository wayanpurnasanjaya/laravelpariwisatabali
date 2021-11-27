<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  		<a class="navbar-brand" href="<?php echo e(route('homepage')); ?>"><?php echo e(config('app.name')); ?></a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  			</button>

  		<div class="collapse navbar-collapse" id="navbarSupportedContent">
    		<ul class="navbar-nav mr-auto">
      			<li class="nav-item active">
        			<a class="nav-link" href="<?php echo e(route('homepage')); ?>">Home <span class="sr-only">(current)</span></a>
      			</li>
      			<li class="nav-item">
       				 <a class="nav-link" href="<?php echo e(route('getKabupaten')); ?>">Direktori Pariwisata Bali</a>
      			</li>
      		</ul>
      		<form action="<?php echo e(route('result')); ?>" method="get" class="form-inline my-2 m-lg-0">
      			<input type="text" name="search" class="form-control mr-sm-2" placeholder="Cari">
      			<button type="submit" class="btn btn-outline-success my-2">Cari</button>
      		</form>
  		</div>
</nav>
<?php /**PATH C:\xampp\htdocs\objekwisata\resources\views/template/frontend/partials/navbar.blade.php ENDPATH**/ ?>