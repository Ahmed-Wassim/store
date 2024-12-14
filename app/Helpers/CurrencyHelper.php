<?php

namespace App\Helpers;

class CurrencyHelper
{
    public static function format($amount, $currency = null)
    {
        $formatter = new \NumberFormatter('en', \NumberFormatter::CURRENCY);
        if (!$currency) {
            $currency = config('app.currency', 'USD');
        }
        return $formatter->formatCurrency($amount, $currency);
    }
}