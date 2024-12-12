<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RealizaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_artista' => $this->faker->numberBetween(4, 50),
            'id_lanzamiento' => $this->faker->numberBetween(5, 50),
        ];
    }
}
