<!DOCTYPE html>
<html lang="jp">
  <head>
    <meta charset="utf-8">
    <title>@yield('title', 'Music Streaming')</title>
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
      <!-- Optional theme -->
      <link rel="stylesheet" href="https://bootswatch.com/cosmo/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('css/site.css')  }}">
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <!-- Latest compiled and minified JavaScript -->
      <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    @yield('styles')
    @yield('scripts')
  </head>
  <body>
  <div class="wrapper clearfix">
  @include('layouts.header')
  @include('layouts.navigation')
  @include('layouts.alert')
    <div class="container">
      @yield('content')
    </div>
  @include('layouts.footer')
  </div>
  <!-- /wrapper -->
</body>
</html>
