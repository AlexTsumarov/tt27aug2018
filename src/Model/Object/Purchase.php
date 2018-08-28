<?php

namespace CodingExercise\Model\Object;

use Money\Money;

final class Purchase
{
    const DATE_FORMAT_YM = 'ym';

    /* @var int $id */
    private $id;
    /* @var \DateTimeImmutable $date */
    private $date;
    /* @var int $ym */
    private $ym;
    /* @var Money $money */
    private $money;

    public function __construct(int $id, \DateTimeImmutable $date, Money $money)
    {
        $this->id = $id;
        $this->date = $date;
        $this->ym = (int)$date->format(self::DATE_FORMAT_YM);
        $this->money = $money;
    }

    /**
     * @return int
     */
    public function getId()
    : int
    {
        return $this->id;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDate()
    : \DateTimeImmutable
    {
        return $this->date;
    }

    /**
     * @return int
     */
    public function getYearMonth()
    : int
    {
        return $this->ym;
    }

    /**
     * @return Money
     */
    public function getMoney()
    : Money
    {
        return $this->money;
    }

    /**
     * @return Purchase
     */
    public function setMoney(Money $money)
    {
        $this->money = $money;
        return $this;
    }
}