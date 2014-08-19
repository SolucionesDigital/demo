<?php

namespace Soluciones\Controllers;

use Soluciones\Exceptions\FromValidationException;
use Soluciones\Validation\Forms\LoginFormValidator;
use Input, View, Auth;

class SessionsController extends BaseController {

	/**
	 * @var \Soluciones\Validation\Forms\LoginFormValidator
	 */
	protected $loginForm;

	/**
	 * @param LoginFormValidator $loginForm
	 */
	function __construct(LoginFormValidator $loginForm)
	{
		$this->loginForm = $loginForm;
	}

	/**
	 * Display a listing of the resource.
	 * GET /login
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('login');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /login
	 *
	 * @return Response
	 */
	public function store()
	{
		$formData = Input::only(['username', 'password']);

		$this->loginForm->validate($formData);

		if ( ! Auth::attempt($formData, Input::has('remember')) )
		{
			return \Redirect::route('session.create')->withInput()->withErrors(['La contraseña es incorrecta']);
		}

		return \Redirect::intended('beneficios')->with('success', 'Bienvenido a IMSS');
	}

	/**
	 * Remove the specified resource from storage.
	 * GET|POST /logout
	 *
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();

		return \Redirect::route('home');
	}

}
