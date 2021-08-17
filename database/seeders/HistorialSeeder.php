<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Cuenta;
use App\Models\Historial;
use Illuminate\Database\Seeder;

class HistorialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clientes = Cliente::all();

        foreach ($clientes as $cliente) {

            Historial::create([
                'nombre' => $cliente->name,
                'fecha' => date('Y-m-d'),
                'descripcion' => 'Ultima novedad',
                'cuenta_id' => Cuenta::all()->random()->id
            ]);
        }
    }
}
