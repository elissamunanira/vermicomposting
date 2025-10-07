<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Microcontroller>
 */
class MicrocontrollerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {


        return [
            //
            'name'=>$this->faker->word(),

            'manufacturer' => $this->faker->company,
            'architecture' => $this->faker->randomElement(['AVR', 'ARM', 'PIC', 'MSP430']),
            'clock_speed' => $this->faker->numberBetween(1000000, 300000000),
            'flash_memory_size' => $this->faker->numberBetween(8192, 1048576),
            'ram_size' => $this->faker->numberBetween(128, 8192),
            'pin_count' => $this->faker->numberBetween(8, 100),
            'price' => $this->faker->randomFloat(2, 5, 500),
            'stock' => $this->faker->numberBetween(0, 100),
            'cooperative_id' => function () {
                return \App\Models\Cooperative::inRandomOrder()->first()->id;
            }
        ];
    }
}

