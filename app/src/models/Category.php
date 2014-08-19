<?php

namespace Soluciones\Models;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Category extends EloquentModel implements SluggableInterface {

	use SluggableTrait, SoftDeletingTrait;

	/**
	 * Define the sluggable model-specific configurations
	 *
	 * @var array
	 */
	protected $sluggable = [
		'build_from' => 'name',
		'save_to'    => 'slug',
	];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'description'];

	/**
	 * Define a many-to-many relationship.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
	 */
	public function benefits()
	{
		return $this->belongsToMany('Soluciones\Models\Benefit');
	}

}
