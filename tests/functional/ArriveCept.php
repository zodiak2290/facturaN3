<?php 
$I = new FunctionalTester($scenario);
$I->am('Soy un usuario');
$I->wantTo('Quiero ver Opcion de ingresar');
$I->wantTo('Quiero ver Opcion de recuperar contraseña');
$I->wantTo('Quiero ver Opcion de registrarme');

$I->amOnPage('/');
$I->see('Ingresar');
$I->see('Olvidaste tu contraseña');
$I->see('Registrarme');
