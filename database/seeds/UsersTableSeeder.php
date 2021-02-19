<?php

use Illuminate\Database\Seeder;
use galeriamedica\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user = User::create([
            'name' => 'Demo Proyecto',
            'username' => 'demo-proyecto',
            'email' => 'demo@example.com',
            'password' => bcrypt('admin'),
            'type' => 'Admin'
        ]);

        $user = User::create([
            'name' => 'Prueba Proyecto',
            'username' => 'prueba-proyecto',
            'email' => 'prueba@example.com',
            'password' => bcrypt('prueba20'),
            'type' => 'Usuario'
        ]);
    }
}
