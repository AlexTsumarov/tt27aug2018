<?php

namespace CodingExercise\Storage;

use CodingExercise\Model\Object\Invoice;
use CodingExercise\Model\Object\Purchase;

interface StorageInterface
{
    /**
     * @return Purchase[]
     */
    function getPurchase(): \Iterator;

    /**
     * @param Invoice $i
     * @return void
     */
    function writeInvoice(Invoice $i);
}