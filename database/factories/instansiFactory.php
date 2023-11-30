<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\instansi>
 */
class instansiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_instansi' => $this->faker->company(),
            'alamat_instansi' => $this->faker->address(),
            'nomor_telpon' => $this->faker->numerify('#############'),
        ];
    }
}
