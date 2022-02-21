<?php

/**
 * This file is part of Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Backend\UserPassword\Business;

use App\Backend\UserPassword\Business\Writer\UserPasswordWriter;
use App\Backend\UserPassword\Business\Writer\UserPasswordWriterInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserPasswordBusinessFactory
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
     * @return UserPasswordWriterInterface
     */
    public function createWriter(): UserPasswordWriterInterface
    {
        return new UserPasswordWriter(
            $this->userPasswordHasher,
        );
    }
}
