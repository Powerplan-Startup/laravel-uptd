<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pimpinan>
 */
class PimpinanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama'      => $this->faker->name(),
            'username'  => $this->faker->userName(),
            'password'  => bcrypt('password'),
            'email'     => $this->faker->unique()->safeEmail()
        ];
    }
}
