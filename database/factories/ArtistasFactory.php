<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArtistasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_artista' => $this->faker->name(),
            'fecha' => $this->faker->date('Y-m-d'),
            'imagen_artista' => 'uploads/393bfda8da80c5024e572eb01cf58020.900x900x1.jpg',
            'descripcion_artista' => $this->faker->text(),
        ];
    }
}
