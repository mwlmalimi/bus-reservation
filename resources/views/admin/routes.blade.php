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

    <div class="page-header">
      <h3 class="text-primary">Routes</h3>
      <a class="btn btn-primary" href="{{url('/routes/create')}}" title="Add Routes">Add Routes</a>
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
    <div class="table-responsive-md">

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
              <button class="btn btn-sm btn-danger" title="delete"
                type="button"
                onclick="openConfirmModal({{$route}})">Delete</button>
           </td>
          </tr>
          @endforeach
        </tbody>
      @include('admin.modals.confirmation_modal')
      </table>

    </div>

  </div>

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


  function openConfirmModal(route) {
    let url = '/routes/' + route.id
     $("#confirmation_modal_form").attr('action', url)
     $("#myModal").modal()
  }

</script>

@endsection
