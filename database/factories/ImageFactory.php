<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<, mixed>
     */
    public function definition()
    {
        return [
            'comment_id' => $this->faker->numberBetween(1, 60),
            //'post_id' => $this->faker->numberBetween(1, 30),
            'filename' => $this->faker->word(30),
        ];
    }
}
