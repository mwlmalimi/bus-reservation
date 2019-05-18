@extends('admin.layouts.admin_layout')

@section('more-header')

@endsection

@section('content')

<form action="{{ url('/company_buses/' . $company->id) }}" method="post">

  <div class="row">
    <div class="col-12">
      <h3>Add Buses To {{ $company->name }}</h3>
      <hr>
    </div>
  </div>

  @if(session('message'))
  <div class="row">
    <div class="col-12">
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> {{session('message')}}.
      </div>
    </div>
  </div>
  @endif

  <div class="row">

    <div class="col-12 col-md-4">

      @csrf

      <div class="form-group">
        <label for="busSelector">Buses:</label>
        <div class="form-group">
          <label for="">Plate Number:</label>
          <input type="text" class="form-control" name="plate_number" required>
        </div>

      </div>

      <div class="form-group">
        <label for="">Number of seats:</label>
        <input type="text" class="form-control" name="seats_count" required>
      </div>

      <div class="form-group">
        <button class="btn btn-primary float-right" type="submit">Add+</button>
      </div>

    </div>

  </div>


</form>

@endsection
