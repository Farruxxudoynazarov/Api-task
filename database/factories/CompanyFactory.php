<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create();

        return [
            'name' => $faker->company,
            'leader_name' => $faker->name,
            'address' => $faker->address,
            'email' => $faker->unique()->safeEmail,
            'website' => $faker->url,
            'phone_number' => $faker->phoneNumber,
        ];
    }
}