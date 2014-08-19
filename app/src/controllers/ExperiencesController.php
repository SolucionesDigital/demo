<?php

namespace Soluciones\Controllers;

use Soluciones\Repositories\ExperiencesRepository;

class ExperiencesController extends BaseController {

	/**
	 * @var \Soluciones\Repositories\ExperiencesRepository
	 */
	private $repository;

	/**
	 * @param ExperiencesRepository $repository
	 */
	function __construct(ExperiencesRepository $repository)
	{
		$this->repository = $repository;
	}


	/**
	 * Display a listing of the resource.
	 * GET /experience
	 *
	 * @return Response
	 */
	public function index()
	{
		$experiences = $this->repository->getPaginated(20);

		return $this->view('experiences.index', compact('experiences'));
	}

	/**
	 * Display the specified resource.
	 * GET /experience/{slug}
	 *
	 * @param  string  $slug
	 * @return Response
	 */
	public function show($slug)
	{
		$experience = $this->repository->getBySlug($slug);

		return $this->view('experiences.show', compact('experience'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /experience/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /experience
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /experience/{id}/edit
	 *
	 * @param  int  $experienceId
	 * @return Response
	 */
	public function edit($experienceId)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /experience/{id}
	 *
	 * @param  int  $experienceId
	 * @return Response
	 */
	public function update($experienceId)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /experience/{id}
	 *
	 * @param  int  $experienceId
	 * @return Response
	 */
	public function destroy($experienceId)
	{
		//
	}

}
