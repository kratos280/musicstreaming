@extends('layouts.application')

@section('styles')
@stop

@section('scripts')
@stop

@section('content')

<div class="col-md-8 col-md-offset-2">
    <h3>{{{ $playlist->name }}}</h3>
    <div class="list-group" style="margin-top: 30px">
        <a href="javascript:void(0)" class="list-group-item active">
            曲一覧
        </a>
        @foreach($playlist_audios as $playlist_audio)
        <a href="/audios/{{$playlist_audio->audio->audio_id}}/{{ $playlist->playlist_id }}" class="list-group-item">{{{ $playlist_audio->audio->title }}}</a></li>
        @endforeach
    </div>
</div>

@stop


