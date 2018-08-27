<?php

namespace CodingExercise\Storage;

use CodingExercise\Model\Object\Invoice;

class CsvStorage implements StorageInterface
{
    /* @var \SplFileInfo $in */
    private $in;
    /* @var \SplFileInfo $out */
    private $out;

    public function __construct(string $in, string $out)
    {
        $this->in = new \SplFileInfo($in);
        $this->out = new \SplFileInfo($out);
    }

    function getPurchase(): \Iterator
    {

    }

    function writeInvoice(Invoice $i): void
    {
        // TODO: Implement writeInvoice() method.
    }
}