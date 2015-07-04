<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SearchVideosCache extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('search_videos_cache',function (Blueprint $t) {
			$t->bigIncrements('id');
			$t->string('name', 255)->default('');
			$t->string('artist', 255)->default('');
			$t->string('video_id', 255);
			$t->string('video_title', 1024)->default('');
			$t->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('search_videos_cache');
	}

}
