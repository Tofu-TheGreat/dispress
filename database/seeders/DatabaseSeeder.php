<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Surat;
use App\Models\Disposisi;
use App\Models\Klasifikasi;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Instansi::factory(15)->create();
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

        // Seed klasifikasi
        Klasifikasi::factory()->create([
            'nomor_klasifikasi' => '005',
            'nama_klasifikasi' => 'Undangan',
        ]);
        Klasifikasi::factory()->create([
            'nomor_klasifikasi' => '020',
            'nama_klasifikasi' => 'Peralatan',
        ]);

        // Seed Surat
        Surat::factory()->create([
            'nomor_surat' => '091/1228-SMK3/2023',
            'tanggal_surat' => '2023-11-9',
            'isi_surat' => 'Perihal Rapat ',
            'id_instansi' => '2',
            'id_klasifikasi' => '1',
            'id_user' => '5',
            'catatan_verifikasi' => 'Tolong segera di verifikasi ya pak/bu',
            'scan_dokumen' => 'scan.pdf',
        ]);
        Surat::factory()->create([
            'nomor_surat' => '090/1928-SMK2/2023',
            'tanggal_surat' => '2028-11-9',
            'isi_surat' => 'Datangnya kedutaan dari jogja sama Nada',
            'id_instansi' => '1',
            'id_klasifikasi' => '2',
            'id_user' => '1',
            'catatan_verifikasi' => 'Tolong segera di verifikasi ya pak/bu',
            'scan_dokumen' => 'scan.pdf',
        ]);

        // Seed Disposisi
        // Disposisi::factory()->create([
        //     'id_surat' => '2',
        //     'nomor_agenda' => '090/1928-TU/2023',
        //     'tanggal_disposisi' => '2028-11-9',
        //     'catatan_disposisi' => 'Approve Disposisi',
        //     'status_disposisi' => '0',
        //     'sifat_disposisi' => '1',
        //     'id_klasifikasi' => '1',
        //     'id_user' => '1',
        //     'id_penerima' => '1',
        //     'tujuan_disposisi' => '1',
        // ]);
    }
}
