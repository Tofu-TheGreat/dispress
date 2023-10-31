<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        User::factory()->create([
            'nip' => '213720078171677275',
            'nama' => 'Pasya Abinaya',
            'level' => 'admin',
            'jabatan' => '9',
            'username' => 'pasya.nada',
            'email' => 'pasya@gmail.com',
            'nomor_telpon' => '089123456789',
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'nip' => '213720078171677288',
            'nama' => 'Fadli Hifziansyah',
            'level' => 'officer',
            'jabatan' => '9',
            'username' => 'fadli.god',
            'email' => 'fadli@gmail.com',
            'nomor_telpon' => '087827303328',
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'nip' => '213720078171677277',
            'nama' => 'Yudis Tiro',
            'level' => 'staff',
            'jabatan' => '9',
            'username' => 'naka',
            'email' => 'yudis@gmail.com',
            'nomor_telpon' => '089123456999',
            'password' => bcrypt('password'),
        ]);
    }
}
