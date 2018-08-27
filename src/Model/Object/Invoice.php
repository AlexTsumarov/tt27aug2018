<?php

namespace CodingExercise\Model\Object;

use Money\Money;

class Invoice
{
    /* @var int $id */
    private $id;
    /* @var Money $money */
    private $money;

    public function __construct(int $id, Money $money)
    {
        $this->id = $id;
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
     * @return int
     */
    public function getAmount(): int
    {
        return $this->money->getAmount();
    }

    /**
     * @return string
     */
    public function getCurrencyCode(): string
    {
        return $this->money->getCurrency()->getCode();
    }
}