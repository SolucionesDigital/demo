<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExperiencesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('experiences', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('slug')->index();
			$table->enum('status', ['published', 'draft', 'scheduled'])->default('published');
			$table->text('content')->nullable();
			$table->text('excerpt')->nullable();
			$table->timestamp('published_at');
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
		Schema::drop('experiences');
	}

}
