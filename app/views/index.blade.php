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
        <div class="list-group media-list">
            @foreach( $topSongs as $topSong )
            <a href="/list?key={{ $topSong->getTitle() }}" class="list-group-item">
                <div class="media-left">
                    <img alt="64x64" data-src="holder.js/64x64" class="media-object"
                         style="width: 64px; height: 64px;"
                         src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PGRlZnMvPjxyZWN0IHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjEyLjQ1ODMzMzk2OTExNjIxMSIgeT0iMzIiIHN0eWxlPSJmaWxsOiNBQUFBQUE7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LWZhbWlseTpBcmlhbCwgSGVsdmV0aWNhLCBPcGVuIFNhbnMsIHNhbnMtc2VyaWYsIG1vbm9zcGFjZTtmb250LXNpemU6MTBwdDtkb21pbmFudC1iYXNlbGluZTpjZW50cmFsIj42NHg2NDwvdGV4dD48L2c+PC9zdmc+"
                         data-holder-rendered="true">
                </div>
                <div class="media-body">
                    <h4 class="media-heading">
                        {{{ $topSong->getTitle() }}}
                    </h4>

                    <p> {{{ $topSong->getAuthor() }}}</p>
                </div>
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
            @foreach($topAnbums as $topAnbum)
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img alt="100%x200" data-src="holder.js/100%x200"
                         style="height: 200px; width: 100%; display: block;"
                         src=""
                         data-holder-rendered="true">

                    <div class="caption">
                        <h3>{{{ $topAnbum->getTitle() }}}</h3>

                        <p>{{{ $topAnbum->getLink() }}}</p>

                        <p><a role="button" class="btn btn-primary" href="#">View it</a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@stop
