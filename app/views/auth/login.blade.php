@extends('layouts.application')

@section('styles')

@stop

@section('scripts')
<script></script>
<link href="http://lipis.github.io/bootstrap-social/bootstrap-social.css" rel="stylesheet">
<link href="http://lipis.github.io/bootstrap-social/assets/css/font-awesome.css" rel="stylesheet">
<link href="http://lipis.github.io/bootstrap-social/assets/css/docs.css" rel="stylesheet">
@stop

@section('content')
<div class="col-md-4 col-md-offset-4 social-buttons">
    <a class="btn btn-block btn-social btn-facebook" href="{{url('/auth/connect')}}">
        <i class="fa fa-facebook"></i> Sign in with Facebook
    </a>
    <br>
    <a class="btn btn-block btn-social btn-google-plus" onclick="_gaq.push(['_trackEvent', 'btn-social', 'click', 'btn-google-plus']);">
        <i class="fa fa-google-plus"></i> Sign in with Google
    </a>
    <br>
    <a class="btn btn-block btn-social btn-twitter" onclick="_gaq.push(['_trackEvent', 'btn-social', 'click', 'btn-twitter']);">
        <i class="fa fa-twitter"></i> Sign in with Twitter
    </a>
    <br>
    <a class="btn btn-block btn-social btn-yahoo" onclick="_gaq.push(['_trackEvent', 'btn-social', 'click', 'btn-yahoo']);">
        <i class="fa fa-yahoo"></i> Sign in with Yahoo!
    </a>
</div>

@stop
