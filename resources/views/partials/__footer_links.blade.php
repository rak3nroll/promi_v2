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
<script src="/../../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/../../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/../../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/../../plugins/sparklines/sparkline.js"></script>
<!-- jQuery Knob Chart -->
<script src="/../../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/../../plugins/moment/moment.min.js"></script>
<script src="/../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- bs-custom-file-input -->
<script src="/../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

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
<!-- jquery-validation -->
<script src="/../../plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="/../../plugins/jquery-validation/additional-methods.min.js"></script>

<!-- AdminLTE App -->
<script src="/../../dist/js/adminlte.js"></script>

<script>
  $(function () {
    bsCustomFileInput.init();
  });
  </script>

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
        "searching": true,
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
   
    $(document).Toasts('create', {
    class: 'bg-warning',
    title: 'Notification',
    subtitle: 'Message',
    body: "{{ Session('warning') }}"
})
@endif
</script>

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
    $('#total_balance, #partial_payment, #recon_fee, #surcharge ').on('change keyup', function(){
      var tot_bal = parseInt($("#total_balance").val());
      var partial = $("#partial_payment").val();
      var recon = parseInt($("#recon_fee").val());
      var surcharge = parseInt($("#surcharge").val());
      var tot_amount = (recon+tot_bal+surcharge)

      $("#sub_total").val(round2Fixed(tot_amount));
      $("#total_amount").val(round2Fixed(tot_amount));
    });
  
    $('#total_amount, #months_to_pay').on('change keyup', function(){
      var total_amount = $("#total_amount").val();
      var month_to_pay = $("#months_to_pay").val();
     
      var per_month = total_amount / month_to_pay;
  
      $("#per_month").val(round2Fixed(per_month));
    });
  </script>
  
  <script>
    $(function () {
      // $.validator.setDefaults({
      //   submitHandler: function () {
      //     alert( "Form successful submitted!" );
      //   }
      // });
      $('#createPromiForm').validate({
        rules: {
          consumer_name: {
            required: true,
          },
          consumer_address: {
            required: true,
          },
          consumer_contact: {
            required: true,
          },
          account_no: {
            required: true,
          },
          no_of_bills: {
            required: true,
          },
          total_balance: {
            required: true,
          },
          partial_payment: {
            required: true,
          },
          months_to_pay: {
            required: true,
          },
          start_date: {
            required: true,
          },
          exp_date: {
            required: true,
          },
          recon_fee: {
            required: true,
          },
          tr_no_recon: {
            required: true,
            min: 8,
          },
          surcharge: {
            required: true,
          },
          tr_no_surcharge: {
            required: true,
            min: 8,
          },
        },
        messages: {
          consumer_name: {
            required: "Please enter a consumer name",
          },
          consumer_address: {
            required: "Please enter a address",
          },
          consumer_contact: {
            required: "Please provide contact number",
          },
          account_no: {
            required: "Please enter a account number",
          },
          no_of_bills: {
            required: "Please enter a consumer name",
          },
          total_balance: {
            required: "Please enter a total balance",
          },
          partial_payment: {
            required: "Please enter a partial payment",
          },
          months_to_pay: {
            required: "Please enter a months to pay",
          },
          start_date: {
            required: "Please provide date to start",
          },
          exp_date: {
            required: "Please enter a expiration date",
          },
          recon_fee: {
            required: "Please provide Reconnetion Fee",
          },
          tr_no_recon: {
            required: "Invalid TR Number",
          },
          surcharge: {
            required: "Please provide Surcharge",
          },
          tr_no_surcharge: {
            required: "Invalid TR Number must have atleast 8",
          },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
    </script>
    <script>
       $('.deletemessage').click(function() {
      Swal.fire({
        title: 'Are you sure?',
        text: "You want to deactivate this account?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, deactivate!'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Deactivated!',
            'User account has been deactivated.',
            'success'
          )
        }
      })
    });
    </script>
    <script>
      function isChecked(){
      var sub_total_bal = document.getElementById("sub_total").value;
        if(document.getElementById("partial").checked){
          document.getElementById("partial_payment").value = sub_total_bal * .50;
          document.getElementById("total_amount").value = sub_total_bal - document.getElementById("partial_payment").value;
        }
      }
    </script>