@extends('layouts.application')

@section('styles')
@stop

@section('scripts')
@stop

@section('content')
<div class="col-md-8 col-md-offset-2">
    <a class="btn btn-info" href="/playlists/create">Create New Playlist</a>
    <div class="list-group" style="margin-top: 30px">
        <a href="javascript:void(0)" class="list-group-item active">
            プレイリスト一覧
        </a>
        @foreach($playlists as $playlist)
        <a href="/playlists/{{ $playlist->playlist_id }}" class="list-group-item">{{{ $playlist->name }}}</a></li>
        @endforeach
    </div>
</div>

@stop


