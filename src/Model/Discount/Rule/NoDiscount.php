<?php

namespace CodingExercise\Model\Discount\Rule;

use CodingExercise\Model\Object\Purchase;
use Money\Money;

class NoDiscount implements RuleInterface
{
    function apply(Purchase $p)
    : Money
    {
        return $p->getMoney();
    }
}