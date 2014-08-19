<?php

namespace Soluciones\Repositories;

use Soluciones\Models\User;

class UsersRepository extends EloquentRepository {

	/**
	 * @param User $model
	 */
	function __construct(User $model)
	{
		parent::__construct($model);
	}

	/**
	 * @override \Soluciones\Repositories\EloquentRepository
	 *
	 * @return \Illuminate\Pagination\Paginator
	 */
	public function getPaginated()
	{
		if ( $query = \Input::get('q') )
		{
			return $this->model
				->where('username', 'LIKE', "%$query%")
				->orWhere('email', 'LIKE', "%$query%")
				->latest()
				->paginate();
		}

		return $this->model->latest()->paginate();
	}

}
