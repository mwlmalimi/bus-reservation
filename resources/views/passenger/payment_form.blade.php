@extends('passenger.layouts.passenger_layout')

@section('more-headers')

@endsection

@section('content')

<div class="row d-flex justify-content-center">
  
  <div class="col-md-6">
    
    @if(session('message'))
    <div class="row">
      <div class="col-12">
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>{{session('message')}}.</strong>
        </div>
      </div>
    </div>
    @endif
    
    <div class="card">
      <h4 class="card-header">
        Hello {{$passenger_name}}, please pay to finish booking!
      </h4>
      <div class="card-body">
                
        <div class="form-group">
          <label for="" ><h4 class="card-title">Payment Method:</h4></label>
          <select class="form-control" name="payment_method" id="payment_method">
            <option value="" selected disabled>choose</option>
            <option value="m-pesa">M-PESA</option>
            <option value="tigo-pesa">TIGO-PESA</option>
            <option value="airtel-money">AIRTEL-MONEY</option>
          </select>      
        </div>
        
        <h4 class="card-title" id="payment_info"></h4>
                
        <br>
        
        <h4 class="card-title text-danger">If Already paid, enter the transaction code below:</h4>
        <hr>
        
        <form action="{{url('/payment')}}" method="post">
            
          @csrf
          
          <div class="form-group">
            <input type="text" name="transaction_code" value=""
              class="form-control" placeholder="Transaction Code"
              value="{{old('transaction_code')}}"
              required>
          </div>
          
          <div>
            <button type="submit" class="float-right btn btn-primary">submit</button>
          </div>
          
        </form>
        
      </div>
      
    </div>
    
  </div>
  
  
</div>

<script type="text/javascript">
$("#payment_method").on("change", function() {
  let option = $("#payment_method").val()
  if ( option === "m-pesa") {
    $("#payment_info").html("Company Number: " + 4560 + "<br><br>" + "Reference Number: {{session('reference_number')}}")
  } else if (option === "tigo-pesa") {
    $("#payment_info").html("Company Number: " + 8839 + "<br><br>" + "Reference Number: {{session('reference_number')}}")
  } else if (option === "airtel-money") {
    $("#payment_info").html("Company Number: " + 9382 + "<br><br>" + "Reference Number: {{session('reference_number')}}")
  }
})  
</script>

@endsection
