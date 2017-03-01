<?php

namespace Tests\Browser\inicio;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use App\User as User;
class normalTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group inicio
     * @return void
     */
    public function testInicioCorrecto()
    {
        $this->browse(function ($browser)  {
            $user = User::find(1);
            $browser->loginAs($user)
                ->visit('/home')
                ->assertSeeLink('Factura N3');
        });;
    }
}
