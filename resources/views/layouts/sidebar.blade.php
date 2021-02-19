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
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Category Management
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
              <i class="nav-icon fas fa-map-marker"></i>
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
              <i class="nav-icon fas fa-list-alt"></i>
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
           <li class="nav-item @if(Route::current()->getName() == 'crews.index' ||  Route::current()->getName() == 'crews.create' || Route::current()->getName() == 'crews.edit'||Route::current()->getName() == 'executives.index' ||  Route::current()->getName() == 'executives.create' || Route::current()->getName() == 'executives.edit' || Route::current()->getName() == 'assignEmployeesCategory' || Route::current()->getName() == 'searchEmployee' || Route::current()->getName() == 'assignCategory' || Route::current()->getName() == 'searchExecutive' ) menu-is-opening menu-open  @endif ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item  ">
                <a href="{{route('crews.index')}}" class="nav-link @if(Route::current()->getName() == 'crews.index' ||  Route::current()->getName() == 'crews.create' || Route::current()->getName() == 'crews.edit' ||Route::current()->getName() == 'assignEmployeesCategory' || Route::current()->getName() == 'searchEmployee' ) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crew Members</p>
                </a>
              </li>
              <li class="nav-item  ">
                <a href="{{route('executives.index')}}" class="nav-link @if(Route::current()->getName() == 'executives.index' ||  Route::current()->getName() == 'executives.create' || Route::current()->getName() == 'executives.edit'|| Route::current()->getName() == 'assignCategory' || Route::current()->getName() == 'searchExecutive' ) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Executives</p>
                </a>
              </li>
            </ul>
          </li>
          
          
          
           
          <li class="nav-item">
            <a href="{{ route('individualusers.index')}}" class="nav-link @if(Route::current()->getName() == 'individualusers.index') active @endif">
              <i class="nav-icon fas fa-user"></i>
              <p> Individual Users </p>
            </a>
          </li>
         
          <li class="nav-item">
            <a href="{{ route('corporateusers.index')}}" class="nav-link @if(Route::current()->getName() == 'corporateusers.index' || Route::current()->getName() == 'corporateusers.edit' || Route::current()->getName() == 'corporateusers.create') active @endif">
              <i class="nav-icon fas fa-user"></i>
              <p> Corporate  Users </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('blogs.index')}}" class="nav-link @if(Route::current()->getName() == 'blogs.index' || Route::current()->getName() == 'blogs.edit' || Route::current()->getName() == 'blogs.create') active @endif">
              <i class="nav-icon fas fa-book"></i>
              <p> Blogs </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('banners.index')}}" class="nav-link @if(Route::current()->getName() == 'banners.index' || Route::current()->getName() == 'banners.edit' || Route::current()->getName() == 'banners.create') active @endif">
              <i class="nav-icon far fa-image"></i>
              <p> Banners </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('featuredimages.index')}}" class="nav-link @if(Route::current()->getName() == 'featuredimages.index' || Route::current()->getName() == 'featuredimages.edit' || Route::current()->getName() == 'featuredimages.create'  ) active @endif">
              <i class="nav-icon far fa-image"></i>
              <p> Featured Images </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{ route('pagecontent.index')}}" class="nav-link @if(Route::current()->getName() == 'pagecontent.index' || Route::current()->getName() == 'pagecontent.edit' || Route::current()->getName() == 'pagecontent.create'  ) active @endif">
              <i class="nav-icon far fa-file"></i>
              <p>Pages </p>
            </a>
          </li>
          
           


        </ul>
        @endrole

        @role('cityadmin')
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item @if(Route::current()->getName() == 'crews.index' ||  Route::current()->getName() == 'crews.create' || Route::current()->getName() == 'crews.edit'||Route::current()->getName() == 'executives.index' ||  Route::current()->getName() == 'executives.create' || Route::current()->getName() == 'executives.edit' || Route::current()->getName() == 'assignEmployeesCategory' || Route::current()->getName() == 'searchEmployee' || Route::current()->getName() == 'assignCategory' || Route::current()->getName() == 'searchExecutive' ) menu-is-opening menu-open  @endif ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item  ">
                <a href="{{route('crews.index')}}" class="nav-link @if(Route::current()->getName() == 'crews.index' ||  Route::current()->getName() == 'crews.create' || Route::current()->getName() == 'crews.edit' ||Route::current()->getName() == 'assignEmployeesCategory' || Route::current()->getName() == 'searchEmployee' ) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crew Members</p>
                </a>
              </li>
              <li class="nav-item  ">
                <a href="{{route('executives.index')}}" class="nav-link @if(Route::current()->getName() == 'executives.index' ||  Route::current()->getName() == 'executives.create' || Route::current()->getName() == 'executives.edit'|| Route::current()->getName() == 'assignCategory' || Route::current()->getName() == 'searchExecutive' ) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Executives</p>
                </a>
              </li>
            </ul>
          </li>
          <?php
          $userType = auth()->user()->user_type;
          
          //Usertype 0 Corporate and 1 Individual
          if($userType==1){
          ?>
          <li class="nav-item">
            <a href="{{ route('individualusers.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p> Individual Users </p>
            </a>
          </li>
          <li class="nav-item @if(Route::current()->getName() == 'individualinquiry.index' ||  Route::current()->getName() == 'individualinquiry.create' || Route::current()->getName() == 'individualinquiry.edit' || Route::current()->getName() == 'executives.index' ||  Route::current()->getName() == 'executives.create' || Route::current()->getName() == 'executives.edit'|| Route::current()->getName() == 'assigncrewsinquiry'|| Route::current()->getName() == 'assignexecutiveinquiry' ) menu-is-opening menu-open  @endif ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Inquiries
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item  ">
                <a href="{{route('individualinquiry.index')}}" class="nav-link @if(Route::current()->getName() == 'individualinquiry.index' ||  Route::current()->getName() == 'individualinquiry.create' || Route::current()->getName() == 'individualinquiry.edit' || Route::current()->getName() == 'assigncrewsinquiry'|| Route::current()->getName() == 'assignexecutiveinquiry') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listing</p>
                </a>
              </li>
              
            </ul>
          </li>
        <?php } ?>
        <?php if($userType==0){
          ?>
          <li class="nav-item">
            <a href="{{ route('corporateusers.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p> Corporate  Users </p>
            </a>
          </li>

          <li class="nav-item @if(Route::current()->getName() == 'individualinquiry.index' ||  Route::current()->getName() == 'individualinquiry.create' || Route::current()->getName() == 'individualinquiry.edit' || Route::current()->getName() == 'executives.index' ||  Route::current()->getName() == 'executives.create' || Route::current()->getName() == 'executives.edit'|| Route::current()->getName() == 'assigncrewsinquiry'|| Route::current()->getName() == 'assignexecutiveinquiry' ) menu-is-opening menu-open  @endif ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Corporate Inquiries
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item  ">
                <a href="{{route('corporateinquiry.index')}}" class="nav-link @if(Route::current()->getName() == 'corporateinquiry.index' ||  Route::current()->getName() == 'corporateinquiry.create' || Route::current()->getName() == 'corporateinquiry.edit' || Route::current()->getName() == 'assigncrewsinquiry'|| Route::current()->getName() == 'assignexecutiveinquiry') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listing</p>
                </a>
              </li>
              
            </ul>
          </li>
        <?php }?>
        </ul>
        @endrole
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>