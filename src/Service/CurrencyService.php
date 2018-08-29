<?php

namespace CodingExercise\Service;

use Money\Converter;
use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Exchange\FixedExchange;
use Money\Exchange\ReversedCurrenciesExchange;

class CurrencyService
{
    private $currencies    = [];
    private $exchangeRates = [];
    private $converter     = [];

    public function __construct(string $currCode, array $exchangeRates)
    {
        $this->exchangeRates = $exchangeRates;
        $exchanger = new ReversedCurrenciesExchange(
            new FixedExchange($this->exchangeRates)
        );
        $this->converter = new Converter(new ISOCurrencies(), $exchanger);
        $this->defaultCurrency = $this->getCurrency($currCode);
    }

    public function getConverter()
    : Converter
    {
        return $this->converter;
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