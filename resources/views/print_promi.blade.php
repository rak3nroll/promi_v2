<!DOCTYPE html>
<html lang="en">
    @include('partials.__head_links')
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-md-2">
        <h2 class="page-header">
        </h2>
      </div>
      <div class="col-md-8 page-header">
           <p align="center" style="font-size: 18px;"><img src="/dist/img/ORMECOLOGO.png" width="50px" height="50px"><br>
            <b>Oriental Mindoro Electric Cooperative, Inc. <br>ORMECO, Inc.</b><br>Brgy. Sta. Isabel, Calapan City, Oriental Mindoro</p>
            <p style="font-size: 14px; text-align: right;"><B>Date : <span id='date-time'></span></B></p>
            <p align="center" style="font-size: 16px;"><B>PROMISSORY NOTE</B></p>
      </div>

      <div class="col-md-2">
        <h2 class="page-header">
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <p style="text-align: justify; font-size: 18px; text-indent: 50px;">I <b><u>{{ $Promisorris[0]->consumer_name }}</u></b> resident of <b><u>{{ $Promisorris[0]->consumer_address }}</u></b> promised to pay the <b>ORIENTAL MINDORO ELECTRIC COOPERATIVE, INC. (ORMECO, Inc.)</b> the outstanding account in the name of <b>{{ $Promisorris[0]->consumer_name }}</b> with account number <b>{{ $Promisorris[0]->account_no }}</b> amounting to <b>{{ $Promisorris[0]->total_balance }}</b> stated below </p>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-12" style="font-size: 14px;">
      <div class="row">
        <div class="col-6" style="font-size: 14px;">
          <p class="lead">Statement of account</p>
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Total Amount:</th>
                <td>php {{ $Promisorris[0]->total_balance }}</td>
              </tr>
              <tr>
                <th>Reconnection Fee:</th>
                <td>php {{ $Promisorris[0]->recon_fee }}</td>
              </tr>
              <tr>
                  <th>Surcharge:</th>
                  <td>php {{ $Promisorris[0]->surcharge }}</td>
              </tr>
              <tr>
                <th>Sub Total :</th>
                <td>php {{ $Promisorris[0]->total_balance +  $Promisorris[0]->recon_fee + $Promisorris[0]->surcharge}}</td>
              </tr>
              <tr>
                <th>Less Partial Payment :</th>
                <td>php {{ $Promisorris[0]->partial_payment }}</td>
              </tr>
              <tr>
                <th>Total Balance:</th>
                <td><b>php {{ ($Promisorris[0]->total_balance +  $Promisorris[0]->recon_fee + $Promisorris[0]->surcharge) - $Promisorris[0]->partial_payment }}</b></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="col-6" style="font-size: 14px;">
          <p class="lead">SCHEDULE OF PAYMENT</p>
          <div class="table-responsive">
            <table class="table">
              <script>
                const start_date = new Date("{{ $Promisorris[0]->start_date }}"); 
                const exp_date = new Date("{{ $Promisorris[0]->exp_date }}"); 
                var month =  ("0"+(start_date.getMonth()+1)).slice(-2);
                var month1 = ("0"+(exp_date.getMonth()+1)).slice(-2);
                var day =  ("0" + start_date.getDate()).slice(-2);
                var yyyy = start_date.getFullYear(); 
                let text = '';
                document.write(" <th >Date of Payment</th> ")
                document.write(" <th >Payment per Month</th> ")
                document.write(" <th >TR Number</th> ")
                  for (rows = month; rows <= month1; rows++) {
                      document.write(" <tr> ")
                         
                          text = yyyy + "-" + rows + "-" + day + "<br>";
                          document.write(" <td >" + text + "</td> ")                        
                          document.write(" <td >php " + {{ $Promisorris[0]->per_month }} + "</td> ")
                          document.write(" <td ></td> ")
                          document.write(" </tr> ")
                        }
              //  document.getElementById("demo").innerHTML = newDate;
                  // var p = document.getElementById("demo"); 
                  // p.innerHTML = text; 
              </script>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.col -->
      <div class="row">
        <div class="col-12 table-responsive">
          <p style="text-align: justify; font-size: 18px; text-indent: 50px;">I further understand that my non-payment of the above stated account within the prescribed period, will give automatic right to <b>ORMECO</b> to get the service drop and meter of <b>{{ $Promisorris[0]->consumer_name }}</b>.</p>
        </div>
        <!-- /.col -->
      </div>
      <div class="row">
        <div class="col-12 table-responsive">
          <br>
          <p style="text-align: justify; font-size: 18px;"><B>{{ $Promisorris[0]->consumer_name }}</B>
            <br>Name of Consumer
          </p>
        </div>
        <!-- /.col -->
      </div>
      <div class="row">
        <div class="col-2 table-responsive">
          <p style="text-align: justify; font-size: 18px;"><B>Prepared By :</B>
            <br><br><b>{{ Auth::user()->name }}</b><br>
            CWDO
          </p>
        </div>
        <div class="col-3 table-responsive">
          <p style="text-align: Center; font-size: 18px;"><B>Recommended By :</B>
            <br><br><b>{{ $users[0]->name }}</b><br>
            {{ $users[0]->position }}
          </p>
        </div>
        <div class="col-3 table-responsive">
          <p style="text-align: center; font-size: 18px;"><B>Approved By :</B>
            <br><br><b>Engr. Michael O. Guico</b><br>
            Area Services Department Manager
          </p>
          {{-- <p id="demo"></p> --}}
        </div>
        <div class="col-4 table-responsive">
          <p style="text-align: center; font-size: 18px;"><B>Noted By :</B>
            <br><br><b>Humphrey A. Dolor, MBA, PECE</b><br>
            General Manager
          </p>
          {{-- <p id="demo"></p> --}}
        </div>
        <!-- /.col -->
      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
<script>
    var date = new Date(); 
    var dd = ("0" + date.getDate()).slice(-2)
    var mm = ("0"+(date.getMonth()+1)).slice(-2)
    var yyyy = date.getFullYear(); 
    var newDate = yyyy + "-" + mm + "-" + dd; 
    var p = document.getElementById("date-time"); 
    p.innerHTML = newDate; 
</script>

{{-- <script>

  const start_date = new Date("{{ $Promisorris->start_date }}"); 
  const exp_date = new Date("{{ $Promisorris->exp_date }}"); 
  var month =  ("0"+(start_date.getMonth()+1)).slice(-2);
  var month1 = ("0"+(exp_date.getMonth()+1)).slice(-2);
  var day =  ("0" + start_date.getDate()).slice(-2);
  var yyyy = start_date.getFullYear(); 
  let text = '';
    for (rows = month; rows <= month1; rows++) {
        document.write(" <tr> ")
          text = yyyy + "-" + rows + "-" + day + "<br>";
            document.write(" <td style= padding:10px >" + text + "</td> ")
            document.write(" </tr> ")
          }
//  document.getElementById("demo").innerHTML = newDate;
var p = document.getElementById("demo"); 
    p.innerHTML = text; 
</script> --}}
</body>
</html>
