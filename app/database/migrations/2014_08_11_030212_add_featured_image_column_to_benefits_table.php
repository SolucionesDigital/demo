<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddFeaturedImageColumnToBenefitsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('benefits', function(Blueprint $table)
		{
			$table->text('featured_image')->nullable()->after('url');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('benefits', function(Blueprint $table)
		{
			$table->dropColumn('featured_image');
		});
	}

}
