<?php

/**
 * This file is part of Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Backend\User\Business\Writer;

use App\Backend\User\Persistence\UserEntity;
use App\Backend\User\Persistence\UserRepository;
use App\Shared\User\Transfer\UserTransfer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class UserWriter implements UserWriterInterface
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
     * @param UserTransfer $userTransfer
     * @param string $password
     * @return UserTransfer
     */
    public function create(UserTransfer $userTransfer, string $password): UserTransfer
    {
        $entity = new UserEntity();

        $entity = $entity->fromArray($userTransfer->toArray());
        $entity->setPassword($this->userPasswordHasher->hashPassword($entity, $password));

        $this->entityManager->persist($entity);
        $this->entityManager->flush();

        return $userTransfer;
    }

    /**
     * @param UserTransfer $userTransfer
     * @param string|null $password
     */
    public function update(UserTransfer $userTransfer, string $password=null)
    {
        $entity = $this->repository->findOneBy(['email' => $userTransfer->email]);

        if (isset($password)) {
            $entity->setPassword($this->userPasswordHasher->hashPassword($entity, $password));
        }

        /** @phpstan-ignore-next-line */
        $this->serializer->denormalize(
            $userTransfer->except('id')->toArray(),
            UserEntity::class,
            null,
            [AbstractNormalizer::OBJECT_TO_POPULATE => $entity]
        );

        $this->entityManager->flush();
    }
}
