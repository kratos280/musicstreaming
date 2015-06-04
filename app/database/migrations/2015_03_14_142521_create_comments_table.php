<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function($table)
		{
            $table->engine = 'InnoDB';

            $table->bigIncrements('comment_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('audio_id')->unsigned();
            $table->text('content')->nullable();
            $table->integer('status')->default(1);

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
		Schema::drop('comments');
	}

}
