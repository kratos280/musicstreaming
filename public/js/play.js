$(document).ready(function(){
    var widgetIframe = document.getElementById('sc-widget'),
        widget       = SC.Widget(widgetIframe);

    widget.bind(SC.Widget.Events.READY, function() {

        // load new widget
        widget.bind(SC.Widget.Events.FINISH, function() {

            widget.load(global_class.getStreamUrl(), {
                show_artwork: true,
                auto_play: true
            });

            $('.playing').removeClass('playing');
            $('#'+playlistIds[global_class.playingIndex]).addClass('playing');

            if ($('input[name="audio_id"]')[0]) {
                $('input[name="audio_id"]').val(playlistIds[global_class.playingIndex]);
            }

            global_class.increaseIndex();
        });
    });

}());