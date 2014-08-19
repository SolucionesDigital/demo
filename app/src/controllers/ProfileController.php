<?php

namespace Soluciones\Controllers;

use Illuminate\Support\Facades\Redirect;
use Soluciones\Models\ProfileForm;
use Soluciones\Repositories\ProfileFormRepository;
use Soluciones\Validation\Forms\ProfileFormValidator;

class ProfileController extends BaseController {

	/**
	 * @var \Soluciones\Validation\Forms\ProfileFormValidator
	 */
	private $profileFormValidator;

	/**
	 * @var \Soluciones\Repositories\ProfileFormRepository
	 */
	private $repository;
	/**
	 * @var ProfileForm
	 */
	private $profileForm;


	/**
	 * @param ProfileFormRepository $repository
	 * @param ProfileFormValidator  $profileFormValidator
	 * @param ProfileForm           $profileForm
	 */
	function __construct(ProfileFormRepository $repository, ProfileFormValidator $profileFormValidator, ProfileForm $profileForm)
	{
		$this->repository  = $repository;
		$this->validator   = $profileFormValidator;
		$this->profileForm = $profileForm;
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /perfil/editar
	 *
	 * @return Response
	 */
	public function edit()
	{
		$profile = $this->repository->getById( \Auth::id() );

		return $this->view('profiles.edit', compact('profile'));
	}

	/**
	 * Update the specified resource in storage.
	 * PATCH /perfil/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$profile = $this->repository->getById($id);

		$this->validator->validate(\Input::all());

		$this->profileForm->update(\Input::all());

		return Redirect::back()->with('success', 'Se actualizarón tus datos');
	}

}
