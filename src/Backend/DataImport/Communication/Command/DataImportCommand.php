<?php

/**
 * This file is part of Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Backend\DataImport\Communication\Command;

use App\Backend\DataImport\Business\DataImportFacadeInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'data:import',
    description: 'Import data',
)]
class DataImportCommand extends Command
{
    private DataImportFacadeInterface $facade;

    /**
     * @param string|null $name
     */
    public function __construct(DataImportFacadeInterface $facade, string $name=null)
    {
        $this->facade = $facade;

        parent::__construct($name);
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $this->facade->import($io);

        return Command::SUCCESS;
    }
}
