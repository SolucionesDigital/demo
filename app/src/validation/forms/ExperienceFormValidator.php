<?php

namespace Soluciones\Validation\Forms;

class ExperienceFormValidator extends FormValidator {

	protected $rules = [
		'title'   => 'required',
		'content' => 'required'
	];

}