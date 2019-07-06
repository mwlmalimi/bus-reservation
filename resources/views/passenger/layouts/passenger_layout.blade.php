<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
    <title>Bus Reservation</title>
    <style>
      body {
        background-color:#fff;
        font-weight: 200;
        height: 100vh;
        margin: 0;
      }
      .content {
        padding-top: 40px;
      }
      .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 4px;
      }
      .navbar{
        color: #fff;
      }
      .navbar li a:hover{
        background-color:#000;
        color: #fff;
      }
      .active{
        background-color:blue;
        text-decoration: none;
      }
      .dropdown-menu{
        background-color:orange;
      }

    </style>

    @yield('more-headers')

  </head>

  <body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <a class="navbar-brand" href="#">Bus Reservation</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">

           <!-- Right Side Of Navbar -->
             <ul class="navbar-nav ml-auto">
                  @guest
                  <li class="active nav-item bg-dark" style="color:#000;">
                    <a href="{{ route('login') }}">Login</a>
                  </li>
                  <li class="active nav-item bg-dark ml-2" style="color:#000;">
                    <a href="{{ route('register') }}">Register Company</a>
                  </li>
                  @endguest

            </ul>

          </div>
    </nav>

    <div class="container content">

      @yield('content')

    </div>

  </body>
</html>
