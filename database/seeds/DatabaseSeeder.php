<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AccionSeeder::class);
        $this->call(PaisesSeeder::class);
        $this->call(EstadosSeeder::class);
        $this->call(EstadosCFDISeeder::class);
        $this->call(tipoContribuyentesSeeder::class);
        $this->call(tipoDocumentos::class);
        $this->call(EventosSistemaSeed::class);
        $this->call(EstadosFactura::class);
    }
}
