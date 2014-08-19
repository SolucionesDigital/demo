<?php
namespace Codeception\Module;

use \AcceptanceTester;
// here you can define custom actions
// all public methods declared in helper class will be available in $I

class AcceptanceHelper extends \Codeception\Module {

	public function loginUser(AcceptanceTester $I)
	{
		$this->login($I, 'york', 'password');
	}

	// And this function lets me login a specific user if I need someone else
	public function login(AcceptanceTester $I, $username, $password)
	{
		$I->amOnPage('/login');
		$I->fillField('username', $username);
		$I->fillField('password', $password);
		$I->click('Ingresar');
		$I->seeCurrentUrlEquals('/beneficios');
	}

	public function logoutUser(AcceptanceTester $I)
	{
		$I->amOnPage('/logout');
		$I->seeCurrentUrlEquals('/');
	}

}
