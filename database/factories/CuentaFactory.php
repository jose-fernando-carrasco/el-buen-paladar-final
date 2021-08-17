<?php

namespace Database\Factories;

use App\Models\Cuenta;
use Illuminate\Database\Eloquent\Factories\Factory;

class CuentaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cuenta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fecha' => date('Y-m-d H:i'),
            'total' => $this->faker->numberBetween(20, 100),
            'tipo' => $this->faker->randomElement(['Mesa', 'Llevar'])
        ];
    }
}
