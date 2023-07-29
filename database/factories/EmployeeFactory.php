<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'designation_id' => $this->faker->numberBetween(1, 7),
            'department_id' => $this->faker->numberBetween(1, 10),
            'doj' => $this->faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now'),
            'dob' => $this->faker->dateTimeBetween($startDate = '-23 years', $endDate = 'now'),
            'phone_number'=> $this->faker->numerify('##########'),
            'email'=> $this->faker->email(),
            'city'=> $this->faker->city(),
//            'salary'=> $this->faker->numberBetween(10000, 60000),
        ];
    }
}
