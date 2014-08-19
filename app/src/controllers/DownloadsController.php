<?php

namespace Soluciones\Controllers;

use Soluciones\Repositories\BenefitsRepository;
use Soluciones\Models\User;

class DownloadsController extends BaseController {

	/**
	 * @var \Soluciones\Repositories\BenefitsRepository
	 */
	private $repository;

	function __construct(BenefitsRepository $repository)
	{
		$this->repository = $repository;
	}

	/**
	 * Display a listing of the resource.
	 * GET /beneficios/descargas
	 *
	 * @return Response
	 */
	public function index()
	{
		$benefits = $this->repository->getByUser( \Auth::user() );

		return $this->view('downloads.index', compact('benefits'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /downloads/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /downloads
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /downloads/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /downloads/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /downloads/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
