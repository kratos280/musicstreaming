<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AfterSearchDataAddUrl extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('search_playlist', function(Blueprint $t){
			$t->string('img_url', 1024)->after('playlist_id')->default('');
		}) ;

		Schema::table('search_videos_cache', function(Blueprint $t){
			$t->string('img_url', 1024)->after('video_title')->default('');
		}) ;
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('search_playlist', function(Blueprint $t){
			$t->dropColumn('img_url');
		}) ;
		Schema::table('search_videos_cache', function(Blueprint $t){
			$t->dropColumn('img_url');
		}) ;
	}

}
