@extends('layouts.application')

@section('styles')
@stop

@section('scripts')
@stop
<?php
$play_video = array_shift($items);
$video_id = $play_video->getId();
if (is_object($video_id)) {
    $video_id = $video_id->videoId;
}
$title = $play_video->getSnippet()->title;?>
@section('content')
    <div class="col-md-8">
        <div id="player" data-vid="{{$video_id}}" data-nvid = "{{Session::get('next_song')}}"></div>
        <div class="offset2 span8">
            <h3>{{$title}}</h3>
            <img src="" width="60px" id="bookmark-btn">
        </div>

        <div
                class="fb-like col-lg-12 text-center"
                data-share="true"
                data-width="450"
                data-show-faces="true">
        </div>

        <!-- i-mobile for PC client script -->
        <script type="text/javascript">
            imobile_pid = "39969";
            imobile_asid = "516057";
            imobile_width = 728;
            imobile_height = 90;
        </script>
        <script type="text/javascript" src="http://spdeliver.i-mobile.co.jp/script/ads.js?20101001"></script>

        <div class="fb-comments col-lg-12 text-center" data-href="{{Request::url()}}" data-numposts="5" data-colorscheme="light"></div>
    </div>

    <div class="col-md-4" style="">
        <div class="list-group media-list">
            @foreach($items as $item)
            <a href="/play?params={{base64_encode(json_encode(array('title' => $item->getSnippet()->title, 'videoId' => $item->getId()->videoId)))}}" class="list-group-item">
                <div class="media-left">
                    <img class="media-object"
                         style="width: 128px; height: 78px;"
                         src="{{$item->getSnippet()->thumbnails->getDefault()->url}}"
                         data-holder-rendered="true">
                </div>
                <div class="media-body">
                    <?php $title = $item->getSnippet()->title;
                    if (strlen($title) > 50) {
                        $title = substr($title, 0, 50) . '...';
                    }
                    ?>
                    <h4 class="media-heading" style="text-align: left!important;">{{$title}}
                    </h4>
                    <p></p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
@stop

@section('scriptsFooter')
    <script src="http://www.youtube.com/player_api"></script>
    {{ HTML::script('js/Music/play.js') }}
@stop

