<?php

use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run()
	{
		Soluciones\Models\User::create([
			'username' => 'york',
			'email'    => 'scrub.mx@gmail.com',
			'password' => 'password'
		]);

		Soluciones\Models\User::create([
			'username' => 'karla',
			'email'    => 'sternblumen@gmail.com',
			'password' => 'password'
		]);

		Soluciones\Models\User::create([
			'username' => 'rosenblum',
			'email'    => 'kavuster@gmail.com',
			'password' => 'password'
		]);
	}

}
