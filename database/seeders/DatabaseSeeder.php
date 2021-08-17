<?php

namespace Database\Seeders;

use App\Models\Cuenta;
use App\Models\Reserva;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Storage::deleteDirectory('imagenes');
        Storage::makeDirectory('imagenes');

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);

        
        $this->call(TipoAlimentoSeeder::class);
        $this->call(AlimentoSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(AlimentoMenuSeeder::class);
        $this->call(OfertaEspecialSeeder::class);
        $this->call(AlimentoOfertaEspecialSeeder::class);
        $this->call(PedidoSeeder::class);
        $this->call(AlimentoPedidoSeeder::class);
        $this->call(FacturaSeeder::class);
        $this->call(MesaSeeder::class);
        $this->call(HistorialSeeder::class);

    }
}
