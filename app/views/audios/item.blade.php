@extends('layouts.application')

@section('styles')
@stop

@section('scripts')
<script src="https://w.soundcloud.com/player/api.js" type="text/javascript"></script>
<script>
    var playlistIds = [],
        global_class = (function(){
        return {
            playingIndex : 0,
            increaseIndex: function() {
                this.playingIndex++ ;
            },
            getStreamUrl: function() {
                return "http://api.soundcloud.com/tracks/"+playlistIds[this.playingIndex];
            }
        }
    })();
</script>
@stop

@section('content')
<div class="col-md-8">
<iframe id="sc-widget" width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F{{ $audio_id }}&show_artwork=true&auto_play=true"></iframe>
<script src="https://w.soundcloud.com/player/api.js" type="text/javascript"></script>
</div>

<div class="col-md-4" style="">
    <div class="list-group media-list">
        @if( count($relateItems) > 0 )
        @foreach( $relateItems as $item )
        <script>
            playlistIds.push({{{$item->id}}});
        </script>
        <a href="/audios/{{{ $item->id }}}" class="list-group-item">
            <div class="media-left">
                <img alt="64x64" data-src="holder.js/64x64" class="media-object"
                     style="width: 128px; height: 128px;"
                     src="{{{$item->artwork_url ? $item->artwork_url : url('/images/default.png')}}}"
                     data-holder-rendered="true">
            </div>
            <div class="media-body">
                <h4 class="media-heading" style="text-align: left!important;" id="{{{$item->id}}}">
                    {{{ $item->title }}}
                </h4>
                <p></p>
            </div>
        </a>
        @endforeach
        @endif
    </div>
</div>
{{ HTML::script('js/play.js') }}
@stop

