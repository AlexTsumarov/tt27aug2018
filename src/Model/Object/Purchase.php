<?php

namespace CodingExercise\Model\Object;

use Money\Money;

class Purchase
{
    /* @var int $id */
    private $id;
    /* @var \DateTimeImmutable $date */
    private $date;
    /* @var Money $money */
    private $money;

    public function __construct(int $id, \DateTimeImmutable $date, Money $money)
    {
        $this->id = $id;
        $this->date = $date;
        $this->money = $money;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDate(): \DateTimeImmutable
    {
        return $this->date;
    }

    /**
     * @return Money
     */
    public function getMoney(): Money
    {
        return $this->money;
    }
}