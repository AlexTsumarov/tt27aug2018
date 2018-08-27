<?php

namespace CodingExercise\Storage;

use CodingExercise\Model\Object\Invoice;

interface OrderedStorageInterface
{
    /**
     * @return array
     */
    function getPurchases(): \ArrayAccess;

    /**
     * @param Invoice $i
     * @return void
     */
    function writeInvoice(Invoice $i);
}