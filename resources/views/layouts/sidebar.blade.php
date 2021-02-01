<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <!-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light">Connect Complete</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> -->
        <div class="info">
          @if(auth()->user()!="")
          <a href="#" class="d-block">{{ ucfirst(auth()->user()->name) }}</a>
          @endif
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item @if(Route::current()->getName() == 'categories.index' ||  Route::current()->getName() == 'categories.create' || Route::current()->getName() == 'categories.edit' || Route::current()->getName() == 'subcategories.index' ||  Route::current()->getName() == 'subcategories.create' || Route::current()->getName() == 'subcategories.edit' || Route::current()->getName() == 'childcategories.index' ||  Route::current()->getName() == 'childcategories.create' || Route::current()->getName() == 'childcategories.edit' ) menu-is-opening menu-open  @endif ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item  ">
                <a href="{{route('categories.index')}}" class="nav-link @if(Route::current()->getName() == 'categories.index' ||  Route::current()->getName() == 'categories.create' || Route::current()->getName() == 'categories.edit') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('subcategories.index')}}" class="nav-link @if(Route::current()->getName() == 'subcategories.index' ||  Route::current()->getName() == 'subcategories.create' || Route::current()->getName() == 'subcategories.edit') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subcategories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('childcategories.index')}}" class="nav-link @if(Route::current()->getName() == 'childcategories.index' ||  Route::current()->getName() == 'childcategories.create' || Route::current()->getName() == 'childcategories.edit') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Child Category</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="../widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>