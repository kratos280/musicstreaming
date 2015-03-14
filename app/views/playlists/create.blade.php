@extends('layouts.application')

@section('styles')
@stop

@section('scripts')
@stop

@section('content')
<h1>Create Your Playlist</h1>
{{ Form::open(['url' => 'playlists', 'method' => 'POST', 'id' => 'form-create']) }}
<table class="table table-striped">
    <tbody style="font-size: 140%;">
    <tr>
        <th width="30%">Name</th>
        <td width="70%">{{ Form::text('name', '', ['placeholder' => '', 'class' => 'form-control'])}}</td>
    </tr>
    <tr>
        <th width="30%">Description</th>
        <td width="70%">{{ Form::text('description', '', ['placeholder' => '', 'class' => 'form-control'])}}</td>
    </tr>
    </tbody>
</table>
<div class="text-center">
    {{ Form::submit('Create', ['class' => 'btn bg-olive btn-primary']) }}
</div>
{{ Form::close() }}
@stop


