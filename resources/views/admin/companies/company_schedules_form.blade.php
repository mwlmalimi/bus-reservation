@extends('admin.layouts.admin_layout')

@section('more-header')

@endsection

@section('content')

<form action="{{ url('/company_schedules/' . $company->id) }}" method="post">

  <div class="row">
    <div class="col-12">
      <h3>Create {{ $company->name }} Schedules</h3>
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
        <label for="">From:</label>
        <input type="text" class="form-control" name="origin" value="">
      </div>

      <div class="form-group">
        <label for="">To:</label>
        <input type="text" class="form-control" name="destination" value="">
      </div>

      <div class="form-group">
        <label for="">Buses</label>
        <select class="form-control" name="bus_id">
          <option value="" selected disabled>select</option>
          @foreach ($buses as $bus)
          <option value="{{$bus->id}}">{{$bus->name}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="">Departure Date:</label>
        <input type="date" class="form-control" name="departure_date" required>
      </div>

      <div class="form-group">
        <label for="">Departure Time:</label>
        <input type="datetime" class="form-control" name="departure_time" required>
      </div>
      
      <div class="form-group">
        <label for="">Price:</label>
        <input type="text" class="form-control" name="fare" required>
      </div>

      <div class="form-group">
        <button class="btn btn-primary float-right" type="submit">Create+</button>
      </div>

    </div>

  </div>


</form>

@endsection
