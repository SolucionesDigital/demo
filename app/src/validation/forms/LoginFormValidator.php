<?php

namespace Soluciones\Validation\Forms;

class LoginFormValidator extends FormValidator {

	protected $rules = [
		'username' => 'required|exists:users,username',
		'password' => 'required'
	];

} 