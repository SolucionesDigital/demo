<?php

namespace Soluciones\Repositories;

use Soluciones\Exceptions\UnredeemableBenefitException;
use Soluciones\Models\Benefit;
use Soluciones\Models\User;

class BenefitsRepository extends EloquentRepository {

	/**
	 * @param Benefit $model
	 */
	function __construct(Benefit $model)
	{
		parent::__construct($model);
	}

	/**
	 * @param int $perPage
	 *
	 * @return Benefit
	 */
	public function getFeatured($perPage = 10)
	{
		return $this->model->latest()->paginate($perPage);
	}

	/**
	 * Get a collection of benefits associated with the user model
	 *
	 * @param User $user
	 *
	 * @return mixed
	 */
	public function getByUser(User $user)
	{
		return $this->model->join('user_benefits', function($join) use ($user) {
			$join->on('user_benefits.benefit_id', '=', 'benefits.id')
			     ->where('user_benefits.user_id', '=', $user->id);
		})
			->orderBy('user_benefits.redeemed', 'desc')
			->latest('user_benefits.created_at')
			->paginate();
	}


	/**
	 * Create the relationship between the user and benefit in the user_benefits table
	 *
	 * @todo Implement better hashing mechanism
	 * @param $benefitId
	 */
	public function attachToCurrentUser($benefitId)
	{
		$user = \Auth::user();

		$redeemToken = \Hash::make( $user->id . $benefitId );

		$user->benefits()->sync([$benefitId => ['redeem_token' => $redeemToken]], false);
	}

	/**
	 * Regresa un array con los ids de los usuarios relacionados
	 * La relación se guarda en la table de user_benefits
	 *
	 * @param $benefitId
	 *
	 * @return mixed
	 */
	public function getRelatedUserIds($benefitId)
	{
	    $benefit = $this->model->with('users')->whereId($benefitId)->firstOrFail();

		return $benefit->users->lists('id');
	}

	/**
	 * Check if current user is associated with the benefit in the user_benefits table
	 *
	 * @param $benefitId
	 *
	 * @return bool
	 */
	public function currentUserHasBenefit($benefitId)
	{
		$relatedUserIds = $this->getRelatedUserIds($benefitId);

		return ( \Auth::check() AND in_array(\Auth::id(), $relatedUserIds) );
	}

	/**
	 * @param $benefitId
	 * @param $redeemToken
	 *
	 * @return bool
	 * @throws \Soluciones\Exceptions\UnredeemableBenefitException
	 */
	public function redeemBenefit($benefitId, $redeemToken)
	{
		$row = \DB::table('user_benefits')->where('redeem_token', $redeemToken)->first();

		if ( is_null($row) ) throw new UnredeemableBenefitException;

		if ( $row->redeemed == 'false' )
		{
			$this->setBenefitRedeemedStatus($redeemToken, true);
		}

		return ( $row->redeemed == 'true' );
	}

	/**
	 * @param      $redeemToken
	 * @param bool $status
	 */
	public function setBenefitRedeemedStatus($redeemToken, $status = true)
	{
		\DB::table('user_benefits')
			->where('redeem_token', $redeemToken)
			->update(['redeemed' => (string)$status]);
	}

}
