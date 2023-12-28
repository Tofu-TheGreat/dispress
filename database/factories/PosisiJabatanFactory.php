<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\en_US\Company;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PosisiJabatan>
 */
class PosisiJabatanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_posisi_jabatan' => $this->faker->jobTitle(),
            'deskripsi_jabatan' => $this->faker->jobTitle(),
            'tingkat_jabatan' => $this->faker->randomElement(["0", "1", '2']),
        ];
    }
}
