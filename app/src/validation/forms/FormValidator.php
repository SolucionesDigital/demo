<?php

namespace Soluciones\Validation\Forms;

use Illuminate\Validation\Factory as Validator;
use Soluciones\Exceptions\FormValidationException;


abstract class FormValidator {

	/**
	 * @var Validator
	 */
	protected $validator;

	/**
	 * @var Validator
	 */
	protected $validation;

	/**
	 * @param Validator $validator
	 */
	function __construct(Validator $validator)
	{
		$this->validator = $validator;
	}

	/**
	 * @param array $formData
	 *
	 * @return bool
	 * @throws FormValidationException
	 */
	public function validate(array $formData)
	{
		$this->validation = $this->validator->make( $formData, $this->getValidationRules() );

		if ($this->validation->fails())
		{
			throw new FormValidationException('Validation Failed', $this->getValidationErrors());
		}

		return true;
	}

	/**
	 * @return mixed
	 */
	protected function getValidationRules()
	{
		return $this->rules;
	}

	/**
	 * @return mixed
	 */
	protected function getValidationErrors()
	{
		return $this->validation->errors();
	}

}
