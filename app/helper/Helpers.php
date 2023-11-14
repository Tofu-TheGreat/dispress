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
