@extends('passenger.layouts.passenger_layout')

@section('more-headers')
  <style>
    .bus-seat {
      width: 60px;
      height: auto;
    }
  </style>
@endsection

@section('content')

<div class="">

  <div class="form-check-inline">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input" value=""
        onchange="$(this).next().css('background-color', 'blue');">
      <div>
        <img src="{{asset('images/seat1.png')}}" alt=""
          class="bus-seat">
      </div>
    </label>
  </div>

</div>

@endsection
