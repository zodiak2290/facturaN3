<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTets extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group login
     * @return void
     */
    public function testIngresar()
    {

        $this->browse(function ($browser)  {
            $browser->visit('/')
                    ->type('email', 'taylor@laravel.com')
                    ->type('password', 'secret')
                    ->press('Ingresar')
                    ->assertPathIs('/home');
        });
    }


    public function testLinkRegistro()
    {
        $this->browse(function ($browser)  {
            $this->browser->visit('/')
               ->waitForLink('Registrarme')
               ->clickLink('Registrarme')
               ->assertPathIs('/registrar');
        });
    }
}