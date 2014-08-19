<?php

namespace Soluciones\Models;

class ProfileForm extends \Eloquent {

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'username',
		'email',
		'password',
		'first',
		'last',
		'nss',
		'state'
	];

	/**
	 * Save a new model and return the instance.
	 *
	 * @param  array  $attributes
	 * @return \Illuminate\Database\Eloquent\Model|static
	 */
	public static function create(array $attributes)
	{
		dd('Creating...');
	}

	/**
	 * Save the model to the database.
	 *
	 * @param  array  $options
	 * @return bool
	 */
	public function save(array $options = [])
	{
		if ($this->fireModelEvent('saving') === false) return false;

		dd('Saving...');
	}

	/**
	 * Update the model in the database.
	 *
	 * @param  array  $attributes
	 * @return mixed
	 */
	public function update(array $attributes = array())
	{
		dd('Updating...');

		return $this->fill($attributes)->save();
	}

}
