<?php

namespace Soluciones\Validation\Forms;

class ProfileFormValidator extends FormValidator {

	protected $rules = [
		'username' => 'required|exists:users,username',
		'email'    => 'email',
		'first'    => 'alpha_dash',
		'last'     => 'alpha_dash',
		'nss'      => 'numeric',
	];
	
} 