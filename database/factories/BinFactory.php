<?php

namespace Database\Factories;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bin>
 */
class BinFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $increment = 0; // initialize increment to 0

        $increment++; // increment for each call to definition()

        $year = date('Y');
        $date = date('md');
        $uniqueWord = $this->faker->unique()->word;
        $code = str_pad($increment, 5, '0', STR_PAD_LEFT).'-'.'Coop'.'-BIN-'.$year.'-'.$date.'-'.$uniqueWord;


    return [
        'member_id' => function () {
            return \App\Models\Member::inRandomOrder()->first()->id;
        },
        'cooperative_id' => function () {
            return \App\Models\Cooperative::inRandomOrder()->first()->id;
        },
        'code' => $code,
        'status' => $this->faker->numberBetween(0, 1),
        'microcontroller_type' => $this->faker->word,
        'worm_type' => $this->faker->word,
        'province' => $this->faker->word,
        'district' => $this->faker->word,
        'sector' => $this->faker->word,
        'cell' => $this->faker->word,
        'created_at' => now(),
        'updated_at' => now(),
    ];

    }
}
