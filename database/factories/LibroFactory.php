<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LibroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->sentence(),
            'ISBN' => $this->faker->isbn10(),
            'editorial' => $this->faker->company(),
            'imagen' => $this->faker->word(),
            'descripcion' => $this->faker->sentence(),
            'stock' => '10'
        ];
    }
}
