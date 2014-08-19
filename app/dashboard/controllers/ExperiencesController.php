<?php

namespace Admin\Controllers;

use Soluciones\Repositories\ExperiencesRepository;
use Soluciones\Validation\Forms\ExperienceFormValidator;
use Input, Redirect, View;

class ExperiencesController extends AdminController {

	/**
	 * @var \Soluciones\Repositories\ExperiencesRepository
	 */
	private $experiencesRepository;

	/**
	 * @var \Soluciones\Validation\Forms\ExperienceFormValidator
	 */
	private $experienceFormValidator;

	/**
	 * @param ExperiencesRepository   $experiencesRepository
	 * @param ExperienceFormValidator $experienceFormValidator
	 */
	function __construct(ExperiencesRepository $experiencesRepository, ExperienceFormValidator $experienceFormValidator)
	{
		$this->experiencesRepository   = $experiencesRepository;
		$this->experienceFormValidator = $experienceFormValidator;
	}

	/**
	 * Display a listing of the resource.
	 * GET /admin/experiencias
	 *
	 * @return Response
	 */
	public function index()
	{
		$experiences = $this->experiencesRepository->getPaginated(20);

		return $this->view('Admin::experiences.index', compact('experiences'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /admin/experiencias/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return \View::make('Admin::experiences.create');
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /admin/experiencias/{id}/edit
	 *
	 * @param  int  $experienceId
	 * @return Response
	 */
	public function edit($experienceId)
	{
		$experience = $this->experiencesRepository->getById($experienceId);

		return \View::make('Admin::experiences.edit', compact('experience'));
	}


	/**
	 * Store a newly created resource in storage.
	 * POST /admin/experiencias
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->experienceFormValidator->validate( Input::all() );

		$experience = $this->experiencesRepository->getNew( Input::all() );

		if ( ! $experience->save() ) return Redirect::back()->withInput()->withErrors([]);

		if ( $file = Input::file('featured_image') )
		{
			$uploads_path = public_path().'/uploads/experiencias/';

			$thumbnail = \App::make('Admin\Support\Thumbnails\Thumbnail')
			                 ->make( $file, $uploads_path, $experience->id )
			                 ->create([ ['thumbnail', 300, 300] ]);

			$experience->featured_image = "/uploads/experiencias/{$experience->id}-thumbnail.jpg";

			$experience->save();
		}

		return Redirect::route('admin.experiencias.edit', [$experience->id])->with('success', 'Se guardo la experiencia');
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /admin/experiencias/{id}
	 *
	 * @param  int  $experienceId
	 * @return Response
	 */
	public function update($experienceId)
	{
		$this->experienceFormValidator->validate( Input::all() );

		$experience = $this->experiencesRepository->getById($experienceId);

		if ( ! $experience->fill( Input::all() )->save() )
		{
			return Redirect::back()->withInput()->withErrors([]);
		}

		if ( $file = Input::file('featured_image') )
		{
			$uploads_path = public_path().'/uploads/experiencias/';

			$thumbnail = \App::make('Admin\Support\Thumbnails\Thumbnail')
			                 ->make( $file, $uploads_path, $experience->id )
			                 ->create([ ['thumbnail', 300, 300] ]);

			$experience->featured_image = "/uploads/experiencias/{$experience->id}-thumbnail.jpg";

			$experience->save();
		}

		return Redirect::back()->with('success', 'Se actualizo la experiencias');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /admin/experiencias/{id}
	 *
	 * @param  int  $experienceId
	 * @return Response
	 */
	public function destroy($experienceId)
	{
		$experience = $this->experiencesRepository->getById($experienceId);

		$experience->delete();

		return Redirect::back()->with('experiences.destroy', $experience->id);
	}

	/**
	 * Restore the specified resource from storage.
	 * POST /admin/experiencias/{id}
	 *
	 * @param  int  $experienceId
	 * @return Response
	 */
	public function restore($experienceId)
	{
		$this->experiencesRepository->restore($experienceId);

		return Redirect::back()->with('success', 'Se restablecio la experiencia');
	}

}
