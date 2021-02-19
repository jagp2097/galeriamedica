<?php

use Illuminate\Database\Seeder;

class UsersTableSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(galeriamedica\User::class, 50)->create();
    }
}
