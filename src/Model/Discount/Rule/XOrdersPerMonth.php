<?php

namespace CodingExercise\Model\Discount\Rule;

use CodingExercise\Model\Object\Purchase;
use Money\Money;

class XOrdersPerMonth implements RuleInterface
{
    private $ordersPerMonth;
    private $rate;
    private $history = [];

    public function __construct(int $ordersPerMonth, float $percent)
    {
        $this->ordersPerMonth = $ordersPerMonth;
        $this->rate = 1 + $percent / 100;
    }

    public function apply(Purchase $p)
    : Money
    {
        $this->register($p);
        if ($this->getCount($p) % $this->ordersPerMonth === 0) {
            return $p->getMoney()->multiply($this->rate);
        }
        return $p->getMoney();
    }

    private function register(Purchase $p)
    : void
    {
        $id = $p->getId();
        $ym = $p->getYearMonth();
        $this->history[$id][$ym] =
            isset($this->history[$id][$ym])
                ? $this->history[$id][$ym] + 1
                : 1;
    }

    private function getCount(Purchase $p)
    : int
    {
        $id = $p->getId();
        $ym = $p->getYearMonth();
        return $this->history[$id][$ym];
    }
}