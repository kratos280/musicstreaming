@extends('layouts.application')

@section('styles')
@stop

@section('scripts')
@stop

@section('content')
<h1>Your Playlist lists<h1>
@foreach($playlists as $playlist)
<a href="/playlists/{{ $playlist->playlist_id }}">$playlist->name</a>
<p>$playlist->description</p>
<br>
@endforeach
@stop


