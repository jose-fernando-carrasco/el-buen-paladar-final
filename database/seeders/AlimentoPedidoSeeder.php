<?php

namespace Database\Seeders;

use App\Models\Pedido;
use Illuminate\Database\Seeder;

class AlimentoPedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pedidos = Pedido::all();
        foreach ($pedidos as $pedido) {
            $pedido->alimentos()->attach([
                rand(1, 4) => ['cantidad' => rand(1, 5), 'precio' => rand(10, 30)],
                rand(5, 9) => ['cantidad' => rand(1, 5), 'precio' => rand(10, 30)],
                rand(10, 14) => ['cantidad' => rand(1, 5), 'precio' => rand(10, 30)],
                rand(15, 18) => ['cantidad' => rand(1, 5), 'precio' => rand(10, 30)],
                rand(20, 23) => ['cantidad' => rand(1, 5), 'precio' => rand(10, 30)],
            ]);
        }
    }
}
