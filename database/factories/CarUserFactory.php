<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarUser>
 */
class CarUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => $this->faker->name,
            'user_name' => $this->faker->userName,
            'email' => $this->faker->unique()->safeEmail,
            'active' => $this->faker->boolean,
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ];
    }
}
