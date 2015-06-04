<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
            $table->engine = 'InnoDB';

            $table->bigInteger('user_id')->unsigned();
            $table->string('username', 255);
            $table->string('profile_image', 255)->default('');
            $table->string('fb_access_token', 255)->default('');
            $table->text('remember_token')->nullable();
            $table->integer('role')->unsigned()->default(1);

            $table->softDeletes();
            $table->timestamps();

            $table->primary('user_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
