<?php

namespace CodingExercise\Model\Discount\Rule;

use CodingExercise\Model\Object\Purchase;
use Money\Currency;
use Money\Money;

class LastMonthTotal implements RuleInterface
{
    /* @var Money $threshold */
    private $threshold;
    /* @var float $rate */
    private $rate;
    /* @var Money[] $history */
    private $history = [];
    /* @var Currency $currency */
    private $currency;

    function __construct(Money $threshold, float $percent, Currency $curr)
    {
        $this->threshold = $threshold;
        $this->rate = 1 + $percent / 100;
        $this->currency = $curr;
    }

    function apply(Purchase $p)
    : Money
    {
        $this->register($p);
        $lastMonthTotal = $this->getLastMonthTotal($p);
        if ($lastMonthTotal && $lastMonthTotal->greaterThan($this->threshold)) {
            return $p->getMoney()->multiply($this->rate);
        }
        return $p->getMoney();
    }

    private function register(Purchase $p)
    : void
    {
        $ym = $p->getYearMonth();
        $this->history[$p->getId()][$ym] =
            isset($this->history[$p->getId()][$ym])
                ? $p->getMoney()->add($this->history[$p->getId()][$ym])
                : $p->getMoney();
    }

    private function getLastMonthTotal(Purchase $p)
    : Money
    {
        $lym = $p->getDate()->modify('-1 month')->format(Purchase::DATE_FORMAT_YM);
        return isset($this->history[$p->getId()][$lym])
            ? $this->history[$p->getId()][$lym]
            : new Money(0, $this->currency);
    }
}