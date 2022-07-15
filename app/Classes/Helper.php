<?php

namespace App\Classes;

class Helper {

    public static function get_number_with_letters($n)
    {
        $n = (float)$n;

        $format = number_format($n, 0, '.', ' ');

        // if ($n <= 9999 and $n >= -9999)  {
        //     $format = number_format($n, 0, '.', ' ');
        // } else if($n <= 999999 and $n >= -999999){
        //     $format = number_format($n/1e3, 0, '.', '') + 0 .'K';
        // } else if($n <= 999999999 and $n >= -999999999){
        //     $format = number_format($n/1e6, 2, '.', '') + 0 .' млн';
        // } else {
        //     $format = number_format($n/1e9, 2, '.', '') + 0 .' млрд';
        // }
        return $format;
    }

}
