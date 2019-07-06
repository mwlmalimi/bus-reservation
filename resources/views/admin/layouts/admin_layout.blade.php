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
  </head>
  <body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <a class="navbar-brand" href="{{url('/')}}">Bus Reservation</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
              @auth
              <ul class="navbar-nav mr-auto">

                @can('view')
                <li class="nav-item {{ areActiveRoutes(['companies.*', 'company_routes.*', 'company_buses.*']) }}">
                  <a class="nav-link" href="{{url('/')}}">Companies</a>
                </li>
                @endcan

                @can('create', 'App\Bus')

                    <li class="nav-item {{ areActiveRoutes(['buses.*', 'company_buses.*']) }}">
                      <a
                        class="nav-link"
                        href="{{route('company_buses.index', ['company' => $company->id])}}">Buses</a>
                    </li>
                @endcan

                @can('create', 'App\Schedule')
                <li class="nav-item {{ areActiveRoutes(['company_schedules.*']) }}">
                  <a class="nav-link"
                    href="{{route('company_schedules.index', ['company' => $company->id])}}">
                    Schedules
                  </a>
                </li>
                @endcan

                {{--@can('create', 'App\Passenger')
                <li class="nav-item {{ isActiveURL('/passengers') }}">
                  <a class="nav-link" href="{{url('/passengers')}}">Passengers</a>
                </li>
                @endcan--}}

              </ul>
              @endauth
              <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @auth

                <li class="nav-item dropdown">

                    <a id="navbarDropdown" class="nav-link dropdown-toggle"  role="button" data-toggle="dropdown"
                    aria-haspopup="true"  style="color:#fff;" aria-expanded="false" v-pre>
                      <h6 style="color:#fff;">Signed in, {{ Auth::user()->name }} </h6>  <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" class="form-control" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endauth

                @guest

                @if(!isActiveRoute('register'))
                  <li class="active nav-item bg-dark" style="color:#000;">
                    <a href="{{ route('register') }}">Register Company</a>
                  </li>
                @endif

                @endguest

              </ul>
          </div>
    </nav>

    <div class="container content">

      @yield('content')

    </div>

  </body>
</html>
