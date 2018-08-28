<?php

namespace CodingExercise\Model\Discount\Aggregator;

use Money\Money;

class CustomerMaxAmount implements AggregatorInterface
{
    /**
     * @param array $discounts
     * @return Money
     * */
    function apply(array $discounts): Money
    {
        return max($discounts);
    }
}