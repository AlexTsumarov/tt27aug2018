<?php

namespace CodingExercise\Model\Discount\Rule;

use CodingExercise\Model\Object\Purchase;
use Money\Money;

interface RuleInterface
{
    function apply(Purchase $p): Money;
}