<?php

/**
 * This file is part of Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Backend\UserPassword\Communication\Command;

use App\Backend\UserPassword\Business\UserPasswordFacadeInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'user:password:generate',
    description: 'Generates an user password',
)]
class UserPasswordCommand extends Command
{
    /**
     * @var UserPasswordFacadeInterface
     */
    private UserPasswordFacadeInterface $facade;

    /**
     * @param UserPasswordFacadeInterface $facade
     * @param string|null $name
     */
    public function __construct(UserPasswordFacadeInterface $facade, string $name=null)
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

        $io->title('Generating user password');
        $password = (string) $io->askHidden('Enter password');

        $generatedPassword = $this->facade->generate($password);
        $io->success(sprintf('Generated password: %s', $generatedPassword));

        return Command::SUCCESS;
    }
}
