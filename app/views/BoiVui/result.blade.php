@extends('BoiVui.boivui_template')

@section('header')
    <title>{{Games::$games[$type]['title']}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="{{Games::$games[$type]['title']}}" />
    <meta property="og:description" content="Click để xem kết quả của bạn" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="{{ URL::to('/gen_img/'.$type.'/'.$param) }}" />
    <meta property="og:image:type" content="image/jpg" />
    <meta property="og:image:width" content="550" />
    <meta property="og:image:height" content="288" />
    <meta charset="utf-8" />
@stop

@section('content')
    <div class="col-lg-12 text-center">
        <img src="{{ URL::to('/gen_img/'.$type.'/'.$param) }}">
    </div>
    <p><a role="button" class="btn btn-primary" href="{{ URL::to('/'.$type) }}">Chơi ngay</a></p>
    <div
            class="fb-like col-lg-12 text-center"
            data-share="true"
            data-width="450"
            data-show-faces="true">
    </div>
    <div class="fb-comments col-lg-12 text-center" data-href="{{Request::url()}}" data-numposts="5" data-colorscheme="light"></div>
@stop
@section('script')
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '1673208926240859',
                xfbml      : true,
                version    : 'v2.3'
            });
        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/vi_VN/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
@stop