<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
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
            'name' => $this->faker->unique->name(),
            'job_role' => $this->faker->jobTitle(),
            'phone_number' => $this->faker->unique->phoneNumber()
        ];
    }
}
