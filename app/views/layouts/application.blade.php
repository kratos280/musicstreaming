<!DOCTYPE html>
<html lang="jp">
  <head>
    <meta charset="utf-8">
    <title>@yield('title', 'Music Streaming')</title>
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
    {{ HTML::style('css/bootstrap.min.css') }}
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

  @yield('scriptsFooter')
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-63796879-2', 'auto');
    ga('send', 'pageview');

  </script>
</body>
</html>
