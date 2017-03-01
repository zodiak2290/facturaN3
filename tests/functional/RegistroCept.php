<?php 
$I = new FunctionalTester($scenario);
$I->am('Soy un usuario');
$I->wantTo('Quiero registrarme');


$I->amOnPage('/registrar');
$I->fillField('email', 'albon_marvel@hotmail.com');
$I->fillField('password', '123456');

$I->click('Register');

//$I->seeCurrentUrlEquals('/home');
$I->see('Se envio un link para validar la cuenta');