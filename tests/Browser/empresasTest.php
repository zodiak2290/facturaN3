<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User as User;
class empresasTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group empresa
     * @return void
     */
    public function testExample()
    {
        $this->browse(function ($browser) {
            $user = User::find(1);
            $browser->loginAs($user)
                ->visit('/empresas/create')
                ->type('rfc', "VAAM130923H30")
                ->type('regimen_fiscal', "No aplica")
                ->type('drs', "Alberto MARTINEZ")
                ->select('contribuyente')
                ->select('estado')
                ->type('calle', "Aldama")
                ->type('nume', "123")
                ->type('numi', "12")
                ->type('colonia', "Centro")
                ->type('localidad', "Centro")
                ->type('municipio', "Centro")
                 ->type('cp', "71244")
                ->click('#registrar')
                ->assertPathIs('/home');
        });
    }
}
