<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//creating encrypted string
if (!function_exists('hash_input')) {
    function hash_input($string)
    {
        return hash('sha512', $string . config_item('encryption_key'));
    }
}
//generate random string
if (!function_exists('random_string')) {
    function random_string($maximum_string = 6)
    {
        return substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"), 0, $maximum_string);
    }
}
if (!function_exists('base64_encode_image')) {
    function base64_encode_image($path = '')
    {
        if ($path) {
            $filetype = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            return 'data:image/' . $filetype . ';base64,' . base64_encode($data);
        }
    }
}
?>