<?php

namespace Database\Seeders;

use App\Models\TipoAlimento;
use Illuminate\Database\Seeder;

class TipoAlimentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoAlimento::create([
            'nombre' => 'Plato Fuerte'
        ]);
        TipoAlimento::create([
            'nombre' => 'Bebida'
        ]);
        TipoAlimento::create([
            'nombre' => 'Ensalada'
        ]);
        TipoAlimento::create([
            'nombre' => 'Postre'
        ]);
        TipoAlimento::create([
            'nombre' => 'Sopa'
        ]);

    }
}
