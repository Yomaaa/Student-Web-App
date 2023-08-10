<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lecturer>
 */
class LecturerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->freeEmail(),
            'qualifications' => $this->faker->randomElement(['Phd','BSc','BEng','MSc'],2),
            'phoneNumber' => $this->faker->e164PhoneNumber('234')

        ];
    }
}
