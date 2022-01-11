<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClientFactory extends Factory
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
            'address' => $this->faker->unique->address(),
            'post_code' => $this->faker->postcode(),
            'contact_number' => $this->faker->unique->phoneNumber()
        ];
    }
}
