<?php

namespace Database\Seeders;

use App\Models\Gerente;
use App\Models\Cajero;
use App\Models\Cliente;
use App\Models\User;


use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Jaime Soto',
            'email' => 'gerente@correo.com',
            'password' => bcrypt('1234'),
        ])->assignRole('Gerente');
        User::create([
            'name' => 'Jhon Tolin',
            'email' => 'gerente_2@correo.com',
            'password' => bcrypt('1234'),
        ])->assignRole('Gerente');
        User::create([
            'name' => 'Jose Oña',
            'email' => 'cajero_1@correo.com',
            'password' => bcrypt('1234'),
        ])->assignRole('Cajero');
        User::create([
            'name' => 'Luis Barba',
            'email' => 'cajero_2@correo.com',
            'password' => bcrypt('1234'),
        ])->assignRole('Cajero');
        User::create([
            'name' => 'Fulano',
            'email' => 'cliente_1@correo.com',
            'password' => bcrypt('1234'),
        ]);
        User::create([
            'name' => 'Sutano',
            'email' => 'cliente_2@correo.com',
            'password' => bcrypt('1234'),
        ]);


    }
}
