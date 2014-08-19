<?php

namespace Soluciones\Repositories;

use Soluciones\Models\Category;

class CategoriesRepository extends EloquentRepository {

	/**
	 * @param \Soluciones\Models\Category $model
	 */
	public function __construct(Category $model)
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
			return $this->model->where('name', 'LIKE', "%$query%")->latest()->paginate();
		}

		return $this->model->latest()->paginate();
	}

	/**
	 * @override \Soluciones\Repositories\EloquentRepository
	 *
	 * @return \Illuminate\Database\Eloquent\Collection
	 */
	public function getAll()
	{
	    return $this->model
		    ->leftJoin('benefit_category', 'benefit_category.category_id', '=', 'categories.id')
		    ->groupBy('categories.slug')
		    ->orderBy('categories.slug', 'asc')
		    ->get(['categories.*', \DB::raw('count(*) as total')]);
	}

	/**
	 * @param string $categorySlug
	 *
	 * @return \Illuminate\Pagination\Paginator
	 */
	public function getBenefits($categorySlug)
	{
	    return $this->model
		    ->where('slug', $categorySlug)
		    ->firstOrFail()
		    ->benefits()
		    ->with('categories')
		    ->latest()
		    ->paginate();
	}

}
