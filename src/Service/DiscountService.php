<?php

namespace CodingExercise\Service;

use CodingExercise\Model\Discount\DiscountInterface;
use CodingExercise\Model\Object\Purchase;

class DiscountService
{
    /* @var DiscountInterface[] $discounts */
    private $discounts = [];

    /* @var DiscountInterface[] $discounts */
    public function __construct(array $discounts)
    {
        $this->discounts = $discounts;
    }

    public function apply(Purchase $p): float
    {
        foreach ($this->discounts as $discount) {
            $discount = $discount->apply($p);
        }
    }
}