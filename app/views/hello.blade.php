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
                <a href="#" class="list-group-item active">
                    Cras justo odio
                </a>
                <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
                <a href="#" class="list-group-item">Morbi leo risus</a>
                <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                <a href="#" class="list-group-item">Vestibulum at eros</a>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row row-padded">
                <div class="span4">
                Top Songs
                </div>
            </div>
            <div class="row">
                <div id="myCarousel" class="carousel slide">

                    <!-- Carousel items -->
                    <div class="carousel-inner" id="topSongs">
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
            <div class="row row-padded top">
                <div class="span4">
                    Top Albums
                </div>
            </div>
            <div class="row panel">
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img alt="100%x200" data-src="holder.js/100%x200"
                             style="height: 200px; width: 100%; display: block;"
                             src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjkxLjQ3NTAwMDM4MTQ2OTczIiB5PSIxMDAiIHN0eWxlPSJmaWxsOiNBQUFBQUE7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LWZhbWlseTpBcmlhbCwgSGVsdmV0aWNhLCBPcGVuIFNhbnMsIHNhbnMtc2VyaWYsIG1vbm9zcGFjZTtmb250LXNpemU6MTFwdDtkb21pbmFudC1iYXNlbGluZTpjZW50cmFsIj4yNDJ4MjAwPC90ZXh0PjwvZz48L3N2Zz4="
                             data-holder-rendered="true">

                        <div class="caption">
                            <h3>Thumbnail label</h3>

                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta
                                gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>

                            <p><a role="button" class="btn btn-primary" href="#">Button</a> <a role="button"
                                                                                               class="btn btn-default"
                                                                                               href="#">Button</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img alt="100%x200" data-src="holder.js/100%x200"
                             style="height: 200px; width: 100%; display: block;"
                             src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjkxLjQ3NTAwMDM4MTQ2OTczIiB5PSIxMDAiIHN0eWxlPSJmaWxsOiNBQUFBQUE7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LWZhbWlseTpBcmlhbCwgSGVsdmV0aWNhLCBPcGVuIFNhbnMsIHNhbnMtc2VyaWYsIG1vbm9zcGFjZTtmb250LXNpemU6MTFwdDtkb21pbmFudC1iYXNlbGluZTpjZW50cmFsIj4yNDJ4MjAwPC90ZXh0PjwvZz48L3N2Zz4="
                             data-holder-rendered="true">

                        <div class="caption">
                            <h3>Thumbnail label</h3>

                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta
                                gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>

                            <p><a role="button" class="btn btn-primary" href="#">Button</a> <a role="button"
                                                                                               class="btn btn-default"
                                                                                               href="#">Button</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img alt="100%x200" data-src="holder.js/100%x200"
                             style="height: 200px; width: 100%; display: block;"
                             src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjkxLjQ3NTAwMDM4MTQ2OTczIiB5PSIxMDAiIHN0eWxlPSJmaWxsOiNBQUFBQUE7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LWZhbWlseTpBcmlhbCwgSGVsdmV0aWNhLCBPcGVuIFNhbnMsIHNhbnMtc2VyaWYsIG1vbm9zcGFjZTtmb250LXNpemU6MTFwdDtkb21pbmFudC1iYXNlbGluZTpjZW50cmFsIj4yNDJ4MjAwPC90ZXh0PjwvZz48L3N2Zz4="
                             data-holder-rendered="true">

                        <div class="caption">
                            <h3>Thumbnail label</h3>

                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta
                                gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>

                            <p><a role="button" class="btn btn-primary" href="#">Button</a> <a role="button"
                                                                                               class="btn btn-default"
                                                                                               href="#">Button</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
