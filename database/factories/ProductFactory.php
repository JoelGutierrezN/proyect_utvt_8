<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->unique()->randomNumber(6),
            'name' => $this->faker->name(),
            'stock' => $this->faker->numberBetween(0,25),
            'provider_price' => $this->faker->randomFloat(2,25,250),
            'shop_price' => $this->faker->randomFloat(2,50,500),
            'description' => $this->faker->text(),
            'user_id' => rand(1,10)
        ];
    }
}
