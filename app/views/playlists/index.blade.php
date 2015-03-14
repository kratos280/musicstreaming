@extends('layouts.application')

@section('styles')
@stop

@section('scripts')
@stop

@section('content')
<h2>On Playlist {{{ $playlist->name }}}</h2>
@foreach( $playlist_audios as $playlist_audio )
<div class="col-md-4">
    <div class="list-group">
        <a href="/audios/" class="list-group-item">
            {{{ $playlist_audio->audio->title }}}
        </a>
    </div>
</div>
@endforeach
@stop


