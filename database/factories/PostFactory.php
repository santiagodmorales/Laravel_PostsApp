<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'text' => $this->faker->sentence(),
        ];
    }
}
