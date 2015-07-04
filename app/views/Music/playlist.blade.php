@extends('layouts.Music.layout',['page_id'=>'page2'])

@section('content')
    <div class="col-1">
        <h2>トップ100</h2>
        <div class="p2">
            <?php $playlist = array() ?>
            @foreach( $topSongs as $key => $topSong )
                <?php $playlist[] = array('name' => $topSong["im"]["name"], 'artist' => $topSong["im"]["artist"], 'img' => $topSong["im"]["image"]) ?>
                <a href="/play?params={{{base64_encode(json_encode(array('name' => $topSong["im"]["name"], 'artist' => $topSong["im"]["artist"])))}}}" rel="prettyPhoto">
                    <img class="p1" src="{{{$topSong["im"]["image"]}}}" alt="">
                </a>
                <div class="alc"><a href="/play?params={{{base64_encode(json_encode(array('name' => $topSong["im"]["name"], 'artist' => $topSong["im"]["artist"])))}}}">{{{ $topSong["im"]["name"] . ' - ' . $topSong["im"]["artist"] }}}</a></div>
            @endforeach
            <?php Session::put('playlist', $playlist) ?>
        </div>
    </div>
    <div class="col-2">
        <h2>Galleries</h2>
        <div class="img-box fl"> <a href="images/01.jpg" rel="prettyPhoto[pp_gal]"><img src="images/gallery5.jpg" alt=""><br>
                Gallery 1</a> </div>
        <div class="img-box fl lst"> <a href="images/02.jpg" rel="prettyPhoto[pp_gal]"><img src="images/gallery2.jpg" alt=""><br>
                Gallery 2</a> </div>
        <div class="img-box fl"> <a href="images/03.jpg" rel="prettyPhoto[pp_gal]"><img src="images/gallery4.jpg" alt=""><br>
                Gallery 3</a> </div>
        <div class="img-box fl lst"> <a href="images/04.jpg" rel="prettyPhoto[pp_gal]"><img src="images/gallery1.jpg" alt=""><br>
                Gallery 4</a> </div>
        <div class="img-box fl"> <a href="images/05.jpg" rel="prettyPhoto[pp_gal]"><img src="images/gallery3.jpg" alt=""><br>
                Gallery 5</a> </div>
        <div class="img-box fl lst"> <a href="images/06.jpg" rel="prettyPhoto[pp_gal]"><img src="images/gallery6.jpg" alt=""><br>
                Gallery 6</a> </div>
        <div class="img-box fl"> <a href="images/07.jpg" rel="prettyPhoto[pp_gal]"><img src="images/gallery8.jpg" alt=""><br>
                Gallery 7</a> </div>
        <div class="img-box fl lst"> <a href="images/08.jpg" rel="prettyPhoto[pp_gal]"><img src="images/gallery7.jpg" alt=""><br>
                Gallery 8</a> </div>
    </div>
    <div class="col-3"></div>
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
