<?php

namespace Database\Seeders;

use App\Models\Cuenta;
use App\Models\Pedido;
use App\Models\User;
use DateTime;
use Illuminate\Database\Seeder;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            Pedido::create([
               'fecha' => date('Y-m-d H:i'),
               'estado' => 'Activo',
               'mesa' => 3,
               'user_id' => User::all()->random()->id,

            ]);
            Pedido::create([
                'fecha' => date('Y-m-d H:i'),
                'estado' => 'Activo',
                'mesa' => 4,
                'user_id' => User::all()->random()->id,

             ]);
             Pedido::create([
                'fecha' => date('Y-m-d H:i'),
                'estado' => 'Activo',
                'mesa' => 5,
                'user_id' => User::all()->random()->id,

             ]);
             Pedido::create([
                'fecha' => date('Y-m-d H:i'),
                'estado' => 'Activo',
                'mesa' => 6,
                'user_id' => User::all()->random()->id,

             ]);
             Pedido::create([
                'fecha' => date('Y-m-d H:i'),
                'estado' => 'Llevar',
                'user_id' => User::all()->random()->id,

             ]);
             Pedido::create([
                'fecha' => date('Y-m-d H:i'),
                'estado' => 'Llevar',
                'user_id' => User::all()->random()->id,

             ]);


    }
}
