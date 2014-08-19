<?php

namespace Soluciones\Repositories;

use Soluciones\Models\Experience;

class ExperiencesRepository extends EloquentRepository {

	/**
	 * @param Experience $model
	 */
	public function __construct(Experience $model)
	{
		parent::__construct($model);
	}

}
