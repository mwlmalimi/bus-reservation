@extends('admin.layouts.admin_layout')

@section('more-headers')

<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript"
      src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
@include('admin.includes.datatable_buttons')

@endsection

@section('content')

<div class="table-responsive-md">

  <h3 class="text-primary">Routes</h3><br>

  <table id="routesTable"
        class="table table-striped table-hover table-bordered"
        cellspacing="0" width="100%">

    <thead>
      <tr>
        <th class="th-sm">Name</th>
        <th class="th-sm">Description</th>
        <th class="th-sm">Actions</th>
      </tr>
    </thead>

    <tbody>
      @foreach($routes as $route)
      <tr>
        <td>{{ $route->name }}</td>
        <td>{{ $route->description }}</td>
        <td>
          <button class="btn btn-danger" type="button">Delete</button>
        </td>
      </tr>
      @endforeach
    </tbody>

  </table>

</div>

<script>
  $(document).ready(function () {
    $("#routesTable").DataTable({
      dom: 'Bfrtip',
      buttons: [
         {
           extend: 'print',
           exportOptions: {
             columns: ":not(:last-child)"
           },
           title: "Routes",
           messageTop: "The List Of Routes As Of {{date('d-m-Y')}}"
         },
          {
            extend: 'excel',
            exportOptions: {
              columns: ":not(:last-child)"
            },
            title: "Routes",
            messageTop: "The List Of Routes As Of {{date('d-m-Y')}}"
         },
          {
            extend: 'pdf',
            exportOptions: {
              columns: ":not(:last-child)"
            },
            title: "Routes",
            messageTop: "The List Of Routes As Of {{date('d-m-Y')}}"
         }
       ],
      iDisplayLength: 5,
      bLengthChange: false
    })
  })
</script>

@endsection
