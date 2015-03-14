@extends('layouts.application')

@section('styles')
@stop

@section('scripts')
@stop

@section('content')
<a class="btn btn-info" href="/playlists/create">Create New Playlist</a>
<h2>Your Playlists</h2>
@if( count($playlists) > 0 )
<ul>
@foreach($playlists as $playlist)
    <li><a href="/playlists/{{ $playlist->playlist_id }}">{{{ $playlist->name }}}</a></li>
    <span>{{{ $playlist->description }}}</span>
@endforeach
</ul>
@else
<p style="text-align: center; margin-top:100px">You dont have any playlist.</p>
@endif
@stop


