<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     <!--  <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <!-- <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div> -->
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown"> </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item dropdown user-menu">
        
        @if(auth()->user()=="")
        @else

        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <span class="d-none d-md-inline"> {{ ucfirst(auth()->user()->name) }}</span>
        </a>
        @endif
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          
          <li class="user-header bg-primary">
           
              @if(auth()->user()!="")
              <small>{{ date('d/m/Y',strtotime(auth()->user()->created_at))}}</small>
              @endif
            </p>
            
          </li>
           
          <li class="user-body">
            <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-default btn-flat float-right" >Sign out</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
            <!-- /.row -->
          </li>
          <!-- Menu Footer-->
          
            <!-- <a href="#" class="btn btn-default btn-flat">Profile</a>
            <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-default btn-flat float-right" >Sign out</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form> -->

           
        </ul>
      </li> 
    </ul>
  </nav>