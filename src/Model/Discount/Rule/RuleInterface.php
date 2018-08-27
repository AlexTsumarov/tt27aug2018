<?php

namespace CodingExercise\Model\Discount\Rule;

use CodingExercise\Model\Object\Purchase;
use Money\Money;

interface RuleInterface
{
    function getName(): string;

    function apply(Purchase $p): Money;
}