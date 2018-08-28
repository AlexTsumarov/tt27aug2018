<?php
/**
 * Created by PhpStorm.
 * User: home
 * Date: 8/28/2018
 * Time: 8:25 AM
 */

namespace CodingExercise\Model\Converter;

use Money\Converter;
use Money\Exchange\FixedExchange;

class ConverterFactory
{
    public static function getConverter(): Converter
    {
        $conv = new FixedExchange(['EUR' => ['USD' => 1.25]]);
        return $conv;
    }
}