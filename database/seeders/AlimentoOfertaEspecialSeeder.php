<?php

namespace Database\Seeders;

use App\Models\OfertaEspecial;
use Illuminate\Database\Seeder;

class AlimentoOfertaEspecialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ofertas_especiales = OfertaEspecial::all();
        foreach ($ofertas_especiales as $oferta) {
            $oferta->alimentos()->attach([
                rand(1, 4),
                rand(5, 9),
                rand(10, 14),
                rand(15, 18),
                rand(20, 23)
        ]);
        }
    }
}
