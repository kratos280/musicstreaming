@extends('BoiVui.boivui_template')
@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img alt="100%x200" style="height: 200px; width: 100%; display: block;" src="{{{ asset('img/gen_img.jpeg') }}}" data-holder-rendered="true">

                <div class="caption">
                    <h4>Bói Vui</h4>

                    <p>Bói Nghề Nghiệp</p>
                </div>
                <p><a role="button" class="btn btn-primary" href="{{ URL::to('/congviec') }}">Chơi ngay</a></p>
            </div>
        </div>
    </div>
@stop