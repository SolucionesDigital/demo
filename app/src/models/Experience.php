<?php

namespace Soluciones\Models;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Experience extends EloquentModel implements SluggableInterface {

	use SoftDeletingTrait, SluggableTrait;

	/**
	 * Define the sluggable model-specific configurations
	 *
	 * @var array
	 */
	protected $sluggable = [
		'build_from' => 'title',
		'save_to'    => 'slug',
	];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'title',
		'status',
		'content',
		'excerpt',
		'published_at'
	];

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['published_at'];

	/**
	 * Get the permalink for the model
	 *
	 * @return string
	 */
	public function getPermalinkAttribute()
	{
		if ( ! isset($this->slug)) return '';

		return \URL::route('experiences.show', [$this->slug]);
	}

} 