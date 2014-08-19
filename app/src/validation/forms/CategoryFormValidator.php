<?php

namespace Soluciones\Validation\Forms;

class CategoryFormValidator extends FormValidator {

	protected $rules = [
		'name' => 'required|unique:categories',
	];

} 