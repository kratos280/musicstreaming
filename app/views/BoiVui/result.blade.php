@extends('BoiVui.boivui_template')
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