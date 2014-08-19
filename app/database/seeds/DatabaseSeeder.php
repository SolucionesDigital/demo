<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		Soluciones\Models\User::truncate();
		Soluciones\Models\Benefit::truncate();
		Soluciones\Models\Experience::truncate();
		Soluciones\Models\Profile::truncate();
		Soluciones\Models\Category::truncate();

		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		$this->call('UserTableSeeder');
		$this->call('BenefitTableSeeder');
		$this->call('ExperienceTableSeeder');
		$this->call('ProfileTableSeeder');
		$this->call('CategoryTableSeeder');
	}

}
