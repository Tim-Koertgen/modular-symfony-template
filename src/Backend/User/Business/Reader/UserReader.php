<?php

/**
 * This file is part of Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Backend\User\Business\Reader;

use App\Backend\User\Persistence\UserEntity;
use App\Backend\User\Persistence\UserRepository;
use App\Shared\User\Transfer\UserCollectionTransfer;
use App\Shared\User\Transfer\UserTransfer;

class UserReader implements UserReaderInterface
{
    /**
     * @var UserRepository
     */
    private UserRepository $repository;

    /**
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return UserCollectionTransfer
     */
    public function list(): UserCollectionTransfer
    {
        $userEntities           = $this->repository->findAll();
        $userCollectionTransfer = new UserCollectionTransfer();

        foreach ($userEntities as $userEntity) {
            $userTransfer = new UserTransfer($userEntity->toArray());

            array_push($userCollectionTransfer->users, $userTransfer);
        }

        return $userCollectionTransfer;
    }

    /**
     * @param UserTransfer $userTransfer
     * @return bool
     */
    public function exists(UserTransfer $userTransfer): bool
    {
        $entity = $this->repository->findOneBy(['email' => $userTransfer->email]);

        return $entity instanceof UserEntity;
    }

    /**
     * @param int $idUser
     * @return UserTransfer|null
     */
    public function findByIdUser(int $idUser): ?UserTransfer
    {
        $entity = $this->repository->findOneBy(['id' => $idUser]);

        if ($entity instanceof UserEntity) {
            return new UserTransfer($entity->toArray());
        }

        return null;
    }
}
