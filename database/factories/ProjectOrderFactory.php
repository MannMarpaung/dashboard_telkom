<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectOrder>
 */
class ProjectOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'project_id' => $this->faker->numberBetween(1, 11), // angka 1-10, tidak unique
            'number_order' => $this->faker->unique()->numberBetween(1001606334, 1001822610), // string angka unik
        ];
    }
}
