@extends('layouts.application')

@section('styles')
@stop

@section('scripts')
@stop

@section('content')
<h2>On Playlist {{{ $playlist->name }}}</h2>
@foreach($playlist_audios as $playlist_audio)
    <a href="">{{{ $playlist_audio->audio->title }}}</a><br>
    <span>{{{ $playlist_audio->audio->description }}}</span><br><br>
@endforeach
@stop


