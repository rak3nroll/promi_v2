@include('partials.__head_links')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="/dist/img/ORMECOLOGO.png" alt="ORMECO-Logo" height="100" width="100">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('verifier.home') }}" class="nav-link">Home</a>
      </li>

    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown">
            <b>{{ Auth::user()->name }}</b>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
           
          <span class="dropdown-item dropdown-header"> <i class="fas fa-users-cog mr-2"></i>User Settings</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-key mr-2"></i> Change Password
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('logout') }}" class="dropdown-item"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <i class="fa fa-fw fa-power-off text-red mr-2"></i>Logout
          </a>
          <form id="logout-form" action="/auth/logout" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
          <div class="dropdown-divider"></div>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('verifier.home') }}" class="brand-link">
      <img src="/dist/img/ORMECOLOGO.png" alt="ORMECO-Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PromiPortal</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-close">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                MENU ITEM
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active" data-toggle="modal" data-target="#modal-default">
                    <i class="fas fa-file nav-icon"></i>
                  <p>Create New Promisorry</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('verifier.home') }}">Home</a></li>
              <li class="breadcrumb-item active">Create Promisorry</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <form action="/verifier/promisorry" method="post" id="createPromiForm">
        @include('forms.create_promi_forms')
        <div class="row">
          <div class="col-12">
            <a href="{{ route('verifier.home') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-success float-right">
              Submit Promissory
            </button>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
      </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('partials.__footer_links')

</body>
</html>
