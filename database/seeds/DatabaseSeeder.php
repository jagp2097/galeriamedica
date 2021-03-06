<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PacientesTableSedder::class);
        $this->call(UsersTableSeeder::class);
        // 'type' => $faker->randomElement(['Admin', 'Usuario']),
    }
}
