<?php

use Illuminate\Database\Seeder;

class PacientesTableSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(galeriamedica\Paciente::class, 50)->create();
    }
}
