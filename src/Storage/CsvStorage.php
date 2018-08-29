<?php

namespace CodingExercise\Storage;

use CodingExercise\Model\Object\Invoice;
use CodingExercise\Model\Object\Purchase;
use CodingExercise\Service\CurrencyService;
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

    /* @var CurrencyService $cf */
    private $cf;
    private $pathIn;
    private $pathOut;

    /**
     * CsvStorage constructor.
     * @param CurrencyService $currencyService
     */
    public function __construct(CurrencyService $cf)
    {
        $this->cf = $cf;
    }

    public function setConfig(string $pathIn, string $pathOut)
    {
        $this->pathIn = $pathIn;
        $this->pathOut = $pathOut;
        @unlink($this->pathOut);
    }

    /**
     * @return Purchase[]
     */
    public function getPurchases()
    : \Iterator
    {
        $arr = [];
        $file = new \SplFileObject($this->pathIn);
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
        file_put_contents($this->pathOut, $line, FILE_APPEND);
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