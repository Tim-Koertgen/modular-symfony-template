<?php

/**
 * This file is part of Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Backend\User\Business\Writer;

use App\Shared\User\Transfer\UserTransfer;

interface UserWriterInterface
{
    /**
     * @param UserTransfer $userTransfer
     * @param string $password
     * @return UserTransfer
     */
    public function create(UserTransfer $userTransfer, string $password): UserTransfer;

    /**
     * @param UserTransfer $userTransfer
     * @param string|null $password
     */
    public function update(UserTransfer $userTransfer, string $password=null);
}
