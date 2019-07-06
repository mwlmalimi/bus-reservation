@extends('passenger.layouts.passenger_layout')

@section('content')

<form class="" onsubmit="event.preventDefault(); searchCompanies();">

  @csrf

  <div class="row form-group">

    <div class="col-md-3">
      <label for="">From:</label>
      <input type="text" name="origin" value=""
        class="form-control" id="origin" required>
    </div>

    <div class="col-md-3">
      <label for="">To:</label>
      <input type="text" name="destination" value=""
        class="form-control" id="destination" required>
    </div>

    <div class="col-md-3">
      <button type="submit" name="button"
        class="btn btn-secondary">search</button>
    </div>

  </div>

  <div class="row">
    <div class="form-group col-md-9" id="companies">
      <label for="">Company:</label>
      <select class="form-control" name="company_id" id="companySelect"
        onchange="searchSchedules()">
        <option value="" selected disabled>select company</option>
      </select>
    </div>
  </div>

  <div id="schedules" class="table-responsive-md">
    <table class="table table-striped table-hover table-bordered">
      <thead>
        <th>Plate Number</th>
        <th>Departure Date</th>
        <th>Departure Time</th>
        <th>Action</th>
      </thead>
      <tbody id="schedulesBody">
      </tbody>
    </table>
  </div>

  <script type="text/javascript">

    document.getElementById("companies").style.display = "none"
    document.getElementById("schedules").style.display = "none"

    function searchCompanies () {

      $("#companySelect").val("")

      document.getElementById("companies").style.display = "none"
      document.getElementById("schedules").style.display = "none"

      let origin = $("#origin").val();
      let destination = $("#destination").val();
      $.getJSON('/searchCompanies?origin=' + origin + '&destination=' + destination)
        .done(function (companies) {
          //Remove all previous options except the first
          $("#companySelect").find('option').not(':first').remove()

          let mySelect = document.getElementById("companySelect")

          for (let i = 0; i < companies.length; i++) {
            let opt = document.createElement("option")
            opt.value = companies[i].id
            opt.innerHTML = companies[i].name
            mySelect.appendChild(opt)
          }

          document.getElementById("companies").style.display = "block"

        })
        .fail(function (error) {
          console.log(error);
        })
    }

    function searchSchedules() {
      let company_id = $("#companySelect").val()
      let origin = $("#origin").val()
      let destination = $("#destination").val()
      $.getJSON('/searchSchedules/' + company_id +  '?origin=' + origin + '&destination=' + destination)
        .done(function (schedules) {
          //Remove all previous schedules
          $("#schedules").find('tbody tr').remove()

          let schedulesBody = document.getElementById("schedulesBody")

          for (let i = 0; i < schedules.length; i++) {
            let row = document.createElement("tr")
            row.innerHTML = "<td>" + schedules[i].bus.plate_number + "</td>" +
                            "<td>" + schedules[i].departure_date + "</td>" +
                            "<td>" + schedules[i].departure_time + "</td>" +
                            "<td><button type='button' class='btn btn-primary'>Book</button></td>"
            schedulesBody.appendChild(row)
          }

          document.getElementById("schedules").style.display = "block"

        })
        .fail(function (error) {
          console.log(error);
        })
    }

  </script>

</form>

@endsection
