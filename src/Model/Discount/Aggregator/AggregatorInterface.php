<?php
/**
 * Created by PhpStorm.
 * User: home
 * Date: 8/27/2018
 * Time: 10:54 PM
 */

namespace CodingExercise\Model\Discount\Aggregator;

use Money\Money;

interface AggregatorInterface
{
    /**
     * @param array $discounts
     * @return Money
     * */
    function apply(array $discounts): Money;
}