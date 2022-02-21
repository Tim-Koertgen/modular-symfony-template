<?php

/**
 * This file is part of Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Backend\UserPassword\Business\Writer;

use App\Backend\User\Persistence\UserEntity;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserPasswordWriter implements UserPasswordWriterInterface
{
    /**
     * @var UserPasswordHasherInterface
     */
    private UserPasswordHasherInterface $userPasswordHasher;

    /**
     * @param UserPasswordHasherInterface $userPasswordHasher
     */
    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }

    /**
     * @param string $password
     * @return string
     */
    public function generate(string $password): string
    {
        $entity = new UserEntity();

        return $this->userPasswordHasher->hashPassword($entity, $password);
    }
}
