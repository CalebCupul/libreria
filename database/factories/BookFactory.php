<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'name' => $this->faker->sentence(),
            'isbn' => $this->faker->isbn10(),
            'editorial' => $this->faker->company(),
            'image' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'stock' => '10'
            
        ];
    }
}
