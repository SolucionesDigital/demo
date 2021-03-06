<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profiles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->unique();
			$table->string('first_name')->nullable();
			$table->string('last_name')->nullable();
			$table->integer('age')->nullable();
			$table->string('state')->nullable();
			$table->string('city')->nullable();
			$table->string('nss')->nullable();
			$table->string('picture')->nullable();
			$table->softDeletes();
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('profiles');
	}

}
