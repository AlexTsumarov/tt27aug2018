<?php
/**
 * Created by PhpStorm.
 * User: home
 * Date: 8/27/2018
 * Time: 11:23 PM
 */

namespace CodingExercise\Model\Discount\Rule;

use CodingExercise\Model\Object\Purchase;
use Money\Money;

class XOrdersPerMonth implements RuleInterface
{
    const DATE_FORMAT_YM = 'ym';
    private $ordersPerMonth;
    private $percent;
    private $history = [];

    function __construct(int $ordersPerMonth, float $percent)
    {
        $this->ordersPerMonth = $ordersPerMonth;
        $this->percent = 1 + $percent / 100;
    }

    function apply(Purchase $p): Money
    {
        if ($this->getCount($p) % $this->ordersPerMonth === 0) {
            $amount = $p->getMoney()->getAmount() * $this->percent;
            return new Money($amount, $p->getMoney()->getCurrency());
        } else {
            return $p->getMoney();
        }
    }

    private function getCount(Purchase $p): int
    {
        $ym = $p->getDate()->format($this::DATE_FORMAT_YM);
        $this->history[$p->getId()][$ym] =
            isset($hist)
                ? $this->history[$p->getId()][$ym] + 1
                : 1;
        return $this->history[$p->getId()][$ym];
    }
}