<?php

namespace Admin\Controllers;

use Illuminate\Routing\Controller;
use Soluciones\Repositories\BenefitsRepository;
use Soluciones\Repositories\CategoriesRepository;
use Soluciones\Validation\Forms\BenefitFormValidator;
use Admin\Support\Thumbnails\Thumbnail;
use Input, Redirect;

class BenefitsController extends AdminController {

	/**
	 * @var \Soluciones\Repositories\BenefitsRepository
	 */
	private $benefitsRepository;

	/**
	 * @var \Soluciones\Repositories\CategoriesRepository
	 */
	private $categoriesRepository;

	/**
	 * @var \Soluciones\Validation\Forms\BenefitFormValidator
	 */
	private $benefitFormValidator;

	/**
	 * @param BenefitsRepository   $benefitsRepository
	 * @param CategoriesRepository $categoriesRepository
	 * @param BenefitFormValidator $benefitFormValidator
	 */
	function __construct(BenefitsRepository $benefitsRepository,
	                     CategoriesRepository $categoriesRepository,
	                     BenefitFormValidator $benefitFormValidator)
	{
		$this->benefitsRepository   = $benefitsRepository;
		$this->categoriesRepository = $categoriesRepository;
		$this->benefitFormValidator = $benefitFormValidator;
	}

	/**
	 * Display a listing of the resource.
	 * GET /admin/beneficios
	 *
	 * @return Response
	 */
	public function index()
	{
		$benefits = $this->benefitsRepository->getPaginated(20);

		return $this->view('Admin::benefits.index', compact('benefits'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /admin/beneficios/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = $this->categoriesRepository->getAll();

		return \View::make('Admin::benefits.create', compact('categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /admin/beneficios
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->benefitFormValidator->validate( Input::all() );

		$benefit = $this->benefitsRepository->getNew( Input::all() );

		if ( ! $benefit->save() ) return Redirect::back()->withInput()->withErrors([]);

		if ( $file = Input::file('featured_image') )
		{
			$uploads_path = public_path().'/uploads/beneficios/';

			$thumbnail = \App::make('Admin\Support\Thumbnails\Thumbnail')
			                 ->make( $file, $uploads_path, $benefit->id )
			                 ->create([ ['thumbnail', 300, 300] ]);

			$benefit->featured_image = "/uploads/beneficios/{$benefit->id}-thumbnail.jpg";

			$benefit->save();
		}

		if ( $category = Input::get('category') ) $benefit->categories()->attach($category);

		return Redirect::route('admin.beneficios.edit', [$benefit->id])->with('success', 'Se guardo el beneficio');
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /admin/beneficios/{id}/edit
	 *
	 * @param  int  $benefitId
	 * @return Response
	 */
	public function edit($benefitId)
	{
		return \View::make('Admin::benefits.edit', [
			'benefit'    => $this->benefitsRepository->getById($benefitId),
			'categories' => $this->categoriesRepository->getAll(),
		]);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /admin/beneficios/{id}
	 *
	 * @param  int  $benefitId
	 * @return Response
	 */
	public function update($benefitId)
	{
		$this->benefitFormValidator->validate( Input::all() );

		$benefit = $this->benefitsRepository->getById($benefitId);

		if ( ! $benefit->fill( Input::all() )->save() )
		{
			return Redirect::back()->withInput()->withErrors([]);
		}

		if ( $file = Input::file('featured_image') )
		{
			$uploads_path = public_path().'/uploads/beneficios/';

			$thumbnail = \App::make('Admin\Support\Thumbnails\Thumbnail')
			                 ->make( $file, $uploads_path, $benefit->id )
			                 ->create([ ['thumbnail', 300, 300] ]);

			$benefit->featured_image = "/uploads/beneficios/{$benefit->id}-thumbnail.jpg";

			$benefit->save();
		}

		if ( $category = Input::get('category') ) $benefit->categories()->attach($category);

		return Redirect::back()->with('success', 'Se actualizo el beneficio');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /admin/beneficios/{id}
	 *
	 * @param  int  $benefitId
	 * @return Response
	 */
	public function destroy($benefitId)
	{
		$beneficio = $this->benefitsRepository->getById($benefitId);

		$beneficio->delete();

		return Redirect::back()->with('benefits.destroy', $beneficio->id);
	}

	/**
	 * Restore the specified resource from storage.
	 * POST /admin/beneficios/{id}
	 *
	 * @param  int  $benefitId
	 * @return Response
	 */
	public function restore($benefitId)
	{
		$this->benefitsRepository->restore($benefitId);

		return Redirect::back()->with('success', 'Se restablecio el beneficio');
	}

}
