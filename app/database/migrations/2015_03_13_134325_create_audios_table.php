<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAudiosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('audios', function($table)
		{
            $table->engine = 'InnoDB';

            $table->bigIncrements('audio_id')->unsigned();
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->string('artwork_url', 255)->default('');
            $table->string('format', 50)->default('');
            $table->string('uri', 255)->default('');
            $table->string('stream_url', 255)->default('');
            $table->integer('downloadable')->default(1);
            $table->integer('status')->default(1);

            $table->softDeletes();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('audios');
	}

}
