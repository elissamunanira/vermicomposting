<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'firstname'=> fake()->firstname(),
            'secondname'=>fake()->text(10),
            'profilePic'=>'profiles/KvUuaOmJeDYlOxu7HpB1ba4nJBjGdiRcFlaebmiH.jpg',
            'phonenumber'=>fake()->numberBetween(1 , 12),
            'gender'=>'male',
            'province'=>'North',
            'district'=>'Burera',
            'sector'=>'Gahunga',
            'cell'=>'Kidakama',
             'village'=>'Mubuga',
             'user_id'=>1,
             'description'=>fake()->text(40),
        ];
    }
}
