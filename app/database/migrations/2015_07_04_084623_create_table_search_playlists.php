<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSearchPlaylists extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('search_playlist', function(Blueprint $t) {
			$t->bigIncrements('id');
			$t->string('name', 255)->default('');
			$t->string('artist', 255)->default('');
			$t->string('playlist_id', 255)->default('');
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
		Schema::drop('search_playlist');
	}

}
