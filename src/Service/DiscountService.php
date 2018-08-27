<?php

namespace CodingExercise\Service;

use CodingExercise\Model\Discount\Aggregator\AggregatorInterface;
use CodingExercise\Model\Discount\Rule\RuleInterface;
use CodingExercise\Model\Object\Purchase;
use Money\Money;

class DiscountService
{
    /* @var RuleInterface[] $discounts */
    private $discounts = [];
    /* @var AggregatorInterface $aggregator */
    private $aggregator;

    /**
     * @param RuleInterface[] $discounts
     * @param AggregatorInterface $aggregator
     */
    public function __construct(array $discounts, AggregatorInterface $aggregator)
    {
        $this->discounts = $discounts;
        $this->aggregator = $aggregator;
    }

    /**
     * @param Purchase $p
     * @return Money
     */
    public function apply(Purchase $p): Money
    {
        $moneys = [];
        foreach ($this->discounts as $discount) {
            $moneys[] = $discount->apply($p);
        }
        return $this->aggregator->getMoney($moneys);
    }
}