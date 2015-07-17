<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="最高, 音楽動画, 連続再生, シャッフル, 再生, バックグラウンド, 音楽, 無料, music, 曲, サウンド, sound, アニソン, 洋楽, 邦楽, 公式">

    @yield('og')

    {{ HTML::style('css/bootstrap.min.css') }}

    {{ HTML::style('css/theme/style.css') }}
    {{ HTML::style('css/theme/layout.css') }}
    {{ HTML::style('css/theme/prettyPhoto.css') }}

    {{ HTML::script('js/Music/theme/jquery.min.js') }}
    {{ HTML::script('js/Music/theme/cufon-yui.js') }}
    {{ HTML::script('js/Music/theme/cufon-replace.js') }}
    {{ HTML::script('js/Music/theme/sprites.js') }}
    {{ HTML::script('js/Music/theme/jquery.jplayer.min.js') }}
    {{ HTML::script('js/Music/theme/jquery.jplayer.settings.js') }}
    {{ HTML::script('js/Music/theme/gSlider.js') }}
    {{ HTML::script('js/Music/theme/jquery.easing.1.3.js') }}
    {{ HTML::script('js/Music/theme/jquery.prettyPhoto.js') }}
    @yield('extendScript')
    <!--[if lt IE 7]> <div style=' clear: both; height: 59px; padding:0 0 0 15px; position: relative;'> <a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/img/theme/upgrade.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a></div> <![endif]-->
    <!--[if lt IE 9]><script src="js/html5.js" type="text/javascript"></script><![endif]-->
    <!--[if IE]><link href="css/ie_style.css" rel="stylesheet" type="text/css" /><![endif]-->
</head>
<body id="{{$page_id}}">
<div id="main">
    <header>
        <nav>
            <ul>
                <li class="active"><a href="{{URL::to('/');}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
            </ul>
        </nav>
            <form method="POST" action="/search" class="input-group header-slider">
                <input type="text" autofocus="autofocus" autocomplete="off" placeholder="{{trans('messages.Keyword')}}" name="search" style="height: 50px" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" style="height: 50px;">{{trans('messages.Search')}}</button>
                </span>
            </form>
    </header>
@yield('banner')
    <article id="content">
        @yield('content')
        <div class="af clear"></div>
    </article>
</div>
<footer>
<span style="font-size: 25px">
Music Online Top 1
</span>
</footer>
@yield('scriptsFooter')
<script>
    $(document).ready(function() {
        $('nav,.more,.header-more').sprites()

        $('.header-slider').gSlider({
            prevBu:'.hs-prev',
            nextBu:'.hs-next'
        })
        @yield('documentReady')
    });
</script>
@if(!App::environment('local'))
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-63796879-2', 'auto');
        ga('send', 'pageview');

    </script>
@endif
</body>
</html>