<?php
/**
 * Created by PhpStorm.
 * User: home
 * Date: 8/27/2018
 * Time: 10:14 PM
 */

namespace CodingExercise\Service;

use CodingExercise\Model\Object\Currency;
use CodingExercise\Model\Object\Invoice;
use CodingExercise\Model\Object\Purchase;
use CodingExercise\Storage\StorageInterface;

class InvoiceService
{
    /* @var DiscountService $discountService */
    private $discountService;
    /* @var StorageInterface $storage */
    private $storage;

    public function __construct(
        StorageInterface $storage,
        DiscountService $discountService
    )
    {
        $this->storage = $storage;
        $this->discountService = $discountService;
    }

    public function generate()
    {
        foreach ($this->storage->getPurchase() as $p) {
            $this->storage->writeInvoice($this->calcInvoice($p));
        }
    }

    private function calcInvoice(Purchase $p): Invoice
    {
        return new Invoice(
            $p->getId(),
            $this->discountService->apply($p)
        );
    }
}