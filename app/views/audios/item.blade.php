@extends('layouts.application')

@section('styles')
@stop

@section('scripts')
<script src="https://w.soundcloud.com/player/api.js" type="text/javascript"></script>
@stop

@section('content')
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
@stop

