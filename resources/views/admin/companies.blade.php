@extends('admin.layouts.admin_layout')

@section('more-headers')

<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript"
      href="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $("#companiesTable").DataTable()
  })
</script>

@endsection

@section('content')

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
          <button class="btn btn-danger" type="button">Delete</button>
        </td>
      </tr>
      @endforeach
    </tbody>

  </table>

</div>

@endsection
