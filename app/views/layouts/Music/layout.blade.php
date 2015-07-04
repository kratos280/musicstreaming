<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
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
    <!--[if lt IE 7]> <div style=' clear: both; height: 59px; padding:0 0 0 15px; position: relative;'> <a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/img/theme/upgrade.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a></div> <![endif]-->
    <!--[if lt IE 9]><script src="js/html5.js" type="text/javascript"></script><![endif]-->
    <!--[if IE]><link href="css/ie_style.css" rel="stylesheet" type="text/css" /><![endif]-->
</head>
<body id="{{$page_id}}">
<div id="main">
    <header>
        <nav>
            <ul>
                <li class="active"><a href="{{URL::to('/');}}">ホーム</a></li>
            </ul>
        </nav>
        <h1><a href="index1.blade.php">Lilly Watson</a></h1>
        <div class="header-slider">
            <ul>
                <li>This is one of <a href="http://blog.templatemonster.com/free-website-templates/">free website templates</a> created by TemplateMonster.com team. This website template is optimized for 1024X768 screen resolution.</li>
                <li>This website template has several pages: About, Audio, Video, Gallery, Tour Dates, Contacts (note that contact us form – doesn’t work).</li>
                <li>This <a href="http://blog.templatemonster.com/2011/04/12/free-music-website-template/" target="_blank" rel="nofollow">Free Music Website Template</a> goes with two packages – with PSD source files and without them. PSD source files are available for free.</li>
            </ul>
        </div>
        <a href="#" class="hs-prev"><img src="img/theme/prev.png" alt=""></a>
        <a href="#" class="hs-next"><img src="img/theme/next.png" alt=""></a>
        <a href="#" class="header-more">Read More</a>
    </header><div class="innercopy">More Website Templates at TemplateMonster.com!</div>
    @yield('banner')
    <article id="content">
        @yield('content')
        <div class="af clear"></div>
    </article>
</div>
<footer>
<span>

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
</body>
</html>