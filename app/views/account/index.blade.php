@extends('layouts.application')

@section('styles')
@stop

@section('scripts')
@stop

@section('content')
<a href="/playlists/create">Create New Playlist</a>
<h1>Your Playlist lists<h1>
@if( count($playlists) > 0 )
@foreach($playlists as $playlist)
<a href="/playlists/{{ $playlist->playlist_id }}">{{{ $playlist->name }}}</a>
<span style="font-size: 70%">{{{ $playlist->description }}}</span>
<br>
@endforeach
@else
        <p>You have no any playlist</p>
@endif
@stop


