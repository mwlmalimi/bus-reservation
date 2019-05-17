@extends('admin.layouts.admin_layout')

@section('more-header')

@endsection

@section('content')

<form action="{{ url('/routes/') }}" method="post">

  <div class="row">
    <div class="col-12">
      <h3>Add Routes</h3>
      <hr>
    </div>
  </div>

  @isset($successMessage)
  <div class="row">
    <div class="col-12">
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> {{$successMessage}}.
      </div>
    </div>
  </div>
  @endisset

  <div class="row">

    <div class="col-12 col-md-4">

      @csrf

      <div class="form-group">
        <label for="busSelector">Routes:</label>
        <div class="form-group">
          <label for="">Name:</label>
          <input type="text" class="form-control" name="name" required>
        </div>

      </div>

      <div class="form-group">
        <label for="">Description:</label>
        <input type="text" class="form-control" name="description" required>
      </div>

      <div class="form-group">
        <button class="btn btn-primary float-right" type="submit">Add+</button>
      </div>

    </div>

  </div>


</form>

@endsection
