<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Apprenant;
use Faker\Generator as Faker;

class ApprenantFactory extends Factory
{
    protected $model = Apprenant::class;

    public function definition()
    {
        $faker = $this->faker;
        return [
            'name' => $faker->name,
            'img' => '1.png',
            'lastname' => $faker->lastname,
            'email' => $faker->email,
            'phonenumber' => $faker->phoneNumber,
            'gendre' => 'Male',
            'spec' => 'Web Design',
            'password' => '2029883;D',
        ];
    }
}
