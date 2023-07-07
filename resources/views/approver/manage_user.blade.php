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
        <a class="nav-link" data-widget="pushmenu" href="{{ route('approver.home') }}" role="button"><i class="fas fa-bars"></i></a>
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
    <a href="{{ route('approver.home') }}" class="brand-link">
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
            <h1 class="m-0">Manage User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('approver.home') }}">Home</a></li>
              <li class="breadcrumb-item active">Manage User</li>
            </ol> 
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-add-user">
                    <i class="fas fa-user-plus"> 
                    </i>
                         Add new user
                    </a>
                    
                </div>  <div class="col-12">
                  <br>
                  <div class="modal fade" id="modal-add-user">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header bg-info">
                          <h4 class="modal-title"><i class="fas fa-user-plus"> </i> Add new User</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        <form action="#" method="post">
                          @method('PUT')
                            @csrf
                            <div class="form-group">
                              <label for="user_id">User ID:</label>
                              <input type="text" name="user_id" id="user_id" class="form-control col-4">
                            </div>
                            <div class="form-group">
                              <label for="user_name">Name:</label>
                              <input type="text" name="user_name" id="user_name" class="form-control">
                            </div>
                            <div class="form-group">
                              <label for="user_name">Position:</label>
                              <input type="text" name="user_name" id="user_name" class="form-control">
                            </div>
                            <div class="form-group">
                              <label for="email">Email Address:</label>
                              <input type="text" name="email" id="email" class="form-control" >
                            </div>
                            <div class="form-group">
                              <label for="role">User Role:</label>
                              <input type="text" name="role" id="role" class="form-control">
                            </div>
                            <div class="form-group">
                              <label for="district">District Office:</label>
                              <input type="text" name="district" id="district" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                        </form>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                </div>
                <div class="col-12">
                  <!-- /.card -->
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">User Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr align="center">
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email Address</th>
                                <th>User Role</th>
                                <th>District Office</th>
                                <th>Status</th>
                                <th></th>
                              </tr>
                        </thead>
                        <tbody>
                          @foreach ($promisorris as $promisorri )                 
                        <tr>
                            <td>{{ $promisorri->id}}</td>
                            <td>{{ $promisorri->name }}</td>
                            <td align="center">{{ $promisorri->email }}</td>
                            <td align="center">{{ $promisorri->role }}</td>
                            <td align="center">{{ $promisorri->district }}</td>
                            @if ($promisorri->status == 1)
                              <td align="center">Active</td>
                            @else
                              <td align="center">Deactivated</td>
                            @endif
                            <td align="center">
                               <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-edit-user-{{ $promisorri->id}}">
                                <i class="fas fa-user-edit">
                                </i>
                                     Edit
                                </a>
                            </td>
                          </tr>
                          <div class="modal fade" id="modal-edit-user-{{ $promisorri->id}}">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header bg-info">
                                  <h4 class="modal-title"><i class="fas fa-user-edit"></i> User information</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                <form action="/user/{{ $promisorri->id}}" method="post" id="updateuser" name="updateuser">
                                  @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                      <label for="user_id">User ID:</label>
                                      <input type="text" name="user_id" id="user_id" class="form-control col-4" disabled value="{{ $promisorri->id }}">
                                    </div>
                                    <div class="form-group">
                                      <label for="name">Name:</label>
                                      <input type="text" name="name" id="name" class="form-control" value="{{ $promisorri->name }}">
                                    </div>
                                    <div class="form-group">
                                      <label for="email">Email Address:</label>
                                      <input type="email" name="email" id="email" class="form-control" value="{{ $promisorri->email }}">
                                    </div>
                                    <div class="form-group">
                                      <label for="position">Position:</label>
                                      <input type="text" name="position" id="position" class="form-control" value="{{ $promisorri->position }}">
                                    </div>
                                    <div class="form-group">
                                      Access Level:
                                      <select class="form-control" name="role" id="role">
                                        @if ($promisorri->role == 'user' )
                                          <option value="0">{{ $promisorri->role }}</option>
                                          <option value="1">Verifier</option>
                                          <option value="3">Billing</option>
                                        @elseif ($promisorri->role == 'verifier' )
                                          <option value="1">{{ $promisorri->role }}</option>
                                          <option value="0">user</option>
                                          <option value="3">Billing</option>                                      
                                        @elseif ($promisorri->role == 'billing' )
                                          <option value="3">{{ $promisorri->role }}</option>
                                          <option value="0">user</option>
                                          <option value="1">Verifier</option>
                                        @endif
                                      </select>
                                    </div>
                                    <div class="form-group">
                                        District Office:
                                        <select class="form-control" name="district" id="district">
                                          @if ($promisorri->district == "District 1A" )
                                            <option value="District 1A">{{ $promisorri->district }}</option>
                                            <option value="District 1B">District 1B</option>
                                            <option value="District 2">District 2</option>
                                            <option value="District 3">District 3</option>
                                            <option value="District 4">District 4</option>
                                            <option value="District 5">District 5</option>
                                            <option value="District 6">District 6</option>
                                            <option value="District 7">District 7</option>  
                                          @elseif ($promisorri->district == "District 1B")
                                            <option value="District 1B">{{ $promisorri->district }}</option>
                                            <option value="District 1A">District 1A</option>
                                            <option value="District 2">District 2</option>
                                            <option value="District 3">District 3</option>
                                            <option value="District 4">District 4</option>
                                            <option value="District 5">District 5</option>
                                            <option value="District 6">District 6</option>
                                            <option value="District 7">District 7</option>
                                          @elseif ($promisorri->district == "District 2")
                                            <option value="District 2">{{ $promisorri->district }}</option>
                                            <option value="District 1A">District 1A</option>
                                            <option value="District 1B">District 1B</option>
                                            <option value="District 3">District 3</option>
                                            <option value="District 4">District 4</option>
                                            <option value="District 5">District 5</option>
                                            <option value="District 6">District 6</option>
                                            <option value="District 7">District 7</option>
                                          @elseif ($promisorri->district == "District 3")
                                            <option value="District 3">{{ $promisorri->district }}</option>
                                            <option value="District 1A">District 1A</option>
                                            <option value="District 1B">District 1B</option>
                                            <option value="District 2">District 2</option>
                                            <option value="District 4">District 4</option>
                                            <option value="District 5">District 5</option>
                                            <option value="District 6">District 6</option>
                                            <option value="District 7">District 7</option>
                                          @elseif ($promisorri->district == "District 4")
                                            <option value="District 4">{{ $promisorri->district }}</option>
                                            <option value="District 1A">District 1A</option>
                                            <option value="District 1B">District 1B</option>
                                            <option value="District 2">District 2</option>
                                            <option value="District 3">District 3</option>
                                            <option value="District 5">District 5</option>
                                            <option value="District 6">District 6</option>
                                            <option value="District 7">District 7</option>  
                                          @elseif ($promisorri->district == "District 5")
                                            <option value="District 5">{{ $promisorri->district }}</option>
                                            <option value="District 1A">District 1A</option>
                                            <option value="District 1B">District 1B</option>
                                            <option value="District 2">District 2</option>
                                            <option value="District 3">District 3</option>
                                            <option value="District 4">District 4</option>
                                            <option value="District 6">District 6</option>
                                            <option value="District 7">District 7</option>  
                                          @elseif ($promisorri->district == "District 6")
                                            <option value="District 6">{{ $promisorri->district }}</option>
                                            <option value="District 1A">District 1A</option>
                                            <option value="District 1B">District 1B</option>
                                            <option value="District 2">District 2</option>
                                            <option value="District 3">District 3</option>
                                            <option value="District 4">District 4</option>
                                            <option value="District 5">District 5</option>
                                            <option value="District 7">District 7</option>  
                                          @elseif ($promisorri->district == "District 7")
                                            <option value="District 7"> {{ $promisorri->district }}</option>
                                            <option value="District 1A">District 1A</option>
                                            <option value="District 1B">District 1B</option>
                                            <option value="District 2">District 2</option>
                                            <option value="District 3">District 3</option>
                                            <option value="District 4">District 4</option>
                                            <option value="District 5">District 5</option>
                                            <option value="District 6">District 6</option>                                 
                                          @endif
                                        </select>
                                        <div class="form-group">
                                          Account Status:
                                          <select class="form-control" name="status" id="status">
                                            @if ($promisorri->status ==2 )
                                              <option value="2">Deactivate</option>
                                              <option value="1">Activate</option>
                                            @elseif ($promisorri->status ==1 )
                                              <option value="1">Active</option>
                                              <option value="2">Deactivate</option>
                                            @endif
                                          </select>
                                        </div>
                                    </div>
                                </div>
                                  <div class="modal-footer justify-content-between">
                                    <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                  </div>
                                </div>
                              </form>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>
                          <!-- /.modal -->
                          @endforeach
                        </tbody>
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 @include('partials.__footer_links')
</body>
</html>
