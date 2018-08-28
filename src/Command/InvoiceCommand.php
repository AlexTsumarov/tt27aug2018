<?php

namespace CodingExercise\Command;

use CodingExercise\Storage\CsvOrderedOrderedStorage;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class InvoiceCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('invoice:convert')
            ->setDescription('Converting purchases to invoices ')
            ->addArgument('in', InputArgument::REQUIRED, 'Path to purchases file')
            ->addArgument('out', InputArgument::REQUIRED, 'Path to invoices file');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $this->validateArgs($input);
        } catch (\InvalidArgumentException $e) {
            $output->writeln($e->getMessage());
            return;
        }

        $cb = new ContainerBuilder();
        $loader = new YamlFileLoader($cb, new FileLocator(__DIR__ . '/../'));
        $loader->load('Config/services.yaml');

        $cb->get('storage')
            ->setConfig(
                $input->getArgument('in'),
                $input->getArgument('out')
            );
        $cb->get('invoiceService')->generate();
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