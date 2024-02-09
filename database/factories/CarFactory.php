<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word,
            'content' => $this->faker->paragraph,
            'luggage' => $this->faker->numberBetween(1, 5),
            'doors' => $this->faker->numberBetween(2, 5),
            'passengers' => $this->faker->numberBetween(2, 7),
            'price' => $this->faker->numberBetween(10000, 100000),
            'active' => $this->faker->boolean,
            'image' => $this->faker->imageUrl(),
            'cat_id' => function () {
                return Category::inRandomOrder()->first()->id;
            },
        ];
    }
}
