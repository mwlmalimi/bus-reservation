@extends('passenger.layouts.passenger_layout')

@section('more-headers')
<style>
  .receipt-title {
    font-size: 20px;
    color: #28a745;
    /*font-weight: bold;*/
  }
</style>
@endsection

@section('content')

  <div class="card">
    
    <h4 class="card-header">Receipt</h4>
    
    <div class="card-body">
      
      <div class="row">
        <div class="col-12">
          <span class="receipt-title">Ticket No:</span> {{$reference_number}}
        </div>
      </div>
      
      <div class="row">
        <div class="col-12">
          <span class="receipt-title">Name:</span> {{$passenger->first_name . " " . $passenger->last_name}}
        </div>
      </div>
      
      <div class="row">
        <div class="col-12">
          <span class="receipt-title">Phone Number:</span> {{$passenger->phone_number}}
        </div>
      </div>
      
      <div class="row">
        <div class="col-sm-3">
          <span class="receipt-title">From:</span> {{$schedule->origin}}
        </div>
        <div class="col-sm-3">
          <span class="receipt-title">To:</span> {{$schedule->destination}}
        </div>
      </div>
      
      <div class="row">
        <div class="col-sm-3">
          <span class="receipt-title">Bus Company:</span> {{$schedule->company->name}}
        </div>
        <div class="col-sm-3">
          <span class="receipt-title">Plate Number:</span> {{$schedule->bus->plate_number}}
        </div>
        <div class="col-sm-3">
          <span class="receipt-title">Seat Number:</span> {{$passenger->seats_taken}}
        </div>
      </div>
      
      <div class="row">
        <div class="col-sm-3">
          <span class="receipt-title">Departure Date:</span> {{$schedule->departure_date}}
        </div>
        <div class="col-sm-3">
          <span class="receipt-title">Departure Time:</span> {{$schedule->departure_time}}
        </div>
      </div>
      
    </div>
    
  </div>

@endsection
