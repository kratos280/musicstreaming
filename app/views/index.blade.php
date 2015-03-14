@extends('layouts.application')

@section('styles')

@stop

@section('scripts')
<script src="#">
    $('.carousel').carousel()
</script>
@stop

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="list-group">
            @foreach( $topSongs as $topSong )
            <a href="/list?key={{ $topSong->getTitle() }}" class="list-group-item">
                {{{ $topSong['title'] }}}
            </a>
            @endforeach
        </div>
    </div>
    <div class="col-md-8">
        <div class="row">
            <div id="myCarousel" class="carousel slide">

                <!-- Carousel items -->
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="row">
                            <div class="col-sm-4"><a href="#x"><img src="{{ url("images/38528.jpg") }}" alt="Image"
                                    class="img-responsive"></a>
                            </div>
                            <div class="col-sm-4"><a href="#x"><img src="{{ url("images/38474.jpg") }}" alt="Image"
                                    class="img-responsive"></a>
                            </div>
                            <div class="col-sm-4"><a href="#x"><img src="{{ url("images/38528.jpg") }}" alt="Image"
                                    class="img-responsive"></a>
                            </div>
                        </div>
                        <!--/row-->
                    </div>
                    <!--/item-->
                    <div class="item">
                        <div class="row">
                            <div class="col-sm-4"><a href="#x"><img
                                        src="{{ url("images/38528.jpg") }}" alt="Image"
                                    class="img-responsive"></a>
                            </div>
                            <div class="col-sm-4"><a href="#x"><img
                                        src="{{ url("images/38528.jpg") }}" alt="Image"
                                    class="img-responsive"></a>
                            </div>
                            <div class="col-sm-4"><a href="#x"><img
                                        src="{{ url("images/38528.jpg") }}" alt="Image"
                                    class="img-responsive"></a>
                            </div>
                        </div>
                        <!--/row-->
                    </div>
                    <!--/item-->
                    <div class="item">
                        <div class="row">
                            <div class="col-sm-4"><a href="#x"><img
                                        src="{{ url("images/38528.jpg") }}" alt="Image"
                                    class="img-responsive"></a>
                            </div>
                            <div class="col-sm-4"><a href="#x"><img
                                        src="{{ url("images/38528.jpg") }}" alt="Image"
                                    class="img-responsive"></a>
                            </div>
                            <div class="col-sm-4"><a href="#x"><img
                                        src="{{ url("images/38528.jpg") }}" alt="Image"
                                    class="img-responsive"></a>
                            </div>
                        </div>
                        <!--/row-->
                    </div>
                    <!--/item-->
                </div>
                <!--/carousel-inner-->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev"></a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next"></a>
            </div>
            <!--/myCarousel-->
        </div>
        <div class="row panel">
            @foreach($topAlbums as $topAlbum)
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img alt="100%x200" data-src="holder.js/100%x200"
                         style="height: 200px; width: 100%; display: block;"
                         src=""
                         data-holder-rendered="true">

                    <div class="caption">
                        <h3>{{{ $topAlbum->getTitle() }}}</h3>

                        <p>{{{ $topAlbum->getLink() }}}</p>

                        <p><a role="button" class="btn btn-primary" href="#">View it</a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@stop
