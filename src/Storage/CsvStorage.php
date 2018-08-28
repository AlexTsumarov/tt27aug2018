<?php

namespace CodingExercise\Storage;

use CodingExercise\Model\Currency\CurrencyFactory;
use CodingExercise\Model\Object\Invoice;
use CodingExercise\Model\Object\Purchase;
use Money\Money;
use Psr\Log\LoggerAwareTrait;

/**
 * Class CsvStorage
 * @package CodingExercise\Storage
 */
class CsvStorage implements OrderedStorageInterface
{
    use LoggerAwareTrait;

    const ROW_DELIMITER = "\n";
    const COL_DELIMITER = ',';
    const POS_ID        = 0;
    const POS_DATE      = 1;
    const POS_AMOUNT    = 2;
    const POS_CURRENCY  = 3;

    /* @var \SplFileInfo $in */
    private $in;
    /* @var \SplFileInfo $out */
    private $out;
    /* @var CurrencyFactory $cf */
    private $cf;

    /**
     * CsvStorage constructor.
     * @param CurrencyFactory $currencyFactory
     * @param string $pathIn
     * @param string $pathOut
     */
    public function __construct(CurrencyFactory $cf, string $pathIn, string $pathOut)
    {
        $this->cf = $cf;
        $this->in = $pathIn;
        $this->out = $pathOut;
        @unlink($pathOut);
    }

    /**
     * @return Purchase[]
     */
    public function getPurchases()
    : \Iterator
    {
        $arr = [];
        $file = new \SplFileObject($this->in);
        $file->setFlags(\SplFileObject::READ_CSV);
        $file->setCsvControl(self::COL_DELIMITER);
        foreach ($file as $idx => $row) {
            $arr[] = $this->hydrate($row);
        }
        usort($arr, [$this, 'sortByDate']);
        return \SplFixedArray::fromArray($arr);
    }

    /**
     * @param Invoice $i
     */
    public function writeInvoice(Invoice $i)
    : void
    {
        $line = implode(self::COL_DELIMITER, [
                $i->getId(),
                $i->getAmount() / 100,
                $i->getCurrencyCode(),
            ]) . self::ROW_DELIMITER;
        file_put_contents($this->out, $line, FILE_APPEND);
        $this->logger->debug($line);
    }

    /**
     * @param array $csvRow
     * @return Purchase
     */
    private function hydrate(array $csvRow)
    {
        $id = $csvRow[self::POS_ID];
        $date = $csvRow[self::POS_DATE];
        $amount = $csvRow[self::POS_AMOUNT] * 100;
        $curr = $this->cf->getCurrency($csvRow[self::POS_CURRENCY]);
        return
            new Purchase(
                $id,
                new \DateTimeImmutable($date),
                new Money($amount, $curr)
            );
    }

    /**
     * @param Purchase $a
     * @param Purchase $b
     * @return bool
     */
    private function sortByDate(Purchase $a, Purchase $b)
    {
        return $a->getDate() > $b->getDate();
    }
}