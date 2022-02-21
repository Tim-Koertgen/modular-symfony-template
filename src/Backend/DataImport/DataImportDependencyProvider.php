<?php

/**
 * This file is part of Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Backend\DataImport;

use App\Backend\DataImportUser\Business\DataImportUserFacadeInterface;

class DataImportDependencyProvider
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
     * @return DataImportUserFacadeInterface
     */
    public function getDataImportUserFacade(): DataImportUserFacadeInterface
    {
        return $this->dataImportUserFacade;
    }
}
