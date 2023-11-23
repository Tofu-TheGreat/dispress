<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Surat;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Surat>
 */
class PerusahaanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $user = \App\Models\Surat::pluck('id_user');
        return [
            'nama_perusahaan' => $this->faker->company(),
            'alamat_perusahaan' => $this->faker->address(),
            'nomor_telpon' => $this->faker->numerify('#############'),
        ];
    }
}
