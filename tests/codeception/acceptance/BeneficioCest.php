<?php

use \AcceptanceTester;

class BeneficioCest {

    public function _before(AcceptanceTester $I)
    {
	    $I->loginUser($I);
    }

	public function _after(AcceptanceTester $I)
	{
		$I->logoutUser($I);
	}

    // tests
    public function save_benefit(AcceptanceTester $I)
    {
	    $I->amOnPage('/beneficios');
	    $I->click('.add-benefit');
	    $I->waitForElement('#modal-benefit');
	    $I->click('#save-benefit');
	    $I->see('Se guardo el beneficio');
    }

}