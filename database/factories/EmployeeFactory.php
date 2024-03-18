<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'passport' => $this->faker->unique()->regexify('[A-Z]{2}[0-9]{7}'), // Unique passport number
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'father_name' => $this->faker->lastName,
            'position' => $this->faker->jobTitle,
            'phone_number' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'company_id' => \App\Models\Company::factory(), // Use the Company factory to get a company ID
        ];
    }
}