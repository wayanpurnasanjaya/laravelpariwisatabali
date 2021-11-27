  <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?php echo e(auth()->user()->getImage()); ?>" alt="User Image" width="50px">
        <div>
          <p class="app-sidebar__user-name"><?php echo e(auth()->user()->name); ?></p>
          <p class="app-sidebar__user-designation"><?php echo e(str_replace(array('[',']','"'),'',auth()->user()->roles->pluck('name'))); ?></p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="<?php echo e(route('dashboard')); ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

        <?php if(auth()->user()->hasRole('administrator')): ?>

        <li><a class="app-menu__item " href="<?php echo e(route('kabupaten.index')); ?>"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Data Kabupaten</span></a></li>

        <li><a class="app-menu__item " href="<?php echo e(route('content.index')); ?>"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Data Konten</span></a></li>

        <li><a class="app-menu__item " href="<?php echo e(route('user.index')); ?>"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Data User</span></a></li>

        <?php else: ?>
        
        <li><a class="app-menu__item " href="<?php echo e(route('content.index')); ?>"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Data Konten</span></a></li>
        <?php endif; ?>
        <li><a class="app-menu__item " href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="app-menu__icon fa fa-power-off"></i><span class="app-menu__label">Sign Out</span></a></li>
        <form action="<?php echo e(route('logout')); ?>" method="POST" id="logout-form" style="display: none;">
          <?php echo csrf_field(); ?>
        </form>
        
      </ul>
    </aside><?php /**PATH C:\xampp\htdocs\objekwisata\resources\views/template/admin/partials/sidebar.blade.php ENDPATH**/ ?>