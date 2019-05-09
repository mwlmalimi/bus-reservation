@extends('admin.layouts.admin_layout')

@section('more-headers')

<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript"
      src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
@include('admin.includes.datatable_buttons')

@endsection

@section('content')

<div class="table-responsive-md">

  <h3 class="text-primary">Buses</h3><br>

  <table id="busesTable"
        class="table table-striped table-hover table-bordered"
        cellspacing="0" width="100%">

    <thead>
      <tr>
        <th class="th-sm">Company ID</th>
        <th class="th-sm">Plate Number</th>
        <th class="th-sm">Number of Seats</th>
        <th class="th-sm">Actions</th>
      </tr>
    </thead>

    <tbody>
      @foreach($buses as $bus)
      <tr>
        <td>{{ $bus->company_id }}</td>
        <td>{{ $bus->plate_number }}</td>
        <td>{{ $bus->seats_count }}</td>
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
    $("#busesTable").DataTable({
      dom: 'Bfrtip',
      buttons: [
         {
           extend: 'print',
           exportOptions: {
             columns: ":not(:last-child)"
           },
           title: "Buses",
           messageTop: "The List Of Buses As Of {{date('d-m-Y')}}"
         },
          {
            extend: 'excel',
            exportOptions: {
              columns: ":not(:last-child)"
            },
            title: "Buses",
            messageTop: "The List Of Buses As Of {{date('d-m-Y')}}"
         },
          {
            extend: 'pdf',
            exportOptions: {
              columns: ":not(:last-child)"
            },
            title: "Buses",
            messageTop: "The List Of Buses As Of {{date('d-m-Y')}}"
         }
       ],
      iDisplayLength: 3,
      bLengthChange: false
    })
  })
</script>

@endsection
