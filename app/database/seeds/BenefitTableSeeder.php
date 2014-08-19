<?php

use Faker\Factory as Faker;

class BenefitTableSeeder extends Seeder {

	public function run()
	{
		$fake = Faker::create();

		foreach(range(1, 20) as $index)
		{
			Soluciones\Models\Benefit::create([
				'title'        => $fake->sentence(4),
				'subtitle'     => $fake->sentence(5),
				'content'      => $fake->paragraph(4),
				'legal'        => $fake->sentence(10),
				'status'       => 'published',
				'url'          => $fake->url(),
				'valid_from'   => $fake->dateTimeBetween('-1 months', 'now'),
				'valid_to'     => $fake->dateTimeBetween('+2 months', '+4 months'),
				'published_at' => $fake->dateTimeBetween('-2 months', 'now'),
			]);
		}
	}

}
