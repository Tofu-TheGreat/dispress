<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Surat;
use App\Models\Instansi;
use App\Models\Disposisi;
use App\Models\Pengajuan;
use App\Models\WebSetting;
use App\Models\Klasifikasi;
use App\Models\PosisiJabatan;
use App\Models\SuratKeluar;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Posisi Jabatan
        PosisiJabatan::factory()->create([
            'nama_posisi_jabatan' => 'Kepala Sekolah',
            'deskripsi_jabatan' => 'edukator, manager, administrator dan supervisor Pemimpin / Leader Inovator Motovator.',
            'tingkat_jabatan' => '0',
        ]);
        PosisiJabatan::factory()->create([
            'nama_posisi_jabatan' => 'Wakil Kepala Sekolah',
            'deskripsi_jabatan' => 'Membantu kepala sekolah dan mengganti kan kepala sekolah jika di butuhkan',
            'tingkat_jabatan' => '0',
        ]);

        PosisiJabatan::factory()->create([
            'nama_posisi_jabatan' => 'Kurikulum',
            'deskripsi_jabatan' => 'Membuat perencanaan proses pembelajaran, Menyusun pembagian tugas mengajar dan pembuatan jadwal',
            'tingkat_jabatan' => '0',
        ]);
        PosisiJabatan::factory()->create([
            'nama_posisi_jabatan' => 'Kesiswaan',
            'deskripsi_jabatan' => 'Melaksanakan bimbingan, pengarahan serta pengendalian kegiatan siswa melalui OSIS',
            'tingkat_jabatan' => '1',
        ]);
        PosisiJabatan::factory()->create([
            'nama_posisi_jabatan' => 'Sarana Prasarana',
            'deskripsi_jabatan' => 'Membuat dan menyusun program kerja tahunan kegiatan sekolah di bidang sarana dan prasarana dan mengkoordinir serta mengawasi pelaksanaannya.',
            'tingkat_jabatan' => '1',
        ]);
        PosisiJabatan::factory()->create([
            'nama_posisi_jabatan' => 'Kepala Jurusan',
            'deskripsi_jabatan' => 'Mengatur semua yang berkaitan dengan jurusan.',
            'tingkat_jabatan' => '1',
        ]);
        PosisiJabatan::factory()->create([
            'nama_posisi_jabatan' => 'Hubin',
            'deskripsi_jabatan' => 'Membantu Kepala Sekolah dalam pelaksanaan tugas hubungan industri/ masyarakat',
            'tingkat_jabatan' => '1',
        ]);
        PosisiJabatan::factory()->create([
            'nama_posisi_jabatan' => 'Tata Usaha',
            'deskripsi_jabatan' => 'Para petugas yang mengemban tanggung jawab untuk mengurusi segala bentuk administasi di suatu sekolah.',
            'tingkat_jabatan' => '1',
        ]);
        PosisiJabatan::factory()->create([
            'nama_posisi_jabatan' => 'Guru Umum',
            'deskripsi_jabatan' => 'Mengajar para siswa',
            'tingkat_jabatan' => '2',
        ]);

        User::factory(7)->create();

        // Seed User
        User::factory()->create([
            'nip' => '213720078171677275',
            'nama' => 'Pasya Abinaya Nada Albana',
            'level' => 'admin',
            'id_posisi_jabatan' => '1',
            'username' => 'pasya.nada',
            'email' => 'pasya@gmail.com',
            'nomor_telpon' => '089123456789',
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'nip' => '213720078171677288',
            'nama' => 'Fadli Hifziansyah',
            'level' => 'officer',
            'id_posisi_jabatan' => '1',
            'username' => 'fadli.god',
            'email' => 'fadli@gmail.com',
            'nomor_telpon' => '087827303328',
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'nip' => '213720078171677277',
            'nama' => 'Yudis Tiro Naka Albantoro',
            'level' => 'staff',
            'id_posisi_jabatan' => '1',
            'username' => 'naka',
            'email' => 'yudis@gmail.com',
            'nomor_telpon' => '089123456999',
            'password' => bcrypt('password'),
        ]);

        // Seed instansi
        Instansi::factory()->create([
            'nama_instansi' => 'SMKN3 Kota Tangerang',
            'nomor_telpon' => '089123000990',
            'email' => 'smkn3@gmail.com',
            'alamat_instansi' => 'Jl. Maulana Yusuf, RT.002/RW.003, Babakan, Kec. Tangerang, Kota Tangerang, Banten 15118',
        ]);
        Instansi::factory()->create([
            'nama_instansi' => 'SMKN2 Kota Tangerang',
            'nomor_telpon' => '089123111990',
            'email' => 'smkn2@gmail.com',
            'alamat_instansi' => 'Jl. Veteran No.2, RT.004/RW.011, Sukasari, Kec. Tangerang, Kota Tangerang, Banten 15118',
        ]);

        Instansi::factory()->create([
            'nama_instansi' => 'SMKN4 Kota Tangerang',
            'nomor_telpon' => '089123111770',
            'email' => 'smkn4@gmail.com',
            'alamat_instansi' => 'Jl. Veteran No.1A, RT.005/RW.002, Babakan, Kec. Tangerang, Kota Tangerang, Banten 15118',
        ]);

        Instansi::factory(15)->create();

        // websetting
        WebSetting::factory()->create([
            'id_instansi' => '3',
            'id_ketua' => '8',
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
            'nomor_surat' => '005/1228-SMKN3/2023',
            'tanggal_surat' => '2023-11-1',
            'isi_surat' => 'Perihal undangan rapat ',
            'id_instansi' => '1',
            'id_klasifikasi' => '1',
            'id_user' => '5',
            'status_verifikasi' => '1',
            'catatan_verifikasi' => 'Tolong segera di verifikasi ya pak/bu',
            'scan_dokumen' => 'scan.pdf',
        ]);
        Surat::factory()->create([
            'nomor_surat' => '020/1928-SMKN2/2023',
            'tanggal_surat' => '2023-11-9',
            'isi_surat' => 'Peminjaman peralatan oleh bu Nada',
            'id_instansi' => '2',
            'id_klasifikasi' => '2',
            'id_user' => '1',
            'status_verifikasi' => '0',
            'catatan_verifikasi' => 'Tolong segera di verifikasi ya pak/bu',
            'scan_dokumen' => 'scan.pdf',
        ]);

        // Seed pengajuan disposisi
        Pengajuan::factory()->create([
            'id_surat' => '1',
            'id_klasifikasi' => '1',
            'nomor_agenda' => '005/1299-TU/2023',
            'status_pengajuan' => '1',
            'tanggal_terima' => '2023-11-12',
            'catatan_pengajuan' => 'Sudah Didisposisikan',
            'id_user' => '7',
        ]);

        Pengajuan::factory()->create([
            'id_surat' => '2',
            'id_klasifikasi' => '2',
            'nomor_agenda' => '020/1299-TU/2023',
            'status_pengajuan' => '1',
            'tanggal_terima' => '2024-1-1',
            'catatan_pengajuan' => 'Tolong segera di disposisikan ya pak/bu',
            'id_user' => '5',
        ]);

        Pengajuan::factory()->create([
            'id_surat' => '2',
            'id_klasifikasi' => '2',
            'nomor_agenda' => '020/1300-TU/2023',
            'status_pengajuan' => '0',
            'tanggal_terima' => '2024-1-2',
            'catatan_pengajuan' => 'Tolong segera di disposisikan ya pak/bu',
            'id_user' => '5',
        ]);

        // Seed Disposisi
        Disposisi::factory()->create([
            'id_pengajuan' => '1',
            'catatan_disposisi' => 'Approve Disposisi',
            'tanggal_disposisi' => '2024-1-3',
            'status_disposisi' => '5',
            'sifat_disposisi' => '0',
            'id_user' => '7',
            'id_posisi_jabatan' => '4',
        ]);

        Disposisi::factory()->create([
            'id_pengajuan' => '2',
            'catatan_disposisi' => 'Approve Disposisi',
            'tanggal_disposisi' => '2024-1-4',
            'status_disposisi' => '3',
            'sifat_disposisi' => '1',
            'id_user' => '7',
            'id_penerima' => '1',
        ]);

        Disposisi::factory()->create([
            'id_pengajuan' => '2',
            'catatan_disposisi' => 'Approve Disposisi',
            'tanggal_disposisi' => '2024-1-5',
            'status_disposisi' => '3',
            'sifat_disposisi' => '1',
            'id_user' => '7',
            'id_penerima' => '8',
        ]);

        //seed surat keluar
        SuratKeluar::factory()->create([
            'nomor_surat_keluar' => '005/1299-SMKN4/2024',
            'tanggal_surat_keluar' => '2024-1-6',
            'isi_surat' => 'Dengan hormat, Kami mengundang Anda untuk menghadiri rapat yang akan diselenggarakan oleh SMKN 4. Mohon konfirmasi kehadiran Anda pada rapat ini. Jika Anda tidak dapat hadir, harap memberitahu kami sebelumnya agar kami dapat mengatur ulang jadwal atau menyediakan materi tambahan jika diperlukan.',
            'id_klasifikasi' => '1',
            'id_instansi_penerima' => '2',
            'id_user' => '8',
            'perihal' => 'Perihal undangan rapat ',
            'tembusan' => 'wakil kepala sekolah',
        ]);
    }
}
