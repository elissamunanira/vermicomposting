<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Worm>
 */
class WormFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'population' => $this->faker->numberBetween(100, 1000),
            'price' => $this->faker->randomFloat(2, 5, 500),
            'cooperative_id' => function () {
                return \App\Models\Cooperative::inRandomOrder()->first()->id;},
                // 'created_at' =>$this-> faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d H:i:s'),
                // 'updated_at' => $this->faker->dateTimeBetween('-1 week', 'now')->format('Y-m-d H:i:s'),


        ];
    }
}
