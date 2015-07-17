@extends('layouts.Music.layout',['page_id'=>'page2'])

@section('og')
    <title>{{$video_info['video_title']}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="{{$video_info['video_title']}}" />
    <meta property="og:description" content="{{$video_info['video_title']}}" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="{{$video_info['video_img']}}" />
    <meta property="og:image:type" content="image/jpg" />
    <meta property="og:image:width" content="550" />
    <meta property="og:image:height" content="288" />
    <meta charset="utf-8" />
@stop

@section('content')
    <div class="col-md-8">
        <div id="player" data-vid="{{$video_info['video_id']}}" data-nvid = "{{Session::get('next_song')}}"></div>
        <div class="col-lg-12 text-center" style="font-size: 24px; margin-bottom: 20px">
            <h3>{{$video_info['video_title']}}</h3>
        </div>
        <div class="extend col-lg-12 text-center">
            <div id="fb-root"></div>
            <div
                    class="fb-like col-lg-12 text-center"
                    data-share="true"
                    data-width="450"
                    data-show-faces="true" style="margin-top: 20px">
            </div>

            <!-- i-mobile for PC client script -->
            <script type="text/javascript">
                imobile_pid = "39969";
                imobile_asid = "516056";
                imobile_width = 468;
                imobile_height = 60;
            </script>
            <script type="text/javascript" src="http://spdeliver.i-mobile.co.jp/script/ads.js?20101001"></script>

            <div class="fb-comments col-lg-12 text-center" data-href="{{Request::url()}}" data-numposts="5" data-colorscheme="light"></div>
        </div>
    </div>
    <div class="col-md-4">
        @if($playlist = Session::get('playlist'))
        <h2>{{trans('messages.Playlist')}}</h2>
        <div class="list-group media-list" style="height: 50%">
            @foreach($playlist as $index => $item)
                @if($item['video_id'])
                    <?php $href = "/play/".str_replace('/', '-----',base64_encode(json_encode(array('title' => $item['title'], 'videoId' => $item['video_id'])))) ?>
                @else
                    <?php $href = "/play/".str_replace('/', '-----',base64_encode(json_encode(array('name' => $item['name'], 'artist' => $item['artist'])))) ?>
                @endif
            <a href="{{$href}}" class="list-group-item">
                <div class="media-left" <?php if (Session::get('current_song_index') == $index) echo('rel="prettyPhoto"') ?>>
                    <img class="media-object"
                         style="width: 128px; height: 78px;"
                         src="{{$item['img']}}"
                         data-holder-rendered="true">
                </div>
                <div class="media-body">
                    <?php $title = $item['title'] ? $item['title'] : $item['name'].' ('.$item['artist'].')';
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
        @endif
        <h2>{{trans('messages.OtherVideos')}}</h2>
        <div class="list-group media-list" style="height: 50%">
            @foreach($items as $item)
                <a href="/play/{{str_replace('/', '-----',base64_encode(json_encode(array('title' => $item->getSnippet()->title, 'videoId' => $item->getId()->videoId))))}}" class="list-group-item">
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
    {{ HTML::script('js/Music/index.js') }}
@stop
