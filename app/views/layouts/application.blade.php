<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>@yield('title', 'Music Streaming')</title>
      <link rel="stylesheet" href="#">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
@yield('styles')
@yield('scripts')
  </head>
  <body>
  <div class="wrapper clearfix">
  @include('layouts.header')
  @include('layouts.navigation')
  @include('layouts.alert')
  @yield('content')
  @include('layouts.footer')
  </div>
  <!-- /wrapper -->
</body>
</html>
