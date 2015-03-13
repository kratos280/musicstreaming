<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAudioPlaylistsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('audio_playlists', function($table)
		{
            $table->engine = 'InnoDB';

            $table->bigIncrements('audio_playlist_id')->unsigned();
            $table->bigInteger('audio_id')->unsigned();
            $table->bigInteger('playlist_id')->unsigned();

            $table->timestamps();

            $table->foreign('audio_id')->references('audio_id')->on('audios');
            $table->foreign('playlist_id')->references('playlist_id')->on('playlists');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('audio_playlists');
	}

}
