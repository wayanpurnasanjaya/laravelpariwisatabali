  <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{auth()->user()->getImage()}}" alt="User Image" width="50px">
        <div>
          <p class="app-sidebar__user-name">{{auth()->user()->name}}</p>
          <p class="app-sidebar__user-designation">{{str_replace(array('[',']','"'),'',auth()->user()->roles->pluck('name')) }}</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="{{route('dashboard')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

        @if(auth()->user()->hasRole('administrator'))

        <li><a class="app-menu__item " href="{{route('kabupaten.index')}}"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Data Kabupaten</span></a></li>

        <li><a class="app-menu__item " href="{{route('content.index')}}"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Data Konten</span></a></li>

        <li><a class="app-menu__item " href="{{route('user.index')}}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Data User</span></a></li>

        @else
        
        <li><a class="app-menu__item " href="{{route('content.index')}}"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Data Konten</span></a></li>
        @endif
        <li><a class="app-menu__item " href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="app-menu__icon fa fa-power-off"></i><span class="app-menu__label">Sign Out</span></a></li>
        <form action="{{route('logout')}}" method="POST" id="logout-form" style="display: none;">
          @csrf
        </form>
        
      </ul>
    </aside>