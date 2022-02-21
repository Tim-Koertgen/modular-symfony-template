<?php

/**
 * This file is part of Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Shared\User\Transfer;

use Spatie\DataTransferObject\DataTransferObject;

class UserCollectionTransfer extends DataTransferObject
{
    /** @var UserTransfer[] $users */
    public ?array $users = [];
}
