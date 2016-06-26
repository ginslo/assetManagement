<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    @if (Auth::guest())
      <a class="navbar-brand" href="/"><img src="{{ URL::to('images/westlinks_logo.png') }}" height="30" /></a>
    @else
      <a class="navbar-brand" href="/home"><img src="{{ URL::to('images/westlinks_logo.png') }}" height="30" /></a>
    @endif

    @unless (Auth::guest())
      @if(Auth::user()->is_admin == 1)
        {!! Form::open(['method'=>'GET','url'=>'search','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
        <div class="input-group custom-search-form">
            {!! Form::text('search',null,array('autofocus','class'=>'form-control','placeholder'=>'Search...')) !!}
            <span class="input-group-btn">
              <button type="submit" class="btn btn-default-sm">
                <i class="fa fa-search"> </i>
              </button>
            </span>
        </div>
        {!! Form::close() !!}
      @endif
    @endunless

    </div>
      <ul class="nav navbar-nav navbar-right">
        @unless (Auth::guest())
          @if(Auth::user()->is_admin == 1)
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-list" aria-hidden="true"></i> Select<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ url('/accounts') }}"><i class="fa fa-university" aria-hidden="true"></i> Accounts</a></li>
                <li><a href="{{ url('/applications') }}"><i class="fa fa-desktop" aria-hidden="true"></i> Applications</a></li>
                <li><a href="{{ url('/data_centers') }}"><i class="fa fa-building-o" aria-hidden="true"></i> Data Centers</a></li>
                <li><a href="{{ url('/domain_names') }}"><i class="fa fa-list" aria-hidden="true"></i> Domain Names</a></li>
                <li><a href="{{ url('/distributions') }}"><i class="fa fa-building-o" aria-hidden="true"></i> Distributions</a></li>
                <li><a href="{{ url('/distribution_versions') }}"><i class="fa fa-building-o" aria-hidden="true"></i> Distro Versions</a></li>
                <li><a href="{{ url('/providers') }}"><i class="fa fa-building-o" aria-hidden="true"></i> Providers</a></li>
                <li><a href="{{ url('/purposes') }}"><i class="fa fa-desktop" aria-hidden="true"></i> Purposes</a></li>
                <li><a href="{{ url('/registrars') }}"><i class="fa fa-building-o" aria-hidden="true"></i> Registrars</a></li>
                <li><a href="{{ url('/servers') }}"><i class="fa fa-server" aria-hidden="true"></i> Servers</a></li>
                <li><a href="{{ url('/users') }}"><i class="fa fa-users" aria-hidden="true"></i> Users</a></li>
                <li><a href="{{ url('/websites') }}"><i class="fa fa-file-o" aria-hidden="true"></i> Websites</a></li>
              </ul>
            </li>
          @endif
        @endunless
        <li class="dropdown">
          @if (Auth::guest())
              <li><a href="{{ url('/login') }}">Login</a></li>
              <li><a href="{{ url('/register') }}">Register</a></li>
          @else
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
                                <img src="/images/uploads/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%">
                                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} <span class="caret"></span>
                            </a>

                  <ul class="dropdown-menu" role="menu">
                      <li><a href="{{ url('/home') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                      <li><a href="{{ url('/profile') }}"><i class="fa fa-btn fa-user"></i>Profile</a></li>
                      <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                  </ul>
              </li>
          @endif
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
