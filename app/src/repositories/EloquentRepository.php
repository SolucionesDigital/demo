<?php

namespace Soluciones\Repositories;

use Illuminate\Database\Eloquent\Model;
use Soluciones\Exceptions\EntityNotFoundException;

abstract class EloquentRepository {

	/**
	 * @var Model
	 */
	protected $model;

	/**
	 * @param Model|null $model
	 */
	public function __construct($model = null)
	{
		$this->model = $model;
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Collection
	 */
	public function getAll()
	{
		return $this->model->all();
	}

	/**
	 * @return \Illuminate\Pagination\Paginator
	 */
	public function getPaginated()
	{
		if ( $query = \Input::get('q') )
		{
			return $this->model->where('title', 'LIKE', "%$query%")->latest()->paginate();
		}

		return $this->model->latest()->paginate();
	}

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Database\Eloquent\Model
	 * @throws ModelNotFoundException
	 */
	public function getById($id)
	{
		return $this->model->findOrFail($id);
	}

	/**
	 * @param $slug
	 *
	 * @return \Illuminate\Database\Eloquent\Model
	 * @throws ModelNotFoundException
	 */
	public function getBySlug( $slug )
	{
		return $this->model->where('slug', $slug)->firstOrFail();
	}

	/**
	 * @param array $attributes
	 *
	 * @return Model|static
	 */
	public function getNew($attributes = [])
	{
		return $this->model->newInstance($attributes);
	}

	/**
	 * @param $data
	 *
	 * @return mixed
	 */
	public function save($data)
	{
		if ($data instanceOf Model)
		{
			return $this->storeEloquentModel($data);
		}

		elseif (is_array($data))
		{
			return $this->storeArray($data);
		}
	}

	/**
	 * @param $data
	 *
	 * @return mixed
	 */
	public function update($data)
	{
		$this->model->update($data);
	}

	/**
	 * @param $model
	 *
	 * @return mixed
	 */
	public function delete($model)
	{
		return $model->delete();
	}

	/**
	 * @param $model
	 *
	 * @return mixed
	 */
	protected function storeEloquentModel($model)
	{
		if ($model->getDirty())
		{
			return $model->save();
		}

		else
		{
			return $model->touch();
		}
	}

	/**
	 * @param $data
	 *
	 * @return mixed
	 */
	protected function storeArray($data)
	{
		$model = $this->getNew($data);

		return $this->storeEloquentModel($model);
	}

	/**
	 * @param $id
	 *
	 * @return mixed
	 */
	public function restore($id)
	{
	    return $this->model->onlyTrashed()->whereId($id)->restore();
	}

}
