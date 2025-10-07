<?php

namespace Database\Factories;
use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use App\Models\Cooperative;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $faker = \Faker\Factory::create();

        return [
            'firstname' => $faker->firstName,
            'secondname' => $faker->lastName,
            'email' => $faker->unique()->safeEmail,
            'phonenumber' => $this->faker->numberBetween(1000000000, 9999999999),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'age' => $this->faker->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d H:i:s'),

            'province' => $faker->state,
            'district' => $faker->city,
            'sector' => $faker->streetName,
            'cell' => $faker->streetAddress,
            'cooperative_id' => function () {
                return Cooperative::inRandomOrder()->first()->id;
            },
            


            ];
    }
}
