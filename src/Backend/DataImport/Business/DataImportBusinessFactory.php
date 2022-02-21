<?php

/**
 * This file is part of Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Backend\DataImport\Business;

use App\Backend\DataImport\Business\Writer\DataImportWriter;
use App\Backend\DataImport\Business\Writer\DataImportWriterInterface;
use App\Backend\DataImport\DataImportDependencyProvider;

class DataImportBusinessFactory
{
    /**
     * @var DataImportDependencyProvider
     */
    private DataImportDependencyProvider $dependencyProvider;

    /**
     * @param DataImportDependencyProvider $dependencyProvider
     */
    public function __construct(DataImportDependencyProvider $dependencyProvider)
    {
        $this->dependencyProvider = $dependencyProvider;
    }

    /**
     * @return DataImportWriterInterface
     */
    public function createWriter(): DataImportWriterInterface
    {
        return new DataImportWriter(
            $this->dependencyProvider->getDataImportUserFacade(),
        );
    }
}
