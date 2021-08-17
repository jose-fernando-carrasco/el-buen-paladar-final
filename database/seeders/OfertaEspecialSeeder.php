<?php

namespace Database\Seeders;

use App\Models\Gerente;
use App\Models\OfertaEspecial;
use App\Models\User;
use Illuminate\Database\Seeder;

class OfertaEspecialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        OfertaEspecial::create([
            'nombre' => 'Especial Fin de Semana',
            'estado' => '1',
            'fecha_inicio' => date('Y-m-d') ,
            'fecha_final' => date('Y-m-d'),
            'user_id' => User::all()->random()->id
        ]);
        OfertaEspecial::create([
            'nombre' => 'Especial Cumpleaños',
            'estado' => '0',
            'fecha_inicio' => date('Y-m-d') ,
            'fecha_final' => date('Y-m-d'),
            'user_id' => User::all()->random()->id
        ]);
        OfertaEspecial::create([
            'nombre' => 'Especial Semana Santa',
            'estado' => '0',
            'fecha_inicio' => date('Y-m-d') ,
            'fecha_final' => date('Y-m-d'),
            'user_id' => User::all()->random()->id
        ]);
        OfertaEspecial::create([
            'nombre' => 'Especial Navidad',
            'estado' => '0',
            'fecha_inicio' => date('Y-m-d') ,
            'fecha_final' => date('Y-m-d'),
            'user_id' => User::all()->random()->id
        ]);
        OfertaEspecial::create([
            'nombre' => 'Especial de Invierno',
            'estado' => '0',
            'fecha_inicio' => date('Y-m-d') ,
            'fecha_final' => date('Y-m-d'),
            'user_id' => User::all()->random()->id
        ]);
    }
}
