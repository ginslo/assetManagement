<title>Westlinks Online | @yield('title')</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="{{ URL::to('css/styles.css') }}" media="all" />
  <link rel="stylesheet" type="text/css" href="{{ URL::to('slick/slick.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ URL::to('slick/slick-theme.css') }}"/>
  <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>
  @yield('stylesheets')
