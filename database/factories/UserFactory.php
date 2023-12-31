<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nip' => $this->faker->unique()->numerify('##################'),
            'nama' => $this->faker->name(),
            'level' => $this->faker->randomElement(["officer", "staff", 'admin']),
            'jenis_kelamin' => $this->faker->randomElement(["L", "P"]),
            'id_posisi_jabatan' => $this->faker->randomElement([" 1", " 2", "3", "4", "5", "6", "7"]),
            'username' => $this->faker->username(),
            'email' => $this->faker->unique()->safeEmail(),
            'golongan' => $this->faker->bothify('??-?'),
            'pangkat' => $this->faker->sentence(1),
            'nomor_telpon' => $this->faker->unique()->numerify('#############'),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
