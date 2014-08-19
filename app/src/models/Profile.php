<?php

namespace Soluciones\Models;

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Profile extends EloquentModel {

	use SoftDeletingTrait;

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['deleted_at'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo('Soluciones\Models\User');
	}

}
