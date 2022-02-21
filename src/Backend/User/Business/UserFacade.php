<?php

/**
 * This file is part of Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Backend\User\Business;

use App\Shared\User\Transfer\UserCollectionTransfer;
use App\Shared\User\Transfer\UserTransfer;

class UserFacade implements UserFacadeInterface
{
    /**
     * @var UserBusinessFactory
     */
    private UserBusinessFactory $factory;

    /**
     * @param UserBusinessFactory $factory
     */
    public function __construct(UserBusinessFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @return UserCollectionTransfer
     */
    public function list(): UserCollectionTransfer
    {
        return $this->factory
            ->createReader()
            ->list();
    }

    /**
     * @param UserTransfer $userTransfer
     * @return bool
     */
    public function exists(UserTransfer $userTransfer): bool
    {
        return $this->factory
            ->createReader()
            ->exists($userTransfer);
    }

    /**
     * @param UserTransfer $userTransfer
     * @param string $password
     * @return UserTransfer
     */
    public function create(UserTransfer $userTransfer, string $password): UserTransfer
    {
        return $this->factory
            ->createWriter()
            ->create($userTransfer, $password);
    }

    /**
     * @param UserTransfer $userTransfer
     * @param string|null $password
     */
    public function update(UserTransfer $userTransfer, string $password=null)
    {
        return $this->factory
            ->createWriter()
            ->update($userTransfer, $password);
    }
}
