<?php

namespace CodingExercise\Model\Object;

use Money\Currency;
use Money\Money;

class ObjectFactory
{
    public static function getCurrency($code)
    {
        return new Currency($code);
    }

    public static function getPurchase($id, $date, $amount, $currencyCode)
    {
        return new Purchase(
            $id,
            new \DateTimeImmutable($date),
            new Money($amount, ObjectFactory::getCurrency($currencyCode))
        );
    }
}