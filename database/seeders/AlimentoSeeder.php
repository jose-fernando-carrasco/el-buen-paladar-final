<?php

namespace Database\Seeders;

use App\Models\Bebida;
use App\Models\Ensalada;
use App\Models\PlatoFuerte;
use App\Models\Postre;
use App\Models\Sopa;
use App\Models\TipoAlimento;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;



class AlimentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        Sopa::create([
            'nombre' => 'Sopa de Mani',
            'imagen' => 'imagenes/' . $faker->image('public/storage/imagenes', 640, 480, null, false),
            'descripcion' => 'El plato mas delicioso que puedas probar, hecho con las manos de los mejores chefs del pais
                            garantizando un sabor espectacular que te hara volver una y otra vez, !Los esperamos!',
            'precio' => rand(10,60),
            'tipo_alimento_id' => 5
        ]);
        Sopa::create([
            'nombre' => 'Sopa de Zapallo',
            'imagen' => 'imagenes/' . $faker->image('public/storage/imagenes', 640, 480, null, false),
            'descripcion' => 'El plato mas delicioso que puedas probar, hecho con las manos de los mejores chefs del pais
                            garantizando un sabor espectacular que te hara volver una y otra vez, !Los esperamos!',
            'precio' => rand(10,60),
            'tipo_alimento_id' => 5
        ]);
        Sopa::create([
            'nombre' => 'Sopa de Fideo',
            'imagen' => 'imagenes/' . $faker->image('public/storage/imagenes', 640, 480, null, false),
            'descripcion' => 'El plato mas delicioso que puedas probar, hecho con las manos de los mejores chefs del pais
                            garantizando un sabor espectacular que te hara volver una y otra vez, !Los esperamos!',
            'precio' => rand(10,60),
            'tipo_alimento_id' => 5
        ]);
        Sopa::create([
            'nombre' => 'Sopa de Verduaras',
            'imagen' => 'imagenes/' . $faker->image('public/storage/imagenes', 640, 480, null, false),
            'descripcion' => 'El plato mas delicioso que puedas probar, hecho con las manos de los mejores chefs del pais
                            garantizando un sabor espectacular que te hara volver una y otra vez, !Los esperamos!',
            'precio' => rand(10,60),
            'tipo_alimento_id' => 5
        ]);
        PlatoFuerte::create([
            'nombre' => 'Milaneza',
            'imagen' => 'imagenes/' . $faker->image('public/storage/imagenes', 640, 480, null, false),
            'descripcion' => 'El plato mas delicioso que puedas probar, hecho con las manos de los mejores chefs del pais
                            garantizando un sabor espectacular que te hara volver una y otra vez, !Los esperamos!',
            'precio' => rand(10,60),
            'tipo_alimento_id' => 1
        ]);
        PlatoFuerte::create([
            'nombre' => 'Chando al Horno',
            'imagen' => 'imagenes/' . $faker->image('public/storage/imagenes', 640, 480, null, false),
            'descripcion' => 'El plato mas delicioso que puedas probar, hecho con las manos de los mejores chefs del pais
                            garantizando un sabor espectacular que te hara volver una y otra vez, !Los esperamos!',
            'precio' => rand(10,60),
            'tipo_alimento_id' => 1
        ]);
        PlatoFuerte::create([
            'nombre' => 'Aji de Lengua',
            'imagen' => 'imagenes/' . $faker->image('public/storage/imagenes', 640, 480, null, false),
            'descripcion' => 'El plato mas delicioso que puedas probar, hecho con las manos de los mejores chefs del pais
                            garantizando un sabor espectacular que te hara volver una y otra vez, !Los esperamos!',
            'precio' => rand(10,60),
            'tipo_alimento_id' => 1
        ]);
        PlatoFuerte::create([
            'nombre' => 'Levanta Muerto',
            'imagen' => 'imagenes/' . $faker->image('public/storage/imagenes', 640, 480, null, false),
            'descripcion' => 'El plato mas delicioso que puedas probar, hecho con las manos de los mejores chefs del pais
                            garantizando un sabor espectacular que te hara volver una y otra vez, !Los esperamos!',
            'precio' => rand(10,60),
            'tipo_alimento_id' => 1
        ]);
        PlatoFuerte::create([
            'nombre' => 'Churrasco',
            'imagen' => 'imagenes/' . $faker->image('public/storage/imagenes', 640, 480, null, false),
            'descripcion' => 'El plato mas delicioso que puedas probar, hecho con las manos de los mejores chefs del pais
                            garantizando un sabor espectacular que te hara volver una y otra vez, !Los esperamos!',
            'precio' => rand(10,60),
            'tipo_alimento_id' => 1
        ]);
        Bebida::create([
            'nombre' => 'Coca Cola 2L',
            'imagen' => 'imagenes/' . $faker->image('public/storage/imagenes', 640, 480, null, false),
            'descripcion' => 'El plato mas delicioso que puedas probar, hecho con las manos de los mejores chefs del pais
                            garantizando un sabor espectacular que te hara volver una y otra vez, !Los esperamos!',
            'precio' => rand(10,60),
            'tipo_alimento_id' => 2
        ]);
        Bebida::create([
            'nombre' => 'Fanta 2L',
            'imagen' => 'imagenes/' . $faker->image('public/storage/imagenes', 640, 480, null, false),
            'descripcion' => 'El plato mas delicioso que puedas probar, hecho con las manos de los mejores chefs del pais
                            garantizando un sabor espectacular que te hara volver una y otra vez, !Los esperamos!',
            'precio' => rand(10,60),
            'tipo_alimento_id' => 2
        ]);
        Bebida::create([
            'nombre' => 'Agua Mineral 2L',
            'imagen' => 'imagenes/' . $faker->image('public/storage/imagenes', 640, 480, null, false),
            'descripcion' => 'El plato mas delicioso que puedas probar, hecho con las manos de los mejores chefs del pais
                            garantizando un sabor espectacular que te hara volver una y otra vez, !Los esperamos!',
            'precio' => rand(10,60),
            'tipo_alimento_id' => 2
        ]);
        Bebida::create([
            'nombre' => 'Chicha en Jarra',
            'imagen' => 'imagenes/' . $faker->image('public/storage/imagenes', 640, 480, null, false),
            'descripcion' => 'El plato mas delicioso que puedas probar, hecho con las manos de los mejores chefs del pais
                            garantizando un sabor espectacular que te hara volver una y otra vez, !Los esperamos!',
            'precio' => rand(10,60),
            'tipo_alimento_id' => 2
        ]);
        Bebida::create([
            'nombre' => 'Jugo de frutas',
            'imagen' => 'imagenes/' . $faker->image('public/storage/imagenes', 640, 480, null, false),
            'descripcion' => 'El plato mas delicioso que puedas probar, hecho con las manos de los mejores chefs del pais
                            garantizando un sabor espectacular que te hara volver una y otra vez, !Los esperamos!',
            'precio' => rand(10,60),
            'tipo_alimento_id' => 2
        ]);
        Ensalada::create([
            'nombre' => 'Ensalada de Brocoli',
            'imagen' => 'imagenes/' . $faker->image('public/storage/imagenes', 640, 480, null, false),
            'descripcion' => 'El plato mas delicioso que puedas probar, hecho con las manos de los mejores chefs del pais
                            garantizando un sabor espectacular que te hara volver una y otra vez, !Los esperamos!',
            'precio' => rand(10,60),
            'tipo_alimento_id' => 3
        ]);
        Ensalada::create([
            'nombre' => 'Ensalada de Frejol',
            'imagen' => 'imagenes/' . $faker->image('public/storage/imagenes', 640, 480, null, false),
            'descripcion' => 'El plato mas delicioso que puedas probar, hecho con las manos de los mejores chefs del pais
                            garantizando un sabor espectacular que te hara volver una y otra vez, !Los esperamos!',
            'precio' => rand(10,60),
            'tipo_alimento_id' => 3
        ]);
        Ensalada::create([
            'nombre' => 'Ensalada Pepino',
            'imagen' => 'imagenes/' . $faker->image('public/storage/imagenes', 640, 480, null, false),
            'descripcion' => 'El plato mas delicioso que puedas probar, hecho con las manos de los mejores chefs del pais
                            garantizando un sabor espectacular que te hara volver una y otra vez, !Los esperamos!',
            'precio' => rand(10,60),
            'tipo_alimento_id' => 3
        ]);
        Ensalada::create([
            'nombre' => 'Ensalada Rusa',
            'imagen' => 'imagenes/' . $faker->image('public/storage/imagenes', 640, 480, null, false),
            'descripcion' => 'El plato mas delicioso que puedas probar, hecho con las manos de los mejores chefs del pais
                            garantizando un sabor espectacular que te hara volver una y otra vez, !Los esperamos!',
            'precio' => rand(10,60),
            'tipo_alimento_id' => 3
        ]);

        Postre::create([
            'nombre' => 'Flan',
            'imagen' => 'imagenes/' . $faker->image('public/storage/imagenes', 640, 480, null, false),
            'descripcion' => 'El plato mas delicioso que puedas probar, hecho con las manos de los mejores chefs del pais
                            garantizando un sabor espectacular que te hara volver una y otra vez, !Los esperamos!',
            'precio' => rand(10,60),
            'tipo_alimento_id' => 4
        ]);
        Postre::create([
            'nombre' => 'Arroz con Leche',
            'imagen' => 'imagenes/' . $faker->image('public/storage/imagenes', 640, 480, null, false),
            'descripcion' => 'El plato mas delicioso que puedas probar, hecho con las manos de los mejores chefs del pais
                            garantizando un sabor espectacular que te hara volver una y otra vez, !Los esperamos!',
            'precio' => rand(10,60),
            'tipo_alimento_id' => 4
        ]);
        Postre::create([
            'nombre' => 'Budin',
            'imagen' => 'imagenes/' . $faker->image('public/storage/imagenes', 640, 480, null, false),
            'descripcion' => 'El plato mas delicioso que puedas probar, hecho con las manos de los mejores chefs del pais
                            garantizando un sabor espectacular que te hara volver una y otra vez, !Los esperamos!',
            'precio' => rand(10,60),
            'tipo_alimento_id' => 4
        ]);

        Postre::create([
            'nombre' => 'Gelatina de Pata',
            'imagen' => 'imagenes/' . $faker->image('public/storage/imagenes', 640, 480, null, false),
            'descripcion' => 'El plato mas delicioso que puedas probar, hecho con las manos de los mejores chefs del pais
                            garantizando un sabor espectacular que te hara volver una y otra vez, !Los esperamos!',
            'precio' => rand(10,60),
            'tipo_alimento_id' => 4
        ]);
        Postre::create([
            'nombre' => 'Gelatina',
            'imagen' => 'imagenes/' . $faker->image('public/storage/imagenes', 640, 480, null, false),
            'descripcion' => 'El plato mas delicioso que puedas probar, hecho con las manos de los mejores chefs del pais
                            garantizando un sabor espectacular que te hara volver una y otra vez, !Los esperamos!',
            'precio' => rand(10,60),
            'tipo_alimento_id' => 4
        ]);



    }
}
