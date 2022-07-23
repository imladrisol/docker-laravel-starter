<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'category_id' => Category::factory(),
            'duration' => $this->faker->numberBetween(1, 200),
            'is_active' => $this->faker->boolean
        ];
    }
}
