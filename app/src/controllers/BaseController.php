<?php

namespace Soluciones\Controllers;

use Auth, View;

class BaseController extends \Controller {

	/**
	 * @var string
	 */
	protected $layout = 'layouts.master';

	/**
	 * @var
	 */
	protected $currentUser;

	/**
	 * @var string
	 */
	protected $title = '';

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

}
