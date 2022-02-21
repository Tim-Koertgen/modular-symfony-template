<?php

/**
 * This file is part of Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Backend\User\Business\Reader;

use App\Shared\User\Transfer\UserCollectionTransfer;
use App\Shared\User\Transfer\UserTransfer;

interface UserReaderInterface
{
    /**
     * @return UserCollectionTransfer
     */
    public function list(): UserCollectionTransfer;

    /**
     * @param UserTransfer $userTransfer
     * @return bool
     */
    public function exists(UserTransfer $userTransfer): bool;

    /**
     * @param int $idUser
     * @return UserTransfer|null
     */
    public function findByIdUser(int $idUser): ?UserTransfer;
}
