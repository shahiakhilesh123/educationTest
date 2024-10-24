<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <?php  $user = Auth::user();
            $role = App\Models\Role::where('id', $user->role)->get()->first(); ?>
    <a href="{{asset('/')}}" class="brand-link">
      <img src="{{ asset('/public/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ $role->role_name }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <?php
            $roles = explode(',',$role->menu_ids);
            $menus = App\Models\Menu::whereHas('type', function ($query) {
                $query->where('type', 'SideBar');
            })
            ->whereHas('category', function ($query) {
                $query->where('category', 'Admin');
            })
            ->where('menu_id', '=', 0)->get()->toArray();
            foreach($menus as $menu) {
              if(in_array($menu['id'],$roles)) {
              $subMenus = App\Models\Menu::where('menu_id', $menu['id'])->get(); 
               $men = explode('/', $menu['menu_link']);
               $req = explode('/',$_SERVER['REQUEST_URI']) ?>
              <!-- //menu-open -->
              <li class="nav-item <?php if($men[1] == $req[1]) { echo "menu-open"; } ?>">
                
                <a href="<?php if($subMenus->count() == 0){ echo asset($menu['menu_link']);  }?> " class="nav-link active">
                  <i class="nav-icon {{ $menu['menu_class']}}"></i>
                  <p>
                    {{$menu['menu_name']}}
                    <?php if($subMenus->count() > 0){ ?>
                    <i class="right fas fa-angle-left"></i>
                    <?php } ?>
                  </p>
                </a>
                <?php 
                if($subMenus->count() > 0){
                  $subMenus = $subMenus->toArray();
                    ?>
                    <ul class="nav nav-treeview">
                      @foreach($subMenus as $subMenu)
                      <?php if(in_array($subMenu['id'],$roles)) { ?>
                        <li class="nav-item">
                          <a href="{{ asset($subMenu['menu_link']) }}" class="nav-link active">
                            <i class="far {{ $subMenu['menu_class'] }}"></i>
                            <p>{{ $subMenu['menu_name']}}</p>
                          </a>
                        </li>
                        <?php } ?>
                      @endforeach
                    </ul>
                <?php } ?>
          </li>
          <?php  } } ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>