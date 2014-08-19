<?php 
$I = new FunctionalTester($scenario);

$I->am('a member');
$I->wantTo('login to the site');

$I->amOnPage('/');
$I->click('Ingresar');
$I->seeCurrentUrlEquals('/login');

$I->fillField('username', 'york');
$I->fillField('password', 'password');
$I->click('Ingresar');

$I->seeCurrentUrlEquals('/beneficios');
$I->see('Bienvenido a IMSS');

