<?php

namespace CodingExercise\Model\Discount\Rule;

use CodingExercise\Model\Object\Purchase;
use Money\Currency;
use Money\Money;

class LastMonthTotal implements RuleInterface
{
    const DATE_FORMAT_YM = 'ym';
    private $threshold;
    private $percent;
    private $history = [];

    function __construct(int $threshold, float $percent)
    {
        $this->threshold = new Money($threshold, new Currency('eur'));
        $this->percent = $percent;
    }

    function apply(Purchase $p): Money
    {
        $this->register($p);
        $lastMonthTotal = $this->getLastMonthTotal($p);
        if ($lastMonthTotal && $lastMonthTotal->greaterThan($this->threshold)) {
            $amount = $p->getMoney()->getAmount() * $this->percent;
            return new Money($amount, $p->getMoney()->getCurrency());
        } else {
            return $p->getMoney();
        }
    }

    private function register(Purchase $p): void
    {
        $ym = $p->getDate()->format($this::DATE_FORMAT_YM);
        $this->history[$p->getId()][$ym] =
            isset($this->history[$p->getId()][$ym])
                ? $p->getMoney()->add($this->history[$p->getId()][$ym])
                : $p->getMoney();
    }

    private function getLastMonthTotal(Purchase $p): Money
    {
        $lym = $p->getDate()->modify('-1 month')->format($this::DATE_FORMAT_YM);
        return isset($this->history[$p->getId()][$lym])
            ? $this->history[$p->getId()][$lym]->getAmount()
            : new Money(0,new Currency('EUR'));
    }
}