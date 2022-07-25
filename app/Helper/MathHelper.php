<?php

namespace App\Helper;

class MathHelper
{
    public static function pangkat($a, $b)
    {
        $result = 1;
        for ($i = 1; $i <= abs($b); $i++) {
            if ($b > 0) // Untuk pangkat bernilai positif
                $result = $result * $a;
            else // Untuk pangkat bernilai negatif
                $result = $result / $a;
        }

        return $result;
    }
}
