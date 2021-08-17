<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class AlimentoMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = Menu::all();
        foreach ($menus as $menu) {
            $menu->alimentos()->attach([
                rand(1, 4) => ['cantidad' => rand(10, 20) ],
                rand(5, 9) => ['cantidad' => rand(10, 20) ],
                rand(10, 14) => ['cantidad' => rand(10, 20) ],
                rand(15, 18) => ['cantidad' => rand(10, 20) ],
                rand(20, 23) => ['cantidad' => rand(10, 20) ]
            ]);
        }
    }
}
