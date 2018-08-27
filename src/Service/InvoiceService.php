<?php
/**
 * Created by PhpStorm.
 * User: home
 * Date: 8/27/2018
 * Time: 10:14 PM
 */

namespace CodingExercise\Service;

use CodingExercise\Model\Object\Invoice;
use CodingExercise\Model\Object\Purchase;
use CodingExercise\Storage\OrderedStorageInterface;

class InvoiceService
{
    /* @var DiscountService $discountService */
    private $discountService;
    /* @var OrderedStorageInterface $storage */
    private $storage;

    public function __construct(
        OrderedStorageInterface $storage,
        DiscountService $discountService
    )
    {
        $this->storage = $storage;
        $this->discountService = $discountService;
    }

    public function generate()
    {
        foreach ($this->storage->getPurchases() as $p) {
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