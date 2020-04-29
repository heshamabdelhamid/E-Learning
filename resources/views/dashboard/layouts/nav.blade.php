<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Ay zeft<sup></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{ request()->segment(1) == 'eldashboard' ? 'active' : ''}}">
        <a class="nav-link" href="{{route('Dashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>{{trans('dashb.dashboard')}}</span></a>
      </li> 


@if(admin()->hasPermissionTo('read_admin'))
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{ request()->segment(2) == 'admins' ? 'active' : ''}}">
        <a class="nav-link" href="{{route('admins.index')}}">
          <i class="fas fa-fw fa-users"></i>
          <span>{{trans('dashb.admins')}}</span></a>
      </li>
@endif

@if(admin()->hasPermissionTo('read_staff'))

      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{ request()->segment(2) == 'staff' ? 'active' : ''}}">
        <a class="nav-link" href="{{route('staff.index')}}">
          <i class="fas fa-fw fa-users"></i>
          <span>{{trans('dashb.staff')}}</span></a>
      </li>
@endif

@if(admin()->hasPermissionTo('read_students'))

      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{ request()->segment(2) == 'students' ? 'active' : ''}}">
        <a class="nav-link" href="{{route('students.index')}}">
          <i class="fas fa-fw fa-users"></i>
          <span>{{trans('dashb.students')}}</span></a>
      </li>
@endif

@if(admin()->hasPermissionTo('read_reservation'))

      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{ request()->segment(2) == 'reservations' ? 'active' : ''}}">
        <a class="nav-link" href="{{route('reservations.index')}}">
          <i class="fas fa-fw fa-list-alt"></i>
          <span>{{trans('dashb.reservations')}}</span></a>
      </li>
@endif

      <!-- Divider -->
 @if(admin()->hasPermissionTo('read_category'))
     
      <hr class="sidebar-divider my-0">

      <!-- Heading -->

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ request()->segment(2) == 'categories' ? 'active' : ''}}">
        <a class="nav-link" href="{{route('categories.index')}}">
          <i class="fas fa-fw fa-list-alt"></i>
          <span>{{trans('dashb.categories')}}</span></a>
      </li>
@endif
 @if(admin()->hasPermissionTo('read_book'))

      <hr class="sidebar-divider my-0">

      <!-- Heading -->

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ request()->segment(2) == 'books' ? 'active' : ''}}">
        <a class="nav-link" href="{{route('books.index')}}">
          <i class="fas fa-fw fa-book"></i>
          <span>{{trans('dashb.books')}}</span></a>
      </li>

@endif






  
   
      <!-- Divider -->

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
<!--           <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="{{trans('dashb.search')}}" aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>




            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{admin()->name}}</span>
                <img class="img-profile rounded-circle" src="{{asset('dashboard/img/default.png')}}">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">


                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  {{trans('dashb.logout')}}
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
     <div class="container-fluid">
           
           @yield('content')

      </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->