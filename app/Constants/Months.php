<?php

namespace App\Constants;

class Months
{
    private static $monthsFromEnglishToSpanish = [
        'January' => 'Enero',
        'February' => 'Febrero',
        'March' => 'Marzo',
        'April' => 'Abril',
        'May' => 'Mayo',
        'June' => 'Junio',
        'July' => 'Julio',
        'August' => 'Agosto',
        'September' => 'Septiembre',
        'October' => 'Octubre',
        'November' => 'Noviembre',
        'December' => 'Diciembre',
    ];

    static function getMonthsFromEnglishToSpanish()
    {
        return self::$monthsFromEnglishToSpanish;
    }

    static function getMonthsInEnglish()
    {
        return array_keys(self::$monthsFromEnglishToSpanish);
    }

    static function getMonthsInSpanish()
    {
        return array_values(self::$monthsFromEnglishToSpanish);
    }
}
