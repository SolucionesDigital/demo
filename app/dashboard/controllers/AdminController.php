<?php

namespace Admin\Controllers;

use Auth, View;

class AdminController extends \Controller {

	/**
	 * @var string
	 */
	protected $layout = 'Admin::layouts.master';

	/**
	 * @var string
	 */
	protected $title = '';

	/**
	 * @var \Soluciones\Models\User
	 */
	protected $currentUser;

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout)) $this->layout = View::make($this->layout);

		$this->currentUser = Auth::user();

		View::share('currentUser', $this->currentUser);
	}

	/**
	 * @param       $path
	 * @param array $data
	 */
	protected function view($path, $data = [])
	{
		$this->layout->title   = $this->title;
		$this->layout->content = View::make($path, $data);
	}

	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function index()
	{
		return $this->view('Admin::home.index');
	}

}
