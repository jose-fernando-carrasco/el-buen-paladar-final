<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Cuenta;
use App\Models\Factura;
use App\Models\User;
use Illuminate\Database\Seeder;


class FacturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cuentas = Cuenta::all();
        foreach ($cuentas as $cuenta) {

            Factura::create([
                'fecha' => date('Y-m-d'),
                'monto' => rand(50, 200),
                'nit' => '456',
                'cuenta_id'=> $cuenta->id,
                'user_id' => User::all()->random()->id

            ]);
        }

    }
}
