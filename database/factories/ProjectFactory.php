<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 20),
            'nama_project' => $this->faker->company(),
            'nilai_kontrak' => $this->faker->randomNumber(6),
            'nilai_connectivity' => $this->faker->randomNumber(6),
            'tipe_project' => $this->faker->randomElement(['big_mega', 'regular']),
            'status_project' => $this->faker->randomElement(['lead', 'delay', 'closed', 'lag']),
        ];
    }
}
