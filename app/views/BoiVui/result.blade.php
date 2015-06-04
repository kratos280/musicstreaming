@extends('BoiVui.boivui_template')

@section('header')
    <title>Bạn Phù Hợp Với Nghề Nào Nhất?</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="Bạn Phù Hợp Với Nghề Nào Nhất?">
    <meta property="og:description" content="Bạn Phù Hợp Với Nghề Nào Nhất?">
    <meta property="og:type" content="website">
    <meta property="og:image" content="">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="520">
    <meta property="og:image:height" content="280">
    <meta charset="utf-8">
@stop

@section('content')
    <div class="col-lg-12 text-center">
        <img src="/gen_img?param={{$param}}">
    </div>
    <div
            class="fb-like"
            data-share="true"
            data-width="450"
            data-show-faces="true">
    </div>

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
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
@stop