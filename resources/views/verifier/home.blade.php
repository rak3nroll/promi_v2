<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title != '' ? $title : 'ORMECO-Promissory Portal' }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/plugins/jqvmap/jqvmap.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
        rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="/dist/img/ORMECOLOGO.png" alt="ORMECO-Logo" height="100"
                width="100">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/home/verifier" class="nav-link">Home</a>
                </li>

            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                @if ($is_verified == 0)
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-bell"></i>
                            <span class="badge badge-warning navbar-badge">{{ $is_verified }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-item dropdown-header">{{ $is_verified }} Notifications</span>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i> {{ $is_verified }} new promisorry for verification
                            </a>
                        </div>
                    </li>
                @endif
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown">
                        <b>{{ Auth::user()->name }}</b>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                        <span class="dropdown-item dropdown-header"> <i class="fas fa-users-cog mr-2"></i>User
                            Settings</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item ">
                            <i class="fas fa-key mr-2 "></i> Change Password
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}"
                            class="dropdown-item"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
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
            <a href="" class="brand-link">
                <img src="/dist/img/ORMECOLOGO.png" alt="ORMECO-Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">PromiPortal</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
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
                            @if (Auth::user()->role == 'user')
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('create.promi') }}" class="nav-link active ">
                                            <i class="fas fa-file nav-icon"></i>
                                            <p>Create New Promisorry</p>
                                        </a>
                                    </li>
                                </ul>
                            @elseif(Auth::user()->role == 'verifier')
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="/verifier/promisorry" class="nav-link  ">
                                            <i class="fas fa-file nav-icon"></i>
                                            <p>Create New Promisorry</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link ">
                                            <i class="fas fa-file nav-icon"></i>
                                            <p>test</p>
                                        </a>
                                    </li>
                                </ul>
                            @else
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link active">
                                            <i class="fas fa-file nav-icon"></i>
                                            <p>Manage User</p>
                                        </a>
                                    </li>
                                </ul>
                            @endif
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
                                <li class="breadcrumb-item"><a href="//home/verifier">Home</a></li>
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
                                                        <th>Total Amount</th>
                                                        <th>Status</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($promisorris as $promisorri)
                                                        <tr>
                                                            <td>{{ $promisorri->consumer_name }}</td>
                                                            <td>{{ $promisorri->consumer_address }}</td>
                                                            <td align="center">{{ $promisorri->consumer_contact }}
                                                            </td>
                                                            <td align="center">{{ $promisorri->account_no }}</td>
                                                            <td align="center">{{ $promisorri->no_of_bills }}</td>
                                                            <td align="center">{{ $promisorri->total_amount }}</td>
                                                            @if ($promisorri->is_approve == '1')
                                                                <td align="center">Approved</td>
                                                            @else
                                                                <td align="center">On-Process</td>
                                                            @endif
                                                            <td align="center">
                                                                @if (Auth::user()->role != 'user' and $promisorri->is_verified == '0')
                                                                    <a class="btn btn-primary btn-sm"
                                                                        href="/verifier/record/{{ $promisorri->id }}">
                                                                        <i class="fas fa-folder">
                                                                        </i>
                                                                        View
                                                                    </a>
                                                                @elseif(Auth::user()->role != 'user' and $promisorri->is_verified == '1')
                                                                    <a class="btn btn-success btn-sm"
                                                                        href="/verifier/record/{{ $promisorri->id }}">
                                                                        <i class="fas fa-folder">
                                                                        </i>
                                                                        View
                                                                    </a>
                                                                @endif
                                                            </td>
                                                        </tr>
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
        <footer class="main-footer">
            <strong>ORMECO, Inc. &copy; Promisorry | Portal</strong>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="/plugins/moment/moment.min.js"></script>
    <script src="/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/dist/js/pages/dashboard.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="/../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/../../plugins/jszip/jszip.min.js"></script>
    <script src="/../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="/../../plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="/../../plugins/toastr/toastr.min.js"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                "paging": true,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    <script>
        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>
</body>

</html>
