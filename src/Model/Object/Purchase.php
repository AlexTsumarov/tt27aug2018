<?php

namespace CodingExercise\Model\Object;

class Purchase
{
    /* @var int $id */
    private $id;
    /* @var \DateTimeImmutable $date */
    private $date;
    /* @var float $amount */
    private $amount;
    /* @var Currency $currency */
    private $currency;

    public function __construct(int $id, \DateTimeImmutable $date, float $amount, Currency $currency)
    {
        $this->id = $id;
        $this->date = $date;
        $this->amount = $amount;
        $this->currency = $currency;
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
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @return Currency
     */
    public function getCurrency(): Currency
    {
        return $this->currency;
    }
}