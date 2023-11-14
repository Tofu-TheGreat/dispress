<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Surat;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Surat>
 */
class SuratFactory extends Factory
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
            // 'nomor_surat' => $this->faker->unique()->numerify('####'),
            // 'tanggal_surat' => $this->faker->date(),
            // 'isi_surat' => $this->faker->realText($maxNbChars = 100, $indexSize = 2),
            // 'pengirim_surat' => $this->faker->company(),
            // 'id_user' => $this->faker->randomElement($user),
            // 'scan_dokumen' => $this->faker->realText($maxNbChars = 10, $indexSize = 2)
        ];
    }
}
