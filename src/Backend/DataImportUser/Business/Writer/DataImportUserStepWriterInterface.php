<?php

/**
 * This file is part of Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Backend\DataImportUser\Business\Writer;

use App\Shared\User\Transfer\UserTransfer;

interface DataImportUserStepWriterInterface
{
    /**
     * @param UserTransfer $userTransfer
     * @param string $password
     */
    public function writeUser(UserTransfer $userTransfer, string $password);

    /**
     * @param UserTransfer $userTransfer
     * @param string $password
     */
    public function updateUser(UserTransfer $userTransfer, string $password);
}
