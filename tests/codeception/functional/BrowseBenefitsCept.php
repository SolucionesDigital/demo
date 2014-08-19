<?php
$I = new FunctionalTester($scenario);

$I->am('a member');
$I->wantTo('want to browse my saved benefits');

$I->amLoggedAs(['username' => 'york', 'password' => 'password']);

$I->amOnPage("/beneficios/descargas");
$I->see('Descargas', 'h2');
