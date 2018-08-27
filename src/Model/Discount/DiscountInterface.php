<?php

namespace CodingExercise\Model\Discount;

use CodingExercise\Model\Object\Purchase;

interface DiscountInterface
{
    function apply(Purchase $p): float;
}