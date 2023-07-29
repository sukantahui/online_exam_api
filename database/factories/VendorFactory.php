<?php

namespace Database\Factories;

use App\Models\District;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vendor>
 */
class VendorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->districtsIds = District::all()->pluck('id')->toArray();
        return [
            'vendor_name' => $this->faker->unique()->name(),
            'mailing_name' => $this->faker->name(),
            'phone_number'=> $this->faker->numerify('##########'),
            'email' => $this->faker->email(),
            'address' =>$this->faker->streetAddress(),
            'district_id' => $this->faker->randomElement($this->districtsIds),

        ];
    }
}
