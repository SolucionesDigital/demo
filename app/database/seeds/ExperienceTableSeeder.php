<?php

use Faker\Factory as Faker;

class ExperienceTableSeeder extends Seeder {

	public function run()
	{
		$fake = Faker::create();

		foreach(range(1, 40) as $index)
		{
			Soluciones\Models\Experience::create([
				'title'        => $fake->sentence(6),
				'content'      => $fake->paragraph(40),
				'excerpt'      => $fake->sentence(10),
				'status'       => 'published',
				'published_at' => $fake->dateTimeBetween('-2 months', 'now'),
			]);
		}
	}

}