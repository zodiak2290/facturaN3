<?php

namespace Tests\Browser\login;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginFailTets extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group loginFail
     * @return void
     */

    public function testUsuarioNoExiste()
    {
        $this->browse(function ($browser)  {
            $browser->visit('/')
                    ->type('email', 'tayl@laravel.com')
                    ->type('password', 'secret')
                    ->press('Ingresar');
            $browser->assertSee('Estas credenciales no coinciden con nuestros registros.');
        });
    }
}