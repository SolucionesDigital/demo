<?php

namespace Soluciones\Controllers;

class ContactController extends BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /contact
	 *
	 * @return Response
	 */
	public function index()
	{
		return $this->view('contact');
	}

}
