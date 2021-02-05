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
        @role('admin')
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
          <li class="nav-item @if(Route::current()->getName() == 'states.index' ||  Route::current()->getName() == 'states.create' || Route::current()->getName() == 'states.edit' || Route::current()->getName() == 'cities.index' ||  Route::current()->getName() == 'cities.create' || Route::current()->getName() == 'cities.edit'||Route::current()->getName() == 'areas.index' ||  Route::current()->getName() == 'areas.create' || Route::current()->getName() == 'areas.edit') menu-is-opening menu-open  @endif ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Locations
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item  ">
                <a href="{{route('states.index')}}" class="nav-link @if(Route::current()->getName() == 'states.index' ||  Route::current()->getName() == 'states.create' || Route::current()->getName() == 'states.edit') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>States</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('cities.index')}}" class="nav-link @if(Route::current()->getName() == 'cities.index' ||  Route::current()->getName() == 'cities.create' || Route::current()->getName() == 'cities.edit') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cities</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('areas.index')}}" class="nav-link @if(Route::current()->getName() == 'areas.index' ||  Route::current()->getName() == 'areas.create' || Route::current()->getName() == 'areas.edit') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Areas</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item @if(Route::current()->getName() == 'corportatecategories.index' ||  Route::current()->getName() == 'corportatecategories.create' || Route::current()->getName() == 'corportatecategories.edit' || Route::current()->getName() == 'corportatesubcategories.index' ||  Route::current()->getName() == 'corportatesubcategories.create' || Route::current()->getName() == 'corportatesubcategories.edit' || Route::current()->getName() == 'corportatechildcategories.index' ||  Route::current()->getName() == 'corportatechildcategories.create' || Route::current()->getName() == 'corportatechildcategories.edit' ) menu-is-opening menu-open  @endif ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Corporate Categories
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item  ">
                <a href="{{route('corportatecategories.index')}}" class="nav-link @if(Route::current()->getName() == 'corportatecategories.index' ||  Route::current()->getName() == 'corportatecategories.create' || Route::current()->getName() == 'corportatecategories.edit') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Corporate Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('corportatesubcategories.index')}}" class="nav-link @if(Route::current()->getName() == 'corportatesubcategories.index' ||  Route::current()->getName() == 'corportatesubcategories.create' || Route::current()->getName() == 'corportatesubcategories.edit') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Corporate Subcategories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('corportatechildcategories.index')}}" class="nav-link @if(Route::current()->getName() == 'corportatechildcategories.index' ||  Route::current()->getName() == 'corportatechildcategories.create' || Route::current()->getName() == 'corportatechildcategories.edit') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Corporate Child Category</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('users.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
              City Admin
                 
              </p>
            </a>
          </li>
        </ul>
        @endrole

        @role('cityadmin')
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
                  <p>Dummy</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item @if(Route::current()->getName() == 'employees.index' ||  Route::current()->getName() == 'employees.create' || Route::current()->getName() == 'employees.edit' ) menu-is-opening menu-open  @endif ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item  ">
                <a href="{{route('employees.index')}}" class="nav-link @if(Route::current()->getName() == 'employees.index' ||  Route::current()->getName() == 'employees.create' || Route::current()->getName() == 'employees.edit') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employees</p>
                </a>
              </li>
              <li class="nav-item  ">
                <a href="{{route('states.index')}}" class="nav-link @if(Route::current()->getName() == 'states.index' ||  Route::current()->getName() == 'states.create' || Route::current()->getName() == 'states.edit') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Executives</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- <li class="nav-item">
            <a href="{{ route('users.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
              City Admin
                 
              </p>
            </a>
          </li> -->
        </ul>
        @endrole
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>