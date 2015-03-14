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
<div class="col-sm-4 social-buttons">
    <a class="btn btn-block btn-social btn-facebook" href="{{url('/auth/connect')}}">
        <i class="fa fa-facebook"></i> Sign in with Facebook
    </a>
</div>

@stop
