<?php

namespace Soluciones\Validation\Forms;

class BenefitFormValidator extends FormValidator {

	protected $rules = [
		'title'       => 'required',
		'subtitle'    => 'required',
		'content'     => 'required',
		'valid_from'  => 'required|date',
		'valid_to'    => 'required|date'
	];

}
