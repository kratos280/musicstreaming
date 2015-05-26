<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaylistsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('playlists', function($table)
		{
            $table->engine = 'InnoDB';

            $table->bigIncrements('playlist_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->text('name')->nullable();
            $table->text('description')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('playlists');
	}

}
