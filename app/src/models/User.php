<?php

namespace Soluciones\Models;

use Admin\Support\AvatarInterface;
use Admin\Support\GravatarTrait;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends EloquentModel implements UserInterface, RemindableInterface, AvatarInterface {

	use UserTrait, RemindableTrait, SoftDeletingTrait, GravatarTrait;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['username', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['deleted_at'];

	/**
	 * The relations to eager load on every query.
	 *
	 * @var array
	 */
	protected $with = ['profile'];

	/**
	 * The relationships that should be touched on save.
	 *
	 * @var array
	 */
	protected $touches = ['profile'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function benefits()
	{
		return $this->belongsToMany(
			'Soluciones\Models\Benefit',
			'user_benefits'
		)->withPivot('redeemed', 'redeem_token')->withTimestamps();
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function profile()
	{
		return $this->hasOne('Soluciones\Models\Profile');
	}

	/**
	 * Hash the passwword before saving.
	 *
	 * @param $password
	 */
	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = \Hash::make($password);
	}

}
