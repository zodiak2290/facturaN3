<?php

namespace Tests\Browser\login;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Faker\Factory as Faker;
use App\User as User;
class RegisterTest extends DuskTestCase
{

    public function __construct(){
        $faker= Faker::create();
        $this->email = $faker->unique()->safeEmail;
        $this->name = $faker->firstName;
        
    }

    /**
     * Dar click en boton si haber ingresado nada.
     * @group register
     * @return void
     */
    public function testRegistrarmeSinDatos(){
        $this->browse(function ($browser)  {
            $browser->visit('/registrar')
                    ->press('Registrarme')
                    ->assertPathIs('/registrar'); 
        });       
    }

    /**
     * Ingresar contraseñas equivocadas.
     * @group register
     * @return void
     */
    
    public function testRegistrarmePasswordDiferentes(){
        
        //El campo confirmación de password no coincide.
        $this->browse(function ($browser)  {
            
            $browser->visit('/registrar')
                    ->type('name', $this->name)
                    ->type('email', $this->email)
                    ->type('password', 'secret')
                    ->type('password_confirmation', 'secreto')
                    ->press('Registrarme')
                    ->assertSee('El campo confirmación de password no coincide.');

        });
    }

    /**
     * Registrarse correctamente.
     * @group register
     * @group good
     * @return void
     */
    
    public function testRegistrarme(){
        $this->browse(function ($browser)  {
            $browser->visit('/registrar')
                    ->type('name', $this->name)
                    ->type('email', $this->email)
                    ->type('password', 'secret')
                    ->type('password_confirmation', 'secret')
                    ->press('Registrarme')
                    ->assertPathIs('/home');
        });
    }

    /**
     * Registrarse correctamente.
     * @group register
     * @group good
     * @return void
     */
    
    public function testRegistrarmeAfterSuccess(){
        $this->browse(function ($browser)  {
            $user = User::where('email', $this->email)->first();
            //$user = User::find(1);
            $browser->loginAs($user)
                ->visit('/home')
                ->assertSeeLink('Factura N3');
        });
    }

}






