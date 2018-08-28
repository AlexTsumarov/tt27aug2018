<?php

namespace CodingExercise\Model\Currency;

use Money\Converter;
use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Exchange\FixedExchange;
use Money\Exchange\ReversedCurrenciesExchange;

class CurrencyFactory
{
    private $currencies = [];

    public function __construct(string $currCode)
    {
        $this->defaultCurrency = $this->getCurrency($currCode);
    }

    public function getConverter(array $exchangeRates)
    : Converter
    {
        $exchange = new ReversedCurrenciesExchange(
            new FixedExchange($exchangeRates)
        );
        return new Converter(new ISOCurrencies(), $exchange);
    }

    public function getCurrency($code)
    : Currency
    {
        if (!isset($this->currencies[$code])) {
            $this->currencies[$code] = new Currency($code);
        }
        return $this->currencies[$code];
    }

    public function getDefaultCurrency()
    {
        return $this->defaultCurrency;
    }
}