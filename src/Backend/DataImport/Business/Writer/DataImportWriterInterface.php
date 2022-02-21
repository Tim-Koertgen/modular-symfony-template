<?php

/**
 * This file is part of Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Backend\DataImport\Business\Writer;

use Symfony\Component\Console\Style\SymfonyStyle;

interface DataImportWriterInterface
{
    /**
     * @param SymfonyStyle|null $io
     * @return int
     */
    public function import(SymfonyStyle $io=null): int;
}
