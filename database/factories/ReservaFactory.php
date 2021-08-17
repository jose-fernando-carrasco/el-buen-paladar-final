<?php

namespace Database\Factories;

use App\Models\Reserva;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reserva::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cantidad' => $this->faker->randomDigit(),
            'fecha' => $this->faker->date(),
            'hora' => $this->faker->time('H:i'),
            'user_id' => User::all()->random()->id
        ];
    }
}
