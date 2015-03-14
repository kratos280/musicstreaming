@extends('layouts.application')

@section('styles')

@stop

@section('scripts')
<script>
    $('.carousel').carousel()
</script>
@stop

@section('content')
<div class="row">

    <div class="col-md-4">
        <div class="list-group media-list">
            @foreach( $topSongs as $key => $topSong )
            <a href="/list?key={{{ $topSong["title"] }}}" class="list-group-item">
                <div class="media-left">
                    <p>{{{++$key}}}</p>
                </div>
                <div class="media-left">
                    <img alt="64x64" data-src="holder.js/64x64" class="media-object"
                         style="width: 64px; height: 64px;"
                         src="{{{$topSong["im"]["image"]}}}"
                         data-holder-rendered="true">
                </div>
                <div class="media-body">
                    <h4 class="media-heading">
                        {{{ $topSong["title"] }}}
                    </h4>

                    <p> </p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    <div class="col-md-8">
        <div class="row row-padded">
            <div class="span4">
                New Release Songs
            </div>
        </div>
        <div class="row">
            <div id="myCarousel" class="carousel slide">

                <!-- Carousel items -->
                <div class="carousel-inner">
                    @foreach( $newReleases as $key => $newRelease )
                        @if ($key == 0)
                            {?$class = "active"?}
                        @else
                            {?$class = ""?}
                        @endif
                    @if ($key % 3 == 0)
                    <div class="item {{{$class}}}">
                        <div class="row">
                    @endif
                        <div class="col-sm-4"><a href="/list?key={{{ $newRelease["title"] }}}"><img src="{{{ str_replace("100x100", "200x200", $newRelease["itms"]["coverart"]) }}}" alt="Image"
                                class="img-responsive">
                            {{{ $newRelease["title"] }}}
                            </a>
                        </div>
                    @if ($key % 3 == 2)
                        </div>
                        <!--/row-->
                    </div>
                    @endif
                    @endforeach
                </div>
                <!--/carousel-inner-->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev"></a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next"></a>
            </div>
            <!--/myCarousel-->
        </div>

        <div class="row row-padded top">
            <div class="span4">
                Top Albums
            </div>
        </div>
        <div class="row panel">
            @foreach($topAlbums as $topAlbum)
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img alt="100%x200" data-src="holder.js/100%x200"
                         style="height: 200px; width: 100%; display: block;"
                         src="{{{$topAlbum["im"]["image"]}}}"
                         data-holder-rendered="true">

                    <div class="caption">
                        <h4>{{{ $topAlbum["title"] }}}</h4>

                        <p>{{{ $topAlbum["title"] }}}</p>
                    </div>
                    <p><a role="button" class="btn btn-primary" href="#">View it</a></p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@stop
