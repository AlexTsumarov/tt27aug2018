<?php

namespace CodingExercise\Service;

use CodingExercise\Model\Currency\CurrencyFactory;
use CodingExercise\Model\Object\Invoice;
use CodingExercise\Model\Object\Purchase;
use CodingExercise\Storage\OrderedStorageInterface;
use Money\Converter;
use Money\Currency;
use Money\Money;

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

    public function __construct(
        OrderedStorageInterface $storage,
        CurrencyFactory $currencyFactory,
        DiscountService $discountService
    )
    {
        $this->storage = $storage;
        $this->converter = $currencyFactory->getConverter();
        $this->discountService = $discountService;
        $this->currency = $currencyFactory->getDefaultCurrency();
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