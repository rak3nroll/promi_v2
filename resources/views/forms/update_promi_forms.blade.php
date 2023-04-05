@csrf
<div class="row">
  <div class="col-md-6">
  <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Consumer Information</h3>  
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse" >
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="consumer_name">Consumer Name</label>
          <input type="text" name="consumer_name" id="consumer_name" class="form-control" disabled value="{{ $Promisorris->consumer_name }}">
        </div>
        <div class="form-group">
          <label for="consumer_address">Address</label>
          <input type="text" name="consumer_address" id="consumer_address" class="form-control" disabled value="{{ $Promisorris->consumer_address }}">
        </div>
        <div class="form-group">
          <label for="contact_no">Contact Number:</label>
          <input type="text" name="consumer_contact" id="consumer_contact" class="form-control" disabled value="{{ $Promisorris->consumer_contact }}">
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
          <input type="text" name="account_no" id="account_no" class="form-control" disabled value="{{ $Promisorris->account_no }}">
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="no_of_bills">Number of Bill to Pay</label>
              <input type="text" name="no_of_bills" id="no_of_bills" class="form-control" disabled value="{{ $Promisorris->no_of_bills }}">                
            </div>   
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="total_balance">Total Balance</label>
              <input type="text" id="total_balance" name="total_balance" class="form-control" disabled value="{{ $Promisorris->total_balance }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="partial">Partial Payment</label>
              <input type="text" id="partial_payment" name="partial_payment" class="form-control" disabled value="{{ $Promisorris->partial_payment }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="months_to_pay">How many months to pay</label>
              <input type="text" id="months_to_pay" name="months_to_pay" class="form-control" disabled value="{{ $Promisorris->months_to_pay }}">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="total_amount">Total Amount</label>
              <input type="text" id="total_amount" name="total_amount" class="form-control" disabled value="{{ $Promisorris->total_amount }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="per_month">Payment per month</label>
              <input type="text" id="per_month" name="per_month" class="form-control" disabled value="{{ $Promisorris->per_month }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="start_date">Start Date</label>
              <input type="date" name="start_date" id="start_date" class="form-control" disabled value="{{ $Promisorris->start_date }}">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="exp_date">Expiration Date</label>
              <input type="date" name="exp_date" id="exp_date" class="form-control" disabled value="{{ $Promisorris->exp_date }}">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="">Other Charges</label>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="recon_fee">Reconnection Fee:</label>
              <input type="text" name="recon_fee" id="recon_fee" class="form-control" disabled value="{{ $Promisorris->recon_fee }}">             
            </div>
          </div> 
          <div class="col-sm-6">
            <div class="form-group">
              <label for="tr_no_recon">TR Number</label>
             <input type="text" name="tr_no_recon" id="tr_no_recon" class="form-control" disabled value="{{ $Promisorris->tr_no_recon }}">
            </div>
          </div>
        </div>    
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="surcharge">Surcharge:</label>
              <input type="text" name="surcharge" id="surcharge" class="form-control" disabled value="{{ $Promisorris->surcharge }}">             
            </div>
          </div> 
          <div class="col-sm-6">
            <div class="form-group">
              <label for="tr_no_surcharge">TR Number</label>
             <input type="text" name="tr_no_surcharge" id="tr_no_surcharge" class="form-control" disabled value="{{ $Promisorris->tr_no_surcharge }}">
            </div>
          </div>
        </div>                   
        <div class="form-group">
          <label for="remarks">Remarks</label>
          <textarea id="remarks" name="remarks" class="form-control" rows="4" disabled value="{{ $Promisorris->remarks }}"></textarea>
        </div>