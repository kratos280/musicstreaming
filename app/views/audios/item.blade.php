@extends('layouts.application')

@section('styles')
@stop

@section('scripts')
<script src="https://w.soundcloud.com/player/api.js" type="text/javascript"></script>
@stop

@section('content')
<div class="col-md-8">
<iframe id="sc-widget" width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F{{ $audio_id }}&show_artwork=true"></iframe>
<script src="https://w.soundcloud.com/player/api.js" type="text/javascript"></script>
<script type="text/javascript">
    (function(){
        var widgetIframe = document.getElementById('sc-widget'),
            widget       = SC.Widget(widgetIframe),
            newSoundUrl = "http://api.soundcloud.com/tracks/{{ $audio_id }}";

        widget.bind(SC.Widget.Events.READY, function() {
            // load new widget
            widget.bind(SC.Widget.Events.FINISH, function() {
                widget.load(newSoundUrl, {
                    show_artwork: false
                });
            });
        });

    }());
</script>
<script>
    $(function() {
        $("#bookmark-btn").on("click", function () {
            var audio_id = $(this).data['audio-id'];
            var data = $.param({
                audio_id: audio_id
            });
            $("#select-box").show();
            $("#select-box").addClass("lightbox-layer");
            $(".lightbox-layer").height($("body").height());

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
        <a href="/audios/{{{ $item->id }}}" class="list-group-item">
            <div class="media-left">
                <img alt="64x64" data-src="holder.js/64x64" class="media-object"
                     style="width: 128px; height: 128px;"
                     src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PGRlZnMvPjxyZWN0IHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjEyLjQ1ODMzMzk2OTExNjIxMSIgeT0iMzIiIHN0eWxlPSJmaWxsOiNBQUFBQUE7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LWZhbWlseTpBcmlhbCwgSGVsdmV0aWNhLCBPcGVuIFNhbnMsIHNhbnMtc2VyaWYsIG1vbm9zcGFjZTtmb250LXNpemU6MTBwdDtkb21pbmFudC1iYXNlbGluZTpjZW50cmFsIj42NHg2NDwvdGV4dD48L2c+PC9zdmc+"
                     data-holder-rendered="true">
            </div>
            <div class="media-body">
                <h4 class="media-heading" style="text-align: left!important;">
                    {{{ $item->title }}}
                </h4>
                <p></p>
            </div>
        </a>
        @endforeach
        @endif
    </div>
</div>

<div id="select-box" style="display: none">
    <div class="lightbox-box__box">
        <p class="lightbox-box__button" id="lightbox-close"><img src="" height="27" width="60" alt=""></p>
        <div class="lightbox-box__inner">
            <div id="lightbox-area" class="creative-box no-pagenation">
                @if( count($playlists) > 0 )
                {{ Form::open(['url' => 'bookmark/create', 'method' => 'POST', 'id' => 'form-create']) }}
                {{ Form::hidden('audio_id', $item->id) }}
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
@stop

