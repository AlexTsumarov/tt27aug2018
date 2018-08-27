<?php

namespace CodingExercise\Model\Object;

class Invoice
{
    /* @var int $id */
    private $id;
    /* @var float $amount */
    private $amount;
    /* @var Currency $currency */
    private $currency;

    public function __construct(int $id, float $amount, Currency $currency)
    {
        $this->id = $id;
        $this->amount = $amount;
        $this->currency = $currency;
    }
}