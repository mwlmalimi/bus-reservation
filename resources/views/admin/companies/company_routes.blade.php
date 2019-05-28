@extends('admin.layouts.admin_layout')

@section('more-headers')

<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript"
      src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
@include('admin.includes.datatable_buttons')

@endsection
@section('content')

<div class="table-responsive-md">

  <div class="page-header">
    <h3 class="text-primary">{{$company->name}} Routes</h3>
    <a class="btn btn-primary" href="{{ url('/company_routes/create/' . $company->id) }}"
      title="Assign Routes">Assign</a>
  </div>

  <table id="myTable"
        class="table table-striped table-hover table-bordered"
        cellspacing="0" width="100%">

    <thead>
      <tr>
        <th class="th-sm">Name</th>
        <th class="th-sm">Actions</th>
      </tr>
    </thead>

    <tbody>
      @foreach($routes as $route)
      <tr>
        <td>{{ $route->name }}</td>
        <td>
          <button class="btn btn-sm btn-danger" title="delete"
            type="button"
            onclick="openConfirmModal({{$company}},{{$route}})">Delete</button>
        </td>
      </tr>
      @endforeach
    </tbody>
  @include('admin.modals.confirmation_modal')
  </table>

</div>

<script>
  $(document).ready(function () {
    $("#myTable").DataTable({
      bLengthChange: false
    })
  })

  function openConfirmModal(company, route) {
    let url = '/company_routes/'+company.id + '/' + route.id
     $("#confirmation_modal_form").attr('action', url)
     $("#myModal").modal()
  }
</script>

@endsection
