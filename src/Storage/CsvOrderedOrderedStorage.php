<?php

namespace CodingExercise\Storage;

use CodingExercise\Model\Object\Invoice;
use CodingExercise\Model\Object\Purchase;
use Money\Currency;
use Money\Money;

class CsvOrderedOrderedStorage implements OrderedStorageInterface
{
    const POS_ID = 0;
    const POS_DATE = 1;
    const POS_AMOUNT = 2;
    const POS_CURRENCY = 3;

    /* @var \SplFileInfo $in */
    private $in;
    /* @var \SplFileInfo $out */
    private $out;

    public function __construct(string $in, string $out)
    {
        $this->in = ($in);
        $this->out = ($out);
    }

    /**
     * @return Purchase[]
     */
    function getPurchases(): \ArrayAccess
    {
        $file = new \SplFileObject($this->in);
        $file->setFlags(\SplFileObject::READ_CSV);
        $file->seek(PHP_INT_MAX);

        $rowsCount = $file->key() + 1;
        $arr = new \SplFixedArray($rowsCount);
        $file->rewind();

        foreach ($file as $idx => $row) {
            $arr[$idx] = new Purchase(
                $row[self::POS_ID],
                new \DateTimeImmutable($row[self::POS_DATE]),
                new Money($row[self::POS_AMOUNT] * 100, new Currency($row[self::POS_CURRENCY]))
            );
        }
        return $arr;
    }

    function writeInvoice(Invoice $i): void
    {
        // TODO: Implement writeInvoice() method.
    }
}