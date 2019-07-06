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
    <h3 class="text-primary">{{$company->name}} Schedules</h3>
    @if(request()->user()->company_id !== null)
    <a class="btn btn-primary" href="{{ url('/company_schedules/create/' . $company->id) }}"
      title="Assign schedules">Create</a>
    @endif
  </div>

  <table id="myTable"
        class="table table-striped table-hover table-bordered"
        cellspacing="0" width="100%">

    <thead>
      <tr>
        <th class="th-sm">From</th>
        <th class="th-sm">To</th>
        <th class="th-sm">Bus</th>
        <th class="th-sm">Departure Date</th>
        <th class="th-sm">Departure Time</th>
        <th class="th-sm">Actions</th>
      </tr>
    </thead>

    <tbody>
      @foreach($schedules as $schedule)
      <tr>
        <td>{{ $schedule->origin }}</td>
        <td>{{ $schedule->destination }}</td>
        <td>{{ $schedule->bus->name }}</td>
        <td>{{ $schedule->departure_date }}</td>
        <td>{{ $schedule->departure_time }}</td>
        <td>
          <button class="btn btn-sm btn-danger" title="delete"
            type="button"
            onclick="openConfirmModal({{$company}},{{$schedule}})">Delete</button>
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

  function openConfirmModal(company, schedule) {
    let url = '/company_schedules/'+company.id + '/' + schedule.id
     $("#confirmation_modal_form").attr('action', url)
     $("#myModal").modal()
  }
</script>

@endsection
