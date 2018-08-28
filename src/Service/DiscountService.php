<?php

namespace CodingExercise\Service;

use CodingExercise\Model\Discount\Aggregator\AggregatorInterface;
use CodingExercise\Model\Discount\Rule\RuleInterface;
use CodingExercise\Model\Object\Purchase;
use Money\Money;
use Psr\Log\LoggerAwareTrait;

class DiscountService
{
    use LoggerAwareTrait;

    const ERR_NO_DISCOUNT = 'At least one discout should be defined';

    /* @var RuleInterface[] $rules */
    private $rules = [];
    /* @var AggregatorInterface $aggregator */
    private $aggregator;

    /**
     * @param RuleInterface[] $discounts
     * @param AggregatorInterface $aggregator
     */
    public function __construct(array $rules, AggregatorInterface $aggregator)
    {
        $this->rules = $rules;
        $this->aggregator = $aggregator;
        if (count($rules) == 0) {
            throw new \InvalidArgumentException(self::ERR_NO_DISCOUNT);
        }
    }

    /**
     * @param Purchase $p
     * @return Money
     */
    public function apply(Purchase $p)
    : Money
    {
        $discounts = [];
        foreach ($this->rules as $discount) {
            $discounts[] = $discount->apply($p);
        }
        return $this->aggregator->apply($discounts);
    }
}