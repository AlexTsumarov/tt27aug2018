<?php

namespace CodingExercise\Command;

use CodingExercise\Model\Discount\Aggregator\CustomerMaxAmount;
use CodingExercise\Model\Discount\Rule\LastMonthTotal;
use CodingExercise\Model\Discount\Rule\NoDiscount;
use CodingExercise\Model\Discount\Rule\XOrdersPerMonth;
use CodingExercise\Service\DiscountService;
use CodingExercise\Service\InvoiceService;
use CodingExercise\Storage\CsvOrderedOrderedStorage;
use CodingExercise\Storage\CsvStorage;
use Money\Money;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class InvoiceBatchCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('invoice:generate')
            ->setDescription('Converting purchases to invoices ')
            ->addArgument('in', InputArgument::REQUIRED, 'Path to purchases file')
            ->addArgument('out', InputArgument::REQUIRED, 'Path to invoices file');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $cb = new ContainerBuilder();
        $loader = new YamlFileLoader($cb, new FileLocator(__DIR__ . '/../'));
        $loader->load('Config/services.yaml');

        try {
            $this->validateArgs($input);
        } catch (\InvalidArgumentException $e) {
            $output->writeln($e->getMessage());
            return;
        }

        $logger = $cb->get('logger');
        $currencyFactory = $cb->get('currencyFactory');
        $defaultCurrency = $currencyFactory->getDefaultCurrency();

        $discountService = new DiscountService(
            [
                new NoDiscount,
                new XOrdersPerMonth(3, 10),
                //new LastMonthTotal(new Money(10000, $defaultCurrency), 5, $defaultCurrency)
            ],
            new CustomerMaxAmount()
        );
        $discountService->setLogger($logger);

        $storage = new CsvStorage(
            $currencyFactory,
            $input->getArgument('in'),
            $input->getArgument('out')
        );
        $storage->setLogger($logger);

        $converter = $currencyFactory->getConverter([
            'EUR' => ['USD' => 1.21, 'GBP' => 0.87]
        ]);

        $invoiceService = new InvoiceService(
            $storage, $converter, $discountService, $defaultCurrency
        );

        $invoiceService->generate();
    }

    private function validateArgs(InputInterface $input)
    {
        $val = $input->getArgument('in');
        if (!file_exists($val)) {
            throw new \InvalidArgumentException(
                sprintf('Invalid argument `in`. The path %s does not exists', $val)
            );
        }
        if (!is_writable($val)) {
            throw new \InvalidArgumentException(
                sprintf('Invalid argument `out`. The path %s is not writable', $val)
            );
        }
    }
}