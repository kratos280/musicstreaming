@extends('layouts.Music.layout', ['page_id'=>'page1'])

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
		<!-- audio player begin -->
		<div id="jplayer"></div>
		<div class="jp-audio">
		<h2>New Song</h2>
		<div class="jp-type-single">
			<div id="jp_interface_1" class="jp-interface">
			<ul class="jp-controls">
				<li><a href="#" class="jp-play"></a></li>
				<li><a href="#" class="jp-pause"></a></li>
				<li><a href="#" class="jp-prev">Previous Track</a></li>
				<li><a href="#" class="jp-next">Next Track</a></li>
				<li><a href="#" class="jp-more-songs">Listen to More Songs</a></li>
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
		<h2 class="pl">トップアルバム</h2>
		@foreach($topAlbums as $topAlbum)
			<div class="col-sm-6 col-md-4" style="width: 50%">
				<div class="thumbnail" style="background-color: #1d1d1d">
					<img alt="100%x200" style="min-height: 155px; width: 100%; display: block;" src="{{{str_replace("170x170-75", "400x400-150", $topAlbum["im"]["image"])}}}">
					<div class="caption">
						<p style="font-size: medium">{{{ $topAlbum["im"]["name"]}}}<br>{{$topAlbum["im"]["artist"] }}</p>
					</div>
					<p><a role="button" class="btn btn-primary" href="/playlist?params={{base64_encode(json_encode(array('name' => $topAlbum["im"]["name"], 'artist' => $topAlbum["im"]["artist"])))}}">View it</a></p>
				</div>
			</div>
		@endforeach
	</div>
	<div class="col-3">
		<h2>Latest Tweets</h2>
		<div class="und">
		<p>At vero eos et accusamus et iusto odio dignissimos ducimus blanditiis.<br>
			<a href="#">1 hour ago</a></p>
		<p>Praesentium voluptatumdel enititque corrupti quos.<br>
			<a href="#">3 hours ago</a></p>
		<p>dolores et quas molestias excepturi sint occaecati cupiditate.<br>
			<a href="#">7 hours ago</a></p>
		<p>Non provident, similiqusunt in culpa qui officia.<br>
			<a href="#">12 hours ago</a></p>
		<p>At vero eos et accusamus et iusto odio dignissimos ducimus blanditiis.<br>
			<a href="#">16 hours ago</a></p>
		</div>
		<h2>Newsletter</h2>
		<form action="" id="subscribe">
		<fieldset>
			<label>
			<input type="text">
			</label>
			<input type="submit" value="">
		</fieldset>
		</form>
		<h2>Find Me</h2>
		<ul class="soc-ico">
		<li><a href="#"><img src="img/theme/facebook.png" alt=""></a></li>
		<li><a href="#"><img src="img/theme/twitter.png" alt=""></a></li>
		<li><a href="#"><img src="img/theme/myspace.png" alt=""></a></li>
		<li><a href="#"><img src="img/theme/linkedin.png" alt=""></a></li>
		</ul>
	</div>
@stop

@section('scriptsFooter')
	{{ HTML::script('js/Music/index.js') }}
@stop
