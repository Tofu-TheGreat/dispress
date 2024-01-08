<?php

use App\Models\SuratTugas;

if (!function_exists('currencyPhone')) {
    function currencyPhone($phone)
    {
        $phone = preg_replace('/[^\d]/', '', $phone);

        // Mengecek panjang nomor telepon
        if (strlen($phone) === 10) {
            $ac = substr($phone, 0, 2);
            $prefix = substr($phone, 2, 4);
            $suffix = substr($phone, 6);
        } elseif (strlen($phone) === 11) {
            $ac = substr($phone, 0, 3);
            $prefix = substr($phone, 3, 4);
            $suffix = substr($phone, 7);
        } elseif (strlen($phone) === 12) {
            $ac = substr($phone, 0, 4);
            $prefix = substr($phone, 4, 4);
            $suffix = substr($phone, 8);
        } elseif (strlen($phone) === 13) {
            $ac = substr($phone, 0, 4);
            $prefix = substr($phone, 4, 4);
            $suffix = substr($phone, 8);
        } else {
            // Panjang nomor telepon tidak valid
            return 'Invalid phone number';
        }

        $formatted = "($ac) {$prefix}-{$suffix}";
        return $formatted;
    }
}

if (!function_exists('currencyPhoneToNumeric')) {
    function currencyPhoneToNumeric($phone)
    {
        $formatted = preg_replace('/[^0-9]/', '', $phone);
        return $formatted;
    }
}

if (!function_exists('jabatanConvert')) {
    function jabatanConvert($value, $type)
    {
        switch ($type) {
            case 'jabatan':
                $map = [
                    0 => 'Jabatan Struktural',
                    1 => 'Jabatan Fungsional Tertentu',
                    2 => 'Jabatan Fungsional Umum',
                ];
                break;
            default:
                $map = ['Tidak Diketahui'];
                break;
        }
        return $map[$value] ?? 'Tidak Diketahui';
    }
}

if (!function_exists('statusPengajuanConvert')) {
    function statusPengajuanConvert($value, $type)
    {
        switch ($type) {
            case 'status_pengajuan':
                $map = [
                    0 => 'Belum Terdisposisikan',
                    1 => 'Terdisposisikan',
                ];
                break;
            default:
                $map = ['Tidak Diketahui'];
                break;
        }
        return $map[$value] ?? 'Tidak Diketahui';
    }
}
if (!function_exists('reverseJabatanConvert')) {
    function reverseJabatanConvert($value, $type)
    {
        switch ($type) {
            case 'jabatan':
                $map = [
                    'Kepala Sekolah' => 0,
                    'Wakil Kepala Sekolah' => 1,
                    'Kurikulum' => 2,
                    'Kesiswaan' => 3,
                    'Sarana dan Prasarana' => 4,
                    'Kepala Jurusan' => 5,
                    'Hubin' => 6,
                    'Bimbingan Konseling' => 7,
                    'Guru Umum' => 8,
                    'Tata Usaha' => 9,
                ];
                break;
            default:
                $map = ['Tidak Diketahui' => null];
                break;
        }

        return $map[$value] ?? $map['Tidak Diketahui'];
    }
}
if (!function_exists('tingkatJabatanConvert')) {
    function tingkatJabatanConvert($value, $type)
    {
        switch ($type) {
            case 'tingkat_jabatan':
                $map = [
                    '0' => 'Jabatan Struktural',
                    '1' => 'Jabatan Fungsional Tertentu',
                    '2' => 'Jabatan Fungsional Umum',
                ];
                break;
            default:
                $map = ['Tidak Diketahui' => null];
                break;
        }

        return $map[$value] ?? $map['Tidak Diketahui'];
    }
}
if (!function_exists('reversetingkatJabatanConvert')) {
    function reversetingkatJabatanConvert($value, $type)
    {
        switch ($type) {
            case 'tingkat_jabatan':
                $map = [
                    "Jabatan Struktural" => '0',
                    "Jabatan Fungsional Tertentu" => '1',
                    "Jabatan Fungsional Umum" => '2',
                ];
                break;
            default:
                $map = ['Tidak Diketahui' => null];
                break;
        }

        return $map[$value] ?? $map['Tidak Diketahui'];
    }
}


if (!function_exists('convertDisposisiField')) {
    function convertDisposisiField($value, $type)
    {
        switch ($type) {
            case 'sifat':
                $map = [
                    0 => 'Tindaklanjuti',
                    1 => 'Biasa',
                    2 => 'Segera',
                    3 => 'Penting',
                    4 => 'Rahasia',
                ];
                break;
            case 'status':
                $map = [
                    0 => 'Arsipkan',
                    1 => 'Jabarkan',
                    2 => 'Umumkan',
                    3 => 'Laksanakan',
                    4 => 'Persiapkan',
                    5 => 'Ikuti',
                ];
                break;
            case 'tujuan':
                $map = [
                    0 => 'Kepala Sekolah',
                    1 => 'Wakil Kepala Sekolah',
                    2 => 'Kurikulum',
                    3 => 'Kesiswaan',
                    4 => 'Sarana dan Prasarana',
                    5 => 'Kepala Jurusan',
                    6 => 'Hubin',
                    7 => 'Bimbingan Konseling',
                    8 => 'Guru Umum',
                    9 => 'Tata Usaha',
                ];
                break;
            default:
                $map = ['Tidak Diketahui'];
        }

        return $map[$value] ?? 'Tidak Diketahui';
    }
}
if (!function_exists('reverseconvertDisposisiField')) {
    function reverseconvertDisposisiField($value, $type)
    {
        switch ($type) {
            case 'sifat':
                $map = [
                    'Tindaklanjuti' => 0,
                    'Biasa' => 1,
                    'Segera' => 2,
                    'Penting' => 3,
                    'Rahasia' => 4,
                ];
                break;
            case 'status':
                $map = [
                    'Arsipkan' => 0,
                    'Jabarkan' => 1,
                    'Umumkan' => 2,
                    'Laksanakan' => 3,
                    'Persiapkan' => 4,
                    'Ikuti' => 5,
                ];
                break;
            case 'tujuan':
                $map = [
                    'Kepala Sekolah' => 0,
                    'Wakil Kepala Sekolah' => 1,
                    'Kurikulum' => 2,
                    'Kesiswaan' => 3,
                    'Sarana dan Prasarana' => 4,
                    'Kepala Jurusan' => 5,
                    'Hubin' => 6,
                    'Bimbingan Konseling' => 7,
                    'Guru Umum' => 8,
                    'Tata Usaha' => 9,
                ];
                break;
            default:
                return null; // Mengembalikan null untuk menunjukkan nilai tidak valid
        }

        return $map[$value] ?? null; // Mengembalikan null jika nilai tidak ditemukan
    }
}

if (!function_exists('formatCetak')) {
    function formatCetak($isiSurat, $panjangMaksimal = 29)
    {
        $kataKata = explode(' ', $isiSurat);
        $hasil = '';
        $panjangBaris = 0;

        foreach ($kataKata as $kata) {
            if ($panjangBaris + strlen($kata) > $panjangMaksimal) {
                $hasil .= '<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                $panjangBaris = 0;
            }

            if ($panjangBaris > 0) {
                $hasil .= ' ';
                $panjangBaris++;
            }

            $hasil .= $kata;
            $panjangBaris += strlen($kata);
        }

        return $hasil;
    }
}

if (!function_exists('convertToNIP')) {
    function convertToNIP($inputString)
    {
        // Pastikan bahwa inputString memiliki panjang yang cukup
        if (strlen($inputString) !== 18) {
            return 'Invalid input string length';
        }

        // Pisahkan bagian-bagian dari inputString
        $tanggalLahir = substr($inputString, 0, 8);
        $tahunMasuk = substr($inputString, 8, 6);
        $jenisKelamin = substr($inputString, 14, 1);
        $urutan = substr($inputString, 15);

        // Format NIP
        $formattedNIP = $tanggalLahir . ' ' . $tahunMasuk . ' ' . $jenisKelamin . ' ' . $urutan;

        return $formattedNIP;
    }
}

if (!function_exists('convertJsonIdUserPenerima')) {
    function convertJsonIdUserPenerima($modelClass, $fieldName)
    {
        $value = SuratTugas::select($fieldName)->first()->{$fieldName};

        if (is_array($value)) {
            $flattenedIdUsersArray = collect($value)->flatten()->all();
        } else {
            $idUsersArray = json_decode($value, true);
            $flattenedIdUsersArray = collect($idUsersArray)->flatten()->all();
        }

        return $flattenedIdUsersArray;
    }
}
