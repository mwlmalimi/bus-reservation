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
    <h3 class="text-primary"> {{ $company->name }}  Buses</h3>
    @if(request()->user()->company_id !== null)
    <a class="btn btn-primary" href="{{ url('/company_buses/create/' . $company->id) }}"
      title="Add Buses">Assign</a>
    @endif
  </div>

  <table id="myTable"
        class="table table-striped table-hover table-bordered"
        cellspacing="0" width="100%">

    <thead>
      <tr>
        <th class="th-sm">Plate number</th>
          <th class="th-sm">Number of seats</th>
          @if(request()->user()->company_id !== null)
          <th class="th-sm">Actions</th>
          @endif
      </tr>
    </thead>

    <tbody>
      @foreach($buses as $bus)
      <tr>
        <td>{{ $bus->plate_number }}</td>
          <td>{{ $bus->seats_count }}</td>
          @if(request()->user()->company_id !== null)
          <td>
            <button class="btn btn-sm btn-danger" title="delete"
              type="button"
              onclick="openConfirmModal({{$bus}})">Delete</button>
          </td>
          @endif
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

  function openConfirmModal(bus) {
    let url = '/company_buses/' + bus.id
     $("#confirmation_modal_form").attr('action', url)
     $("#myModal").modal()
  }

</script>

@endsection
