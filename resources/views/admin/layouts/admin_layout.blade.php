<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
    @yield('more-headers')
    <title>Bus Reservation</title>
    <style media="screen">
      body {
        background-color: #fff;
        font-weight: 200;
        height: 100vh;
        margin: 0;
      }
      .content {
        padding-top: 50px;
      }
    </style>
  </head>
  <body>

    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
      <ul class="navbar-nav">
        <li class="nav-item {{ isActiveURL('/') }}">
          <a class="nav-link" href="{{url('/')}}">Companies</a>
        </li>
        <li class="nav-item {{ isActiveURL('/buses') }}">
          <a class="nav-link" href="{{url('/buses')}}">Buses</a>
        </li>
        <li class="nav-item {{ isActiveURL('/schedules') }}">
          <a class="nav-link" href="{{url('/schedules')}}">Schedules</a>
        </li>
        <li class="nav-item {{ isActiveURL('/passengers') }}">
          <a class="nav-link" href="{{url('/passengers')}}">Passengers</a>
        </li>
      </ul>
    </nav>

    <div class="container content">

      @yield('content')

    </div>

  </body>
</html>
