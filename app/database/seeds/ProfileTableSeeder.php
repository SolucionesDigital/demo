<?php

use Faker\Factory as Faker;

class ProfileTableSeeder extends Seeder {

	public function run()
	{
		$fake = Faker::create();

		Soluciones\Models\Profile::create([
			'user_id' => 1,
			'first_name'   => 'Jorge',
			'last_name'    => 'González',
			'age'     => 30,
			'state'   => 'Distrito Federal',
			'city'    => 'Mexico',
			'nss'    => '6565439987890',
			'picture' => 'images/picture.jpg',
		]);

		Soluciones\Models\Profile::create([
			'user_id' => 2,
			'first_name'   => 'Karla',
			'last_name'    => 'Villa',
			'age'     => 30,
			'state'   => 'Distrito Federal',
			'city'    => 'Mexico',
			'nss'    => '34987555436',
			'picture' => 'images/picture.jpg',
		]);

		Soluciones\Models\Profile::create([
			'user_id' => 3,
			'first_name'   => 'Carlos',
			'last_name'    => 'Rosenblum',
			'age'     => 27,
			'state'   => 'Distrito Federal',
			'city'    => 'Mexico',
			'nss'    => '56473899873',
			'picture' => 'images/picture.jpg',
		]);
	}

}