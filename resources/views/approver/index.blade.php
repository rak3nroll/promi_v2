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
        <a class="nav-link" data-widget="pushmenu" href="{{ route('verifier.home') }}" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('approver.home') }}" class="nav-link">Home</a>
      </li>

    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <!-- Notifications Dropdown Menu -->
    @if ($is_pending == 0)
    @else
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">{{ $is_pending }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">{{ $is_pending }} Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> {{ $is_pending }} new promisorry for verification
                </a>
            </div>
        </li>
    @endif
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
                <a href="{{ route('show.user') }}" class="nav-link active">
                    <i class="fas fa-users nav-icon"></i>
                  <p>Manage User</p>
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
              <li class="breadcrumb-item"><a href="{{ route('approver.home') }}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $is_approve }}</h3>
                <p>Approve Promissory</p>
              </div>
              <div class="icon">
                <i class="fas fa-thumbs-up"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $is_pending }}</h3>

                <p>On-Process Promissory</p>
              </div>
              <div class="icon">
                <i class="fas fa-file-signature"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $is_posted }}</h3>

                    <h4>Posted Promissory</h4>
                </div>
                <div class="icon">
                    <i class="fas fa-tags"></i>
                </div>
            </div>
        </div>
    </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <!-- /.card -->
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Promissory Monitoring Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr align="center">
                                <th>Consumer Name</th>
                                <th>Address</th>
                                <th>Contact #</th>
                                <th>Account #</th>
                                <th>No. of Bills</th>
                                <th>Total Balance</th>
                                <th>Status</th>
                                <th></th>
                              </tr>
                        </thead>
                        <tbody>
                          @foreach ($promisorris as $promisorri )                 
                        <tr>
                            <td>{{ $promisorri->consumer_name}}</td>
                            <td>{{ $promisorri->consumer_address }}</td>
                            <td align="center">{{ $promisorri->consumer_contact }}</td>
                            <td align="center">{{ $promisorri->account_no }}</td>
                            <td align="center">{{ $promisorri->no_of_bills }}</td>
                            <td align="center">{{ $promisorri->total_amount }}</td>
                            @if ($promisorri->is_approve == '1' and $promisorri->is_verified == '1' and $promisorri->is_posted == '1' )
                            <td align="center">Posted</td>
                            @elseif ($promisorri->is_approve == '1' and $promisorri->is_verified == '1' and $promisorri->is_posted == '0')
                            <td align="center">Approved</td>
                            @elseif ($promisorri->is_approve == '0' and $promisorri->is_verified == '1' and $promisorri->is_posted == '0')
                            <td align="center">Verified</td>
                            @else
                            <td align="center">On-Process</td>
                            @endif
                            @if ($promisorri->is_verified==0)
                            <td align="center">
                              <a class="btn btn-primary btn-sm disabled" href="/record/{{ $promisorri->id }}">
                               <i class="fas fa-folder">
                               </i>
                                    View
                               </a>
                            </td>
                          </tr>
                          @elseif ($promisorri->is_approve==1)
                          <td align="center">
                            <a class="btn btn-success btn-sm" href="/record/{{ $promisorri->id }}">
                             <i class="fas fa-folder">
                             </i>
                                  View
                             </a>
                          </td>
                          @else
                          <td align="center">
                            <a class="btn btn-primary btn-sm" href="/record/{{ $promisorri->id }}">
                             <i class="fas fa-folder">
                             </i>
                                  View
                             </a>
                          </td>
                        </tr>
                          @endif
                          @endforeach
                        </tbody>
                        <tfoot>
                        {{-- <tr>
                          <th>Rendering engine</th>
                          <th>Browser</th>
                          <th>Platform(s)</th>
                          <th>Engine version</th>
                          <th>CSS grade</th>
                        </tr> --}}
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
          </section>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 @include('partials.__footer_links')
</body>
</html>
