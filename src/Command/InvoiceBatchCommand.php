<?php

namespace CodingExercise\Command;

use CodingExercise\Model\Converter\ConverterFactory;
use CodingExercise\Model\Discount\Aggregator\CustomerMaxAmount;
use CodingExercise\Model\Discount\Rule\LastMonthTotal;
use CodingExercise\Model\Discount\Rule\XOrdersPerMonth;
use CodingExercise\Service\DiscountService;
use CodingExercise\Service\InvoiceService;
use CodingExercise\Storage\CsvOrderedOrderedStorage;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InvoiceBatchCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('invoice:generate')
            ->setDescription('Converting purchases to invoices ')
            ->addArgument('in', InputArgument::REQUIRED, 'Path to purchases file (in)')
            ->addArgument('out', InputArgument::REQUIRED, 'Path to invoices file (out)');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $this->validateArgs($input);
        } catch (\InvalidArgumentException $e) {
            $output->writeln($e->getMessage());
            return;
        }

        $discountService = new DiscountService(
            [
                new XOrdersPerMonth(3, 10),
                new LastMonthTotal(10000, 5)
            ],
            new CustomerMaxAmount()
        );

        $storage = new CsvOrderedOrderedStorage(
            $input->getArgument('in'),
            $input->getArgument('out')
        );

        $converter = ConverterFactory::getConverter();

        $invoiceService = new InvoiceService($storage, $converter, $discountService);

        $invoiceService->generate();

        $output->writeln('done');
    }

    private function validateArgs(InputInterface $input)
    {
        $val = $input->getArgument('in');
        if (!file_exists($val)) {
            throw new \InvalidArgumentException(sprintf('Invalid argument `in`. The path %s does not exists', $val));
        }
        if (!is_writable($val)) {
            throw new \InvalidArgumentException(sprintf('Invalid argument `out`. The path %s is not writable', $val));
        }
    }
}