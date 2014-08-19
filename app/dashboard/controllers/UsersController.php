<?php

namespace Admin\Controllers;

use Soluciones\Repositories\UsersRepository;

class UsersController extends AdminController {

	/**
	 * @var \Soluciones\Repositories\UsersRepository
	 */
	private $userRepository;

	/**
	 * @param UsersRepository $userRepository
	 */
	function __construct(UsersRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}


	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = $this->userRepository->getPaginated();

		return $this->view('Admin::users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->view('Admin::users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
	 *
	 * @param  int  $userId
	 * @return Response
	 */
	public function edit($userId)
	{
		$user = $this->userRepository->getById($userId);

		return $this->view('Admin::users.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/{id}
	 *
	 * @param  int  $userId
	 * @return Response
	 */
	public function update($userId)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int  $userId
	 * @return Response
	 */
	public function destroy($userId)
	{
		$user = $this->userRepository->getById($userId);

		$user->delete();

		return \Redirect::back()->with('users.destroy', $user->id);
	}

	/**
	 * Restore the specified resource from storage.
	 * POST /admin/users/{id}
	 *
	 * @param  int  $userId
	 * @return Response
	 */
	public function restore($userId)
	{
		$this->userRepository->restore($userId);

		return \Redirect::back()->with('success', 'Se restablecio el usuario');
	}

}
