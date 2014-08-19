<?php

namespace Admin\Controllers;

use Soluciones\Repositories\CategoriesRepository;
use Soluciones\Validation\Forms\CategoryFormValidator;

class CategoriesController extends AdminController {

	/**
	 * @var \Soluciones\Repositories\CategoriesRepository
	 */
	private $categoriesRepository;

	/**
	 * @var \Soluciones\Validation\Forms\CategoryFormValidator
	 */
	private $categoryFormValidator;

	/**
	 * @param CategoriesRepository  $categoriesRepository
	 * @param CategoryFormValidator $categoryFormValidator
	 */
	function __construct(CategoriesRepository $categoriesRepository, CategoryFormValidator $categoryFormValidator)
	{
		$this->categoriesRepository  = $categoriesRepository;
		$this->categoryFormValidator = $categoryFormValidator;
	}

	/**
	 * Display a listing of the resource.
	 * GET /categories
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = $this->categoriesRepository->getPaginated(20);

		return $this->view('Admin::categories.index', compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /categories/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /categories
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->categoryFormValidator->validate( \Input::all() );

		$category = $this->categoriesRepository->getNew( \Input::all() );

		if ( ! $category->save() ) return Redirect::back()->withInput()->withErrors([]);

		return \Redirect::back()->with('success', 'Se creo nueva categoría');
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /categories/{id}/edit
	 *
	 * @param  int  $categoryId
	 * @return Response
	 */
	public function edit($categoryId)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /categories/{id}
	 *
	 * @param  int  $categoryId
	 * @return Response
	 */
	public function update($categoryId)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /categories/{id}
	 *
	 * @param  int  $categoryId
	 * @return Response
	 */
	public function destroy($categoryId)
	{
		$category = $this->categoriesRepository->getById($categoryId);

		$category->delete();

		return \Redirect::back()->with('categories.destroy', $category->id);
	}

	/**
	 * Restore the specified resource from storage.
	 * POST /admin/beneficios/{id}
	 *
	 * @param  int  $categoryId
	 * @return Response
	 */
	public function restore($categoryId)
	{
		$this->categoriesRepository->restore($categoryId);

		return \Redirect::back()->with('success', 'Se restablecio la categoría');
	}

}
