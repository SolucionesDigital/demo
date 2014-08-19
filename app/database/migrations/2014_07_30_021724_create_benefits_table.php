<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBenefitsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('benefits', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('slug')->index();
			$table->string('subtitle')->nullable();
			$table->enum('status', ['published', 'draft', 'scheduled'])->default('published');
			$table->text('content')->nullable();
			$table->text('legal')->nullable();
			$table->string('url')->nullable();
			$table->date('valid_from');
			$table->date('valid_to');
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
		Schema::drop('benefits');
	}

}
