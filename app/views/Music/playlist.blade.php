@extends('layouts.Music.layout',['page_id'=>'page2'])

@section('og')
    <meta name="keywords" content="{{$title}}">
    <title>{{$title}}</title>
@stop

@section('content')
    <div class="col-1">
        <h2>{{trans('messages.Top100')}}</h2>
        <div class="p2">
            @foreach( $topSongs as $key => $topSong )
                <a href="/play/{{{str_replace('/', '-----', base64_encode(json_encode(array('name' => $topSong["im"]["name"], 'artist' => $topSong["im"]["artist"]))))}}}" rel="prettyPhoto">
                    <img class="p1" src="{{{$topSong["im"]["image"]}}}" alt="">
                </a>
                <div class="alc"><a href="/play/{{{str_replace('/', '-----',base64_encode(json_encode(array('name' => $topSong["im"]["name"], 'artist' => $topSong["im"]["artist"]))))}}}">{{{ $topSong["im"]["name"] . ' - ' . $topSong["im"]["artist"] }}}</a></div>
            @endforeach
        </div>
    </div>
    <h2>{{$title}}</h2>
    <div class="col-2 col-2-scroll">
        @if($items)
            <?php $playlist = array() ?>
            @foreach($items as $item)
                <?php $playlist[] = array('video_id' => $item->getSnippet()->getResourceId()->videoId, 'title' => $item->getSnippet()->title, 'img' => $item->getSnippet()->getThumbnails()->medium->url) ?>
                <div class="col-sm-6 col-md-4" style="width: 50%">
                    <div class="thumbnail" style="background-color: #1d1d1d">
                        <a href="/play/{{str_replace('/', '-----',base64_encode(json_encode(array('videoId' => $item->getSnippet()->getResourceId()->videoId, 'title' => $item->getSnippet()->title))))}}">
                            <img alt="100%x200" style="min-height: 155px; width: 100%; display: block;" src="{{$item->getSnippet()->getThumbnails()->medium->url}}">
                            <div class="caption">
                                <p style="font-size: medium">{{$item->getSnippet()->title}}</p>
                            </div>
                        </a>
                    </div>
                </div>

            @endforeach

                <?php Session::put('playlist', $playlist) ?>
        @endif
    </div>
    <div class="col-3">
        <!-- i-mobile for PC client script -->
        <script type="text/javascript">
            imobile_pid = "39969";
            imobile_asid = "518265";
            imobile_width = 160;
            imobile_height = 600;
        </script>
        <script type="text/javascript" src="http://spdeliver.i-mobile.co.jp/script/ads.js?20101001"></script>

    </div>
@stop

@section('scriptsFooter')
    <script>
        $(window).load(function() {
            $('a[rel=prettyPhoto]').each(function(){
                var th=$(this),pb
                th.append(pb=$('<span class="playbutt"></span>').css({opacity:.7}))
                pb.bind('mouseenter',function(){
                    $(this)
                            .stop()
                            .animate({opacity:.9})
                }).bind('mouseleave',function(){
                    $(this)
                            .stop()
                            .animate({opacity:.7})
                })
            })
        });
    </script>
@stop
