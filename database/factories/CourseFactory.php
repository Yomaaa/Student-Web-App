<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'lecturerId' => $this->faker->numberBetween(1,5),
            'courseTitle' => $this->faker->jobTitle(),
            'courseDesc' => $this->faker->paragraph(3),
            'courseCode' => $this->faker->numerify('COE 2##'),
            'courseSchedule' => $this->faker->dayOfWeek($max = 'Friday'),
            'courseProg' => $this->faker->numberBetween(0,100)
        ];
    }
}
