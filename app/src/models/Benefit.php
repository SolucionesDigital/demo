<?php

namespace Soluciones\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Benefit extends EloquentModel implements SluggableInterface  {

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
		'subtitle',
		'status',
		'content',
		'legal',
		'url',
		'valid_from',
		'valid_to'
	];

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['published_at', 'deleted_at'];

	/**
	 * Define all the thumbnail sizes and names.
	 *
	 * @var array
	 */
	public $sizes = [
		['thumbnail', 300, 300]
	];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function users()
	{
		return $this->belongsToMany(
			'Soluciones\Models\User',
			'user_benefits'
		)->withPivot('redeemed', 'redeem_token')->withTimestamps();
	}

	/**
	 * Define a many-to-many relationship.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
	 */
	public function categories()
	{
		return $this->belongsToMany('Soluciones\Models\Category');
	}

	/**
	 * @return string
	 */
	public function getFeaturedImageAttribute()
	{
		if ( empty($this->attributes['featured_image']) )
			return "http://placehold.it/300x300";

		return $this->attributes['featured_image'];
	}

}
