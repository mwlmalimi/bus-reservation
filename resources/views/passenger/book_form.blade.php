@extends('passenger.layouts.passenger_layout')

@section('more-headers')

@endsection

@section('content')

<h3 class="text-primary">
  {{$company->name . " " . $bus->plate_number . ", Departure: " . $schedule->departure_date . " " . $schedule->departure_time . ", Price: " . $schedule->fare . "/="}}
</h3>
<br>



<form action="{{url('/book_bus/' . $schedule->id)}}" method="post">
  
  @csrf
    
  <div class="row">
    
    <div class="col-md-6">
      
      <div class="card">
        
        <h4 class="card-header">Select a seat</h4>
        
        <div class="card-body">
          @php $seat_no = 1; @endphp
          
          @for ($i = 0; $i < 5; $i++)
            
            @for ($j = 0; $j < 8; $j++)
              <div class="form-check-inline">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input bus-seat" 
                    name="seats_taken" 
                    value="{{$seat_no < 10 ? '0'.$seat_no : $seat_no }}">
                    {{$seat_no < 10 ? '0'.$seat_no : $seat_no }}
                </label>
              </div>
              
              @php $seat_no++; @endphp

            @endfor
            <br><br>
          @endfor
        </div>
        
      </div>
      
    </div>
    
    <div class="col-md-6" style="border-left: 1px solid #ccc;">
      
      <div class="card">
        
        <h4 class="card-header">Personal Details</h4>
        
        <div class="card-body">
          
          <div class="row">
            <div class="form-group col-md-6">
              <label for="">First Name<span class="text-danger">*</span>:</label>
              <input type="text" name="first_name" value="" class="form-control"
                required>
            </div>
            <div class="form-group col-md-6">
              <label for="">Last Name<span class="text-danger">*</span>:</label>
              <input type="text" name="last_name" value="" class="form-control"
                required>
            </div>
          </div>
          
          <div class="row">
            <div class="form-group col-md-6">
              <label for="">Phone Number<span class="text-danger">*</span>:</label>
              <input type="text" name="phone_number" value="" class="form-control"
                required>
            </div>
            <div class="form-group col-md-6">
              <label for="">Email Address:</label>
              <input type="text" name="email" value="" class="form-control">
            </div>
          </div>
          
        </div>
        
      </div>
      
      <div class="row" style="margin-top: 1rem;">
        <div class="col-12">
          <button class="float-right btn btn-primary" type="submit">Submit</button>
        </div>
      </div>
      
    </div>
    
  </div>
  
  
  <script type="text/javascript">
  $(document).ready(function(){
    $('.bus-seat').on('change', function() {
     $('.bus-seat').not(this).prop('checked', false)
    })
  })
  </script>

</form>

@endsection
