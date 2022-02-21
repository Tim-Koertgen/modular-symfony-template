<?php

/**
 * This file is part of Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Shared\User\Transfer;

use Spatie\DataTransferObject\DataTransferObject;

class UserTransfer extends DataTransferObject
{
    /** @var int|null $id */
    public ?int $id;

    /** @var string|null $email */
    public ?string $email;

    /** @var string[] $roles */
    public ?array $roles = [];
}
