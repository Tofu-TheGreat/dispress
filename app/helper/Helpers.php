<?php

if (!function_exists('currencyPhone')) {
    function currencyPhone($phone)
    {
        $phone = preg_replace('/[^\d]/', '', $phone);

        // Mengecek panjang nomor telepon
        if (strlen($phone) === 12) {
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

        $formatted = "{$ac}-{$prefix}-{$suffix}";
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
                break;
        }
        return $map[$value] ?? 'Tidak Diketahui';
    }
}

if (!function_exists('convertDisposisiField')) {
    function convertDisposisiField($value, $type)
    {
        switch ($type) {
            case 'sifat':
                $map = [
                    0 => 'Biasa',
                    1 => 'Prioritas',
                    2 => 'Rahasia',
                ];
                break;
            case 'status':
                $map = [
                    0 => 'Belum ditindak',
                    1 => 'Diajukan',
                    2 => 'Diterima',
                    3 => 'Dikembalikan',
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
