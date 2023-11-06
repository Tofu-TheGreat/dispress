<?php

if (!function_exists('currencyPhone')) {
    function currencyPhone($phone)
    {
        $ac = substr($phone, 0, 4);
        $prefix = substr($phone, 4, 4);
        $suffix = substr($phone, 7);

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
