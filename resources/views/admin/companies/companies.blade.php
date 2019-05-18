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
      <h3 class="text-primary">Companies</h3>
      <a class="btn btn-primary" href="{{url('/companies/create')}}" title="Add Companies">Add Companies</a>
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
              <div class="btn-group">
                <a class="btn btn-sm btn-warning" title="view routes"
                  href="{{ url('/company_routes/' . $company->id) }}">Routes</a>
                <a class="btn btn-sm btn-dark" title="view buses"
                 href="{{ url('/company_buses/' . $company->id) }}">Buses</a>
                 <button class="btn btn-sm btn-danger" title="delete"
                   type="button"
                   onclick="openConfirmModal({{$company}})">Delete</button>
              </div>
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

  function openConfirmModal(company) {
    let url = '/companies/' + company.id
     $("#confirmation_modal_form").attr('action', url)
     $("#myModal").modal()
  }
</script>

@endsection
