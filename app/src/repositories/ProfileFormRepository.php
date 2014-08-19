<?php

namespace Soluciones\Repositories;

use Soluciones\Models\ProfileForm;
use Soluciones\Models\User;

class ProfileFormRepository extends EloquentRepository {

	/**
	 * @var \Soluciones\Models\User
	 */
	protected $user;

	/**
	 * @var ProfileForm
	 */
	private $profileForm;

	/**
	 * @param User        $user
	 * @param ProfileForm $profileForm
	 */
	function __construct(User $user, ProfileForm $profileForm)
	{
		$this->user = $user;
		$this->profileForm = $profileForm;
	}

	/**
	 * @override \Soluciones\Repositories\EloquentRepository
	 *
	 * @param $userId
	 *
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function getById($userId)
	{
	    $userWithProfile = $this->user->with('profile')->findOrFail($userId);

		$userWithProfile = array_flat($userWithProfile->toArray());

		return $this->profileForm->fill($userWithProfile);
	}

}
