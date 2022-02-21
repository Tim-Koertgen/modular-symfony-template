<?php

/**
 * This file is part of Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Backend\DataImportUser\Business;

use Symfony\Component\Console\Style\SymfonyStyle;

class DataImportUserFacade implements DataImportUserFacadeInterface
{
    /**
     * @var DataImportUserBusinessFactory
     */
    private DataImportUserBusinessFactory $factory;

    /**
     * @param DataImportUserBusinessFactory $factory
     */
    public function __construct(DataImportUserBusinessFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param SymfonyStyle|null $io
     * @return int
     */
    public function import(SymfonyStyle $io=null): int
    {
        return $this->factory
            ->createWriter()
            ->import($io);
    }
}
