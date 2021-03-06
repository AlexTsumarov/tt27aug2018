<?php

namespace CodingExercise\Service;

use CodingExercise\Model\Object\Invoice;
use CodingExercise\Model\Object\Purchase;
use CodingExercise\Storage\OrderedStorageInterface;
use Money\Converter;
use Money\Currency;
use Money\Money;

/**
 * Class InvoiceService
 * @package CodingExercise\Service
 */
class InvoiceService
{
    /* @var DiscountService $discountService */
    private $discountService;
    /* @var OrderedStorageInterface $storage */
    private $storage;
    /* @var Converter $converter */
    private $converter;
    /* @var Currency $currency */
    private $currency;

    /**
     * InvoiceService constructor.
     * @param OrderedStorageInterface $storage
     * @param CurrencyService $currencyService
     * @param DiscountService $discountService
     */
    public function __construct(
        OrderedStorageInterface $storage,
        CurrencyService $currencyService,
        DiscountService $discountService
    )
    {
        $this->storage = $storage;
        $this->converter = $currencyService->getConverter();
        $this->discountService = $discountService;
        $this->currency = $currencyService->getDefaultCurrency();
    }

    public function generate()
    {
        foreach ($this->storage->getPurchases() as $p) {
            /* @var Purchase $p */
            $this->convertCurrency($p);
            $money = $this->discountService->apply($p);
            $invoice = $this->hydrate($p->getId(), $money);
            $this->storage->writeInvoice($invoice);
            unset($p, $i);
        }
    }

    /**
     * @param Purchase $p
     */
    private function convertCurrency(Purchase $p)
    {
        if (!$p->getMoney()->getCurrency()->equals($this->currency)) {
            $p->setMoney(
                $this->converter->convert(
                    $p->getMoney(),
                    $this->currency
                )
            );
        }
    }

    /**
     * Final value-object without any logic might be tested as is
     * */
    private function hydrate(int $id, Money $money)
    {
        return new Invoice($id, $money);
    }
}