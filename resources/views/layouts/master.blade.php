<html lang="en">
  <head>
    @include('partials._head')
  </head>
  <body>
	  @include('partials._nav')
    	<div class="container">
        @yield('sidebar')
        @yield('content')
      </div>
      <br />
    @include('partials._footer')
    @include('partials._javascript')
    @yield('scripts')
  </body>
</html>
