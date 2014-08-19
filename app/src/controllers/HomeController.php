<?php

namespace Soluciones\Controllers;

use Soluciones\Repositories\CategoriesRepository;
use View;

class HomeController extends BaseController {

	function __construct(CategoriesRepository $categoriesRepository)
	{
		$this->categoriesRepository = $categoriesRepository;
	}

	public function index()
	{
		$categories = $this->categoriesRepository->getAll();

		return View::make('home.index', compact('categories'));
	}

}
