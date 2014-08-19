<?php

use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder {

	public function run()
	{
		$fake = Faker::create();

		$categories = [
			'Alimentos y Bebidas',
			'Entretenimiento',
			'Libros',
			'Fitness',
			'Museos',
			'Cine',
			'Teatros'
		];

		foreach($categories as $category)
		{
			Soluciones\Models\Category::create([
				'name'        => $category,
				'description' => $fake->sentence()
			]);
		}

		foreach(range(1, 20) as $index)
		{
			$benefitId  = $fake->numberBetween(1, 20);
			$categoryId = $fake->numberBetween(1, count($categories));
			Soluciones\Models\Benefit::find($benefitId)->categories()->attach($categoryId);
		}

	}

}