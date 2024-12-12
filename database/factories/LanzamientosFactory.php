<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LanzamientosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_lanzamiento' => $this->faker->sentence(),
            'fecha_lanzamiento' => $this->faker->date('Y-m-d'),
            'caratula' => 'uploads/noalbumart.png',
            'descripcion_lanzamiento' => $this->faker->text(),
            'tipo' => $this->faker->randomElement(['Album', 'EP','Sencillo']),
            'id_genero' => $this->faker->numberBetween(1, 4),
        ];
    }
}
