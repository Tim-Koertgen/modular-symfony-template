<?php

/**
 * This file is part of Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Backend\DataImport\Business\Writer;

use App\Backend\DataImportUser\Business\DataImportUserFacadeInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class DataImportWriter implements DataImportWriterInterface
{
    /**
     * @var DataImportUserFacadeInterface
     */
    private DataImportUserFacadeInterface $dataImportUserFacade;

    /**
     * @param DataImportUserFacadeInterface $dataImportUserFacade
     */
    public function __construct(
        DataImportUserFacadeInterface $dataImportUserFacade,
    )
    {
        $this->dataImportUserFacade = $dataImportUserFacade;
    }

    /**
     * @param SymfonyStyle|null $io
     * @return int
     */
    public function import(SymfonyStyle $io=null): int
    {
        $total = $this->dataImportUserFacade->import($io);

        $io->success(sprintf('Total imported datasets: %s', $total));

        return $total;
    }
}
