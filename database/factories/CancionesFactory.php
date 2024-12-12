<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CancionesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_lanzamiento' => $this->faker->numberBetween(5, 50),
            'num_pista' => $this->faker->numberBetween(1, 10),
            'titulo' =>  $this->faker->sentence(),
            'duracion' =>  $this->faker->numberBetween(1, 850),
            'reproducciones' => $this->faker->numberBetween(1, 25000),
        ];
    }
}
