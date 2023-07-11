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
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">

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
                    <a href="{{ route('home') }}" class="nav-link">Home</a>
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

                        <span class="dropdown-item dropdown-header"> <i class="fas fa-users-cog mr-2"></i>User
                            Settings</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-key mr-2"></i> Change Password
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
            <a href="{{ route('home') }}" class="brand-link">
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
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Edit Promisorry Information</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <form action="/promisorry/{{ $Promisorris->id }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">Consumer Information</h3>  
                              <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                  <i class="fas fa-minus"></i>
                                </button>
                              </div>
                            </div>
                            
                            <div class="card-body">
                              <div class="form-group">
                                <input type="text" name="encoder" id="encoder" class="form-control" hidden value="{{ auth::user()->name }}">
                                <input type="text" name="district" id="district" class="form-control" hidden value="{{ auth::user()->district }}">
                              </div>
                              <div class="form-group">
                                <label for="consumer_name">Consumer Name</label>
                                <input type="text" name="consumer_name" id="consumer_name" class="form-control" value="{{ $Promisorris->consumer_name }}">
                              </div>
                              <div class="form-group">
                                <label for="consumer_address">Address</label>
                                <input type="text" name="consumer_address" id="consumer_address" class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="contact_no">Contact Number:</label>
                                <input type="text" name="consumer_contact" id="consumer_contact" class="form-control">
                              </div>
                              
                            </div>
                            <!-- /.card-body -->
                          </div>
                        </div>
                  
                       <div class="col-md-6" >
                          <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">Billing Information</h3>
                  
                              <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                  <i class="fas fa-minus"></i>
                                </button>
                              </div>
                            </div>
                            <div class="card-body">
                              <div class="form-group">
                                <label for="account_no">Account Number</label>
                                <input type="text" name="account_no" id="account_no" class="form-control">
                              </div>
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label for="no_of_bills">Number of Bill to Pay</label>
                                    <input type="text" name="no_of_bills" id="no_of_bills" class="form-control">                
                                  </div>   
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label for="total_balance">Total Balance</label>
                                    <input type="text" id="total_balance" name="total_balance" class="form-control">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label for="tr_no_recon">TR Number</label>
                                   <input type="text" name="tr_no_recon" id="tr_no_recon" class="form-control">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label for="recon_fee">Reconnection Fee:</label>
                                    <input type="text" name="recon_fee" id="recon_fee" class="form-control" value="112.00">             
                                  </div>
                                </div>
                              </div>    
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label for="tr_no_surcharge">TR Number</label>
                                   <input type="text" name="tr_no_surcharge" id="tr_no_surcharge" class="form-control">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label for="surcharge">Surcharge:</label>
                                    <input type="text" name="surcharge" id="surcharge" class="form-control">             
                                  </div>
                                </div> 
                              </div>        
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label for="sub_total">Sub Total</label>
                                    <input type="text" id="sub_total" name="sub_total" class="form-control" >
                                  </div>
                                </div>
                              </div>  
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label for="months_to_pay">How many months to pay</label>
                                    <input type="text" id="months_to_pay" name="months_to_pay" class="form-control">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label for="total_amount">Total Amount</label>
                                    <input type="text" id="total_amount" name="total_amount" class="form-control" >
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-6">
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label for="partial_payment">Partial Payment: </label>
                                      <input name="partial" id="partial" type="checkbox" onclick="isChecked()">
                                      <label for="">  50%</label>
                                    <input type="text" id="partial_payment" name="partial_payment" class="form-control">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-6">
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label for="per_month">Payment per month</label>
                                    <input type="text" id="per_month" name="per_month" class="form-control" >
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" name="start_date" id="start_date" class="form-control">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label for="exp_date">Expiration Date</label>
                                    <input type="date" name="exp_date" id="exp_date" class="form-control">
                                  </div>
                                </div>
                              </div>         
                              <div class="form-group">
                                <label for="remarks">Remarks</label>
                                <textarea id="remarks" name="remarks" class="form-control" rows="4"></textarea>
                              </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="{{ route('home') }}" class="btn btn-secondary">Back</a>
                                            @if ($Promisorris->is_verified == '0')
                                                <button type="submit" class="btn btn-info float-right">
                                                    Submit Promissory
                                                </button>
                                            @else
                                                <button type="submit" class="btn btn-info float-right" disabled>
                                                    Submit Promissory
                                                </button>
                                            @endif
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

    <script>
        function round2Fixed(value) {
            value = +value;

            if (isNaN(value))
                return NaN;

            // Shift
            value = value.toString().split('e');
            value = Math.round(+(value[0] + 'e' + (value[1] ? (+value[1] + 2) : 2)));

            // Shift back
            value = value.toString().split('e');
            return (+(value[0] + 'e' + (value[1] ? (+value[1] - 2) : -2))).toFixed(2);
        }
    </script>

    <script>
        $('#total_balance, #partial_payment').on('change keyup', function() {
            var tot_bal = $("#total_balance").val();
            var partial = $("#partial_payment").val();
            var tot_amount = tot_bal - partial;

            $("#total_amount").val(round2Fixed(tot_amount));
        });


        $('#total_amount, #months_to_pay').on('change keyup', function() {
            var total_amount = $("#total_amount").val();
            var month_to_pay = $("#months_to_pay").val();
            var per_month = total_amount / month_to_pay;

            $("#per_month").val(round2Fixed(per_month));
        });
    </script>

</body>

</html>
