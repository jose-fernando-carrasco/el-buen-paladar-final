<?php

namespace Database\Seeders;

use App\Models\Gerente;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
            'nombre' => 'Menu1',
            'dia' => 'Lunes',
            'estado' => '1',
            'user_id' => User::all()->random()->id
        ]);
        Menu::create([
            'nombre' => 'Menu2',
            'dia' => 'Martes',
            'estado' => '0',
            'user_id' => User::all()->random()->id
        ]);
        Menu::create([
            'nombre' => 'Menu3',
            'dia' => 'Miercoles',
            'estado' => '0',
            'user_id' => User::all()->random()->id
        ]);
        Menu::create([
            'nombre' => 'Menu4',
            'dia' => 'Jueves',
            'estado' => '0',
            'user_id' => User::all()->random()->id
        ]);
        Menu::create([
            'nombre' => 'Menu5',
            'dia' => 'Viernes',
            'estado' => '0',
            'user_id' => User::all()->random()->id
        ]);
        Menu::create([
            'nombre' => 'Menu6',
            'dia' => 'Sabado',
            'estado' => '0',
            'user_id' => User::all()->random()->id
        ]);
        Menu::create([
            'nombre' => 'Menu7',
            'dia' => 'Domingo',
            'estado' => '0',
            'user_id' => User::all()->random()->id
        ]);

    }
}
