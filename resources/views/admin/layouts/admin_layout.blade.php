<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script type="text/javascript" href="{{ asset('js/app.js') }}"></script>
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
        padding-top: 70px;
      }
    </style>
  </head>
  <body>

    <nav class="navbar navbar-expand-sm bg-light navbar-primary">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Companies</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Buses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Schedules</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Passengers</a>
        </li>
      </ul>
    </nav>

    <div class="container content">

      @yield('content')

    </div>

  </body>
</html>
