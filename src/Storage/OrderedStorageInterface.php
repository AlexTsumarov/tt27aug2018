<?php

namespace CodingExercise\Storage;

use CodingExercise\Model\Object\Invoice;

interface OrderedStorageInterface
{
    /**
     * @return \Iterator
     */
    function getPurchases()
    : \Iterator;

    /**
     * @param Invoice $i
     * @return void
     */
    function writeInvoice(Invoice $i);
}