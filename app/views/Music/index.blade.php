@extends('layouts.Music.layout', ['page_id'=>'page1'])

@section('og')
	<title>Music Online Top 1</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta property="og:title" content="Music Online Top 1" />
	<meta property="og:description" content="Music Online Top 1" />
	<meta property="og:type" content="website" />
	<meta property="og:image" content="{{str_replace("170x170-75", "550x550-150", $topSongs[0]["im"]["image"])}}" />
	<meta property="og:image:type" content="image/jpg" />
	<meta property="og:image:width" content="550" />
	<meta property="og:image:height" content="288" />
	<meta charset="utf-8" />
@stop

@section('banner')
  <div class="tumbvr">
	<div class="tumbvr-mask"></div>
	<ul>
		<?php $count = 0; ?>
		@foreach( $topSongs as $key => $topSong )
			<li><img src="{{{str_replace("170x170-75", "400x400-150", $topSong["im"]["image"])}}}" alt="" width="400" height="400"></li>
			<?php if ($count >= 15) break; ?>
			<?php $count+=1 ?>
			@endforeach
	</ul>
  </div>
@stop

@section('content')

	<div class="col-1">
		<h2>{{trans('messages.Top100')}}</h2>
		<div class="p2">
			<?php $playlist = array() ?>
			@foreach( $topSongs as $key => $topSong )
				<?php $playlist[] = array('name' => $topSong["im"]["name"], 'artist' => $topSong["im"]["artist"], 'img' => $topSong["im"]["image"]) ?>
				<a href="/play/{{{str_replace('/', '-----',base64_encode(json_encode(array('name' => $topSong["im"]["name"], 'artist' => $topSong["im"]["artist"]))))}}}" rel="prettyPhoto">
					<img class="p1" src="{{{$topSong["im"]["image"]}}}" alt="">
				</a>
				<div class="alc"><a href="/play?params={{{str_replace('/', '-----', base64_encode(json_encode(array('name' => $topSong["im"]["name"], 'artist' => $topSong["im"]["artist"]))))}}}">{{{ $topSong["im"]["name"] . ' - ' . $topSong["im"]["artist"] }}}</a></div>
			@endforeach
				<?php Session::put('playlist', $playlist) ?>
		</div>
	</div>
	<div class="col-2">
		<select class="form-control" id="langSelect" style="  width: 30%;margin: auto;margin-bottom: 20px;">
			<option <?php if($lang == 'jp') echo 'selected' ?> value="jp">Japan Music</option>
			<option <?php if($lang == 'en') echo 'selected' ?> value="en">English Music</option>
			<option <?php if($lang == 'vn') echo 'selected' ?> value="vn">Viet Nam Music</option>
		</select>
		<!-- audio player begin -->
		<div id="jplayer"></div>
		<div class="jp-audio">
		<div class="jp-type-single">
			<div id="jp_interface_1" class="jp-interface">
			<ul class="jp-controls">
				<li><a href="#" class="jp-play"></a></li>
				<li><a href="#" class="jp-pause"></a></li>
				<li><a href="#" class="jp-prev">Previous Track</a></li>
				<li><a href="#" class="jp-next">Next Track</a></li>
			</ul>
			<div class="jp-progress">
				<div class="jp-seek-bar">
				<div class="jp-play-bar"></div>
				</div>
			</div>
			<div class="jp-title"></div>
			</div>
		</div>
		</div>
		<!-- audio player end -->
		<h2 class="pl">{{trans('messages.TopAlbum')}}</h2>
		@foreach($topAlbums as $topAlbum)
			<div class="col-sm-6 col-md-4" style="width: 50%">
				<div class="thumbnail" style="background-color: #1d1d1d">
					<img alt="100%x200" style="min-height: 155px; width: 100%; display: block;" src="{{{str_replace("170x170-75", "400x400-150", $topAlbum["im"]["image"])}}}">
					<div class="caption">
						<p style="font-size: medium">{{{ $topAlbum["im"]["name"]}}}<br>{{$topAlbum["im"]["artist"] }}</p>
					</div>
					<p><a role="button" class="btn btn-primary" href="/playlist/{{base64_encode(json_encode(array('name' => $topAlbum["im"]["name"], 'artist' => $topAlbum["im"]["artist"])))}}">{{trans('messages.View')}}</a></p>
				</div>
			</div>
		@endforeach
	</div>
	<div class="col-3">
		<!-- i-mobile for PC client script -->
		<script type="text/javascript">
			imobile_pid = "39969";
			imobile_asid = "518265";
			imobile_width = 160;
			imobile_height = 600;
		</script>
		<script type="text/javascript" src="http://spdeliver.i-mobile.co.jp/script/ads.js?20101001"></script>

	</div>
@stop

@section('scriptsFooter')
	{{ HTML::script('js/Music/index.js') }}
@stop
