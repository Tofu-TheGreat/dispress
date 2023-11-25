<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Surat;
use App\Models\Disposisi;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Perusahaan::factory(15)->create();
        // \App\Models\Surat::factory(10)->create();

        // Seed User
        User::factory()->create([
            'nip' => '213720078171677275',
            'nama' => 'Pasya Abinaya Nada Albana',
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
            'nama' => 'Yudis Tiro Naka Albantoro',
            'level' => 'staff',
            'jabatan' => '9',
            'username' => 'naka',
            'email' => 'yudis@gmail.com',
            'nomor_telpon' => '089123456999',
            'password' => bcrypt('password'),
        ]);

        // Seed Surat
        Surat::factory()->create([
            'nomor_surat' => '091/1228-TU/2023',
            'tanggal_surat' => '2023-11-9',
            'isi_surat' => 'Perihal Rapat ',
            'id_perusahaan' => '2',
            'id_user' => '5',
            'scan_dokumen' => 'scan.pdf',
        ]);
        Surat::factory()->create([
            'nomor_surat' => '090/1928-TU/2023',
            'tanggal_surat' => '2028-11-9',
            'isi_surat' => 'Datangnya kedutaan dari jogja sama Nada',
            'id_perusahaan' => '1',
            'id_user' => '1',
            'scan_dokumen' => 'scan.pdf',
        ]);

        // Seed Disposisi
        Disposisi::factory()->create([
            'id_surat' => '2',
            'tanggal_disposisi' => '2028-11-9',
            'catatan_disposisi' => 'Approve Disposisi',
            'status_disposisi' => '1',
            'sifat_disposisi' => '1',
            'id_user' => '1',
            'tujuan_disposisi' => '1',
        ]);

        Disposisi::factory()->create([
            'id_surat' => '1',
            'tanggal_disposisi' => '2028-11-9',
            'catatan_disposisi' => 'Approve Disposisi nada',
            'status_disposisi' => '2',
            'sifat_disposisi' => '0',
            'id_user' => '2',
            'tujuan_disposisi' => '2',
        ]);
    }
}
