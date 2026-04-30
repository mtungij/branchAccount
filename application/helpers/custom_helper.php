<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('safe_number_format')) {
    function safe_number_format($value, $decimals = 0)
    {
        // Remove commas, force to float, then format
        return number_format(floatval(str_replace(',', '', $value)), $decimals);
    }
}
