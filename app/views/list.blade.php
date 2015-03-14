@extends('layouts.application')

@section('styles')
@stop

@section('scripts')
@stop

@section('content')
<div class="col-md-8" style="text-align: center;margin-top:50px">
    <div class="list-group media-list">
        @if( count($items) > 0 )
        @foreach( $items as $item )
        <a href="/audios/{{{ $item->id }}}?key={{{ $key }}}" class="list-group-item">
            <div class="media-left">
                <img alt="64x64" data-src="holder.js/64x64" class="media-object"
                     style="width: 128px; height: 128px;"
                     src="{{{$item->artwork_url ? $item->artwork_url : url('/images/default.png')}}}"
                     data-holder-rendered="true">
            </div>
            <div class="media-body">
                <h4 class="media-heading" style="text-align: left!important;">
                {{{ $item->title }}}
                </h4>
                <p></p>
            </div>
        </a>
        @endforeach
        @else
        <h2>No Result</h2>
        @endif
    </div>
</div>
@stop

