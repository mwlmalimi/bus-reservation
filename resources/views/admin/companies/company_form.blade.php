@extends('admin.layouts.admin_layout')

@section('more-header')

@endsection

@section('content')

<form action="{{ url('/companies/')}}" method="post">

  <div class="row">
    <div class="col-12">
      <h3>Add company</h3>
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
        <label for="Company Name">Company Name:</label>
        <input type="text" class="form-control" name="name" required>
      </div>

      <div class="form-group">
        <button class="btn btn-primary float-right" type="submit">Add+</button>
      </div>

    </div>

  </div>


</form>

@endsection
