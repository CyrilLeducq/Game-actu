<?php

namespace Database\Factories;

use App\Models\Plateform;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'cover' => fake()->imageUrl(),
            'youtube' => fake()->url(),
            'plateform_id' => Plateform::factory(),
            'synopsis' => fake()->text(),
            'editor' => fake()->text(2),
            'developer'=> fake()->text(2),
            'gender'=> fake()->text(1),
            'rating'=> fake()->numberBetween(1, 19),
            'youtube' => fake()->url(),
            'cover' => fake()->imageUrl(),
            'released_at' => fake()->dateTimeBetween('-50 years', '+10 years'),
            
        ];
    }
}
