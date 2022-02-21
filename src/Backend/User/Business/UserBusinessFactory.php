<?php

/**
 * This file is part of Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Backend\User\Business;

use App\Backend\User\Business\Reader\UserReader;
use App\Backend\User\Business\Reader\UserReaderInterface;
use App\Backend\User\Business\Writer\UserWriter;
use App\Backend\User\Business\Writer\UserWriterInterface;
use App\Backend\User\Persistence\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Serializer\SerializerInterface;

class UserBusinessFactory
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    /**
     * @var UserPasswordHasherInterface
     */
    private UserPasswordHasherInterface $userPasswordHasher;

    /**
     * @var UserRepository
     */
    private UserRepository $repository;

    /**
     * @var SerializerInterface
     */
    private SerializerInterface $serializer;

    /**
     * @param EntityManagerInterface $entityManager
     * @param UserPasswordHasherInterface $userPasswordHasher
     * @param UserRepository $repository
     * @param SerializerInterface $serializer
     */
    public function __construct(EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasher, UserRepository $repository, SerializerInterface $serializer)
    {
        $this->entityManager      = $entityManager;
        $this->userPasswordHasher = $userPasswordHasher;
        $this->repository         = $repository;
        $this->serializer         = $serializer;
    }

    /**
     * @return UserReaderInterface
     */
    public function createReader(): UserReaderInterface
    {
        return new UserReader(
            $this->repository,
        );
    }

    /**
     * @return UserWriterInterface
     */
    public function createWriter(): UserWriterInterface
    {
        return new UserWriter(
            $this->entityManager,
            $this->userPasswordHasher,
            $this->repository,
            $this->serializer,
        );
    }
}
