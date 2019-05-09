@extends('admin.layouts.admin_layout')

@section('more-headers')

<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript"
      src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
@include('admin.includes.datatable_buttons')

@endsection

@section('content')

<div class="row">

  <div class="col-12">

    <div class="table-responsive-md">

      <table id="companiesTable"
            class="table table-striped table-hover table-bordered"
            cellspacing="0" width="100%">

        <thead>
          <tr>
            <th class="th-sm">Name</th>
            <th class="th-sm">Actions</th>
          </tr>
        </thead>

        <tbody>
          @foreach($companies as $company)
          <tr>
            <td>{{ $company->name }}</td>
            <td>
              <a class="btn btn-sm btn-primary" title="view routes"
                href="{{ url('/routes/' . $company->id) }}">Routes</a>
              <button class="btn btn-sm btn-dark" type="button"
                title="view buses">Buses</button>
              <button class="btn btn-sm btn-danger" type="button"
                title="delete company">Delete</button>
            </td>
          </tr>
          @endforeach
        </tbody>

      </table>

    </div>

  </div>

</div>
<script>
  $(document).ready(function () {
    $("#companiesTable").DataTable({
      dom: 'Bfrtip',
      buttons: [
         {
           extend: 'print',
           exportOptions: {
             columns: ":not(:last-child)"
           },
           title: "Companies",
           messageTop: "The List Of Companies As Of {{date('d-m-Y')}}"
         },
          {
            extend: 'excel',
            exportOptions: {
              columns: ":not(:last-child)"
            },
            title: "Companies",
            messageTop: "The List Of Companies As Of {{date('d-m-Y')}}"
         },
          {
            extend: 'pdf',
            exportOptions: {
              columns: ":not(:last-child)"
            },
            title: "Companies",
            messageTop: "The List Of Companies As Of {{date('d-m-Y')}}"
         }
       ],
      iDisplayLength: 5,
      bLengthChange: false
    })
  })
</script>

@endsection
