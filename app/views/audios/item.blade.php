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
<script>
    $(function() {
        $("#bookmark-btn").on("click", function () {
            $("#select-box").show();
            $("#select-box").addClass("lightbox-layer");
            $(".lightbox-layer").height($("body").height());
        });

        $("#lightbox-close").on("click", function () {
            $("#select-box").removeClass("lightbox-layer");
            $("#select-box").hide();
        });

    });
</script>
<div class="offset2 span8">
    <img src="{{ url('images/bookmark-icon.jpg') }}" width="60px" id="bookmark-btn" data-audio-id="{{{ $item->id }}}">
</div>

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
<<<<<<< HEAD
{{ HTML::script('js/play.js') }}
=======

<div id="select-box" style="display: none">
    <div class="lightbox-box__box">
        <p class="lightbox-box__button" id="lightbox-close"><img src="{{ url('images/lightbox_close.png') }}" height="27" width="60" alt=""></p>
        <div class="lightbox-box__inner">
            <div id="lightbox-area" class="creative-box no-pagenation">
                @if( count($playlists) > 0 )
                {{ Form::open(['url' => 'bookmark/create', 'method' => 'POST', 'id' => 'form-create']) }}
                {{ Form::hidden('audio_id', $audio_id) }}
                @foreach( $playlists as $playlist )
                {{{ $playlist->name }}}
                {{ Form::checkbox('bookmarks[]', $playlist->playlist_id, in_array($playlist->playlist_id, $bookmarkedPlaylistIds), ['class' => 'form-control']) }}
                @endforeach
                <div class="text-center">
                    {{ Form::submit('Bookmark', ['class' => 'btn bg-olive btn-primary']) }}
                </div>
                {{ Form::close() }}
                @else
                <p>You dont have any Playlist!<br></p>
                <a class="btn btn-info" href="/playlists/create">Create Your Playlists</a>
                @endif
            </div>
        </div>
    </div>
</div>
>>>>>>> 726e20010fa15d2b92db44d0bece66ec9d464ec8
@stop

