<?php

/**
 * This file is part of Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Backend\DataImportUser\Communication\Command;

use App\Backend\DataImportUser\Business\DataImportUserFacadeInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'data:import:user',
    description: 'Import user data',
)]
class DataImportUserCommand extends Command
{
    /**
     * @var DataImportUserFacadeInterface
     */
    private DataImportUserFacadeInterface $facade;

    /**
     * @param DataImportUserFacadeInterface $facade
     * @param string|null $name
     */
    public function __construct(DataImportUserFacadeInterface $facade, string $name=null)
    {
        parent::__construct($name);

        $this->facade = $facade;
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
