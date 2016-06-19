<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Asset Management Project</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ URL::to('images/westlinks_logo.png') }}" height="30" /></a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->


                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                  <ul class="nav navbar-nav">
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-list" aria-hidden="true"></i>
                          Select <span class="caret"></span>
                      </a>
                      <ul class="dropdown-menu" role="menu">
                          <li><a href="{{ url('/accounts') }}"><i class="fa fa-university" aria-hidden="true"></i> xxxAccounts</a></li>
                          <li><a href="{{ url('/applications') }}"><i class="fa fa-desktop" aria-hidden="true"></i> Applications</a></li>
                          <li><a href="{{ url('/data_centers') }}"><i class="fa fa-building-o" aria-hidden="true"></i> Data Centers</a></li>
                          <li><a href="{{ url('/domain_names') }}"><i class="fa fa-list" aria-hidden="true"></i> Domain Names</a></li>
                          <li><a href="{{ url('/oss') }}"><i class="fa fa-building-o" aria-hidden="true"></i> Operating Systems</a></li>
                          <li><a href="{{ url('/os_versions') }}"><i class="fa fa-building-o" aria-hidden="true"></i> OS Versions</a></li>
                          <li><a href="{{ url('/providers') }}"><i class="fa fa-building-o" aria-hidden="true"></i> Providers</a></li>
                          <li><a href="{{ url('/purposes') }}"><i class="fa fa-desktop" aria-hidden="true"></i> Purposes</a></li>
                          <li><a href="{{ url('/registrars') }}"><i class="fa fa-building-o" aria-hidden="true"></i> Registrars</a></li>
                          <li><a href="{{ url('/servers') }}"><i class="fa fa-server" aria-hidden="true"></i> Servers</a></li>
                          <li><a href="{{ url('/users') }}"><i class="fa fa-users" aria-hidden="true"></i> Users</a></li>
                          <li><a href="{{ url('/websites') }}"><i class="fa fa-file-o" aria-hidden="true"></i> Websites</a></li>
                      </ul>
                    </li>
                      <!-- <li><a href="{{ url('/home') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li> -->
                      <!-- <li><a href="{{ url('/servers') }}"><i class="fa fa-server" aria-hidden="true"></i> Servers</a></li> -->
                      <!-- <li><a href="{{ url('/domain_names') }}"><i class="fa fa-list" aria-hidden="true"></i></i> Domains</a></li>
                      <li><a href="{{ url('/websites') }}"><i class="fa fa-file-o" aria-hidden="true"></i> Websites</a></li> -->
                  </ul>
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <!-- <li><a href="{{-- url('/register') --}}">Register</a></li> -->
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i>
                                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
