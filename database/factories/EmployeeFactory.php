<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->unique->numberBetween(1,100),
            'name' => $this->faker->name(),
            'job_role' => $this->faker->jobTitle()
        ];
    }
}
