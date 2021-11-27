<!DOCTYPE html>
<html lang="en">
  <head>
    <?php echo $__env->make('template.admin.partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.html">Waikunta</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      
    </header>
    <?php echo $__env->make('template.admin.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main class="app-content">
      <div class="app-title">
        <div>
         <?php echo $__env->yieldContent('title'); ?>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <?php echo $__env->yieldContent('breadcrumbs'); ?>
        </ul>
      </div>
      <div class="row">
        <?php echo $__env->yieldContent('content'); ?>
      </div>
    </main>
    <?php echo $__env->make('template.admin.partials.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
  </body>
</html><?php /**PATH C:\xampp\htdocs\objekwisata\resources\views/template/admin/default.blade.php ENDPATH**/ ?>