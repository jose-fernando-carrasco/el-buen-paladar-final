<?php

namespace Database\Seeders;

use App\Models\Mesa;
use App\Models\Pedido;
use App\Models\Reserva;
use Illuminate\Database\Seeder;

class MesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Mesa::create([
            'capacidad' => 4,
            'ubicacion' => 'Esquina derecha',
            'status' => false,

        ]);
        Mesa::create([
            'capacidad' => 5,
            'ubicacion' => 'Superior derecha',
            'status' => false,

        ]);

        Mesa::create([
            'capacidad' => 10,
            'ubicacion' => 'Ventada Entrada',
            'mesaable_id' => 1,
            'mesaable_type' => Pedido::class,
            'status' => false,
        ]);
        Mesa::create([
            'capacidad' => 5,
            'ubicacion' => 'Esquina superior',
            'mesaable_id' => 2,
            'mesaable_type' => Pedido::class,
            'status' => false,
        ]);
        Mesa::create([
            'capacidad' => 6,
            'ubicacion' => 'Fondo Derecha',
            'mesaable_id' => 3,
            'mesaable_type' => Pedido::class,
            'status' => false,
        ]);
        Mesa::create([
            'capacidad' => 8,
            'ubicacion' => 'Centro',
            'mesaable_id' => 4,
            'mesaable_type' => Pedido::class,
            'status' => false,
        ]);
        Mesa::create([
            'capacidad' => 5,
            'ubicacion' => 'Centro izquierda',
            'status' => false,

        ]);
        Mesa::create([
            'capacidad' => 3,
            'ubicacion' => 'Centro derecha',
            'status' => false,

        ]);

    }
}
