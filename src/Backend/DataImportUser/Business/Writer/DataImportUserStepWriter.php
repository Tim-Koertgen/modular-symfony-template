<?php

/**
 * This file is part of Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Backend\DataImportUser\Business\Writer;

use App\Shared\User\Transfer\UserTransfer;
use Doctrine\DBAL\Statement;
use Doctrine\ORM\EntityManagerInterface;

class DataImportUserStepWriter implements DataImportUserStepWriterInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param UserTransfer $userTransfer
     * @param string $password
     */
    public function writeUser(UserTransfer $userTransfer, string $password)
    {
        $connection = $this->entityManager->getConnection();

        $transaction = file_get_contents('src/Backend/DataImportUser/Persistence/transaction_insert.sql');

        $statement = $connection->prepare($transaction);
        $this->bindStatement($statement, $userTransfer);
        $statement->bindValue('password', $password);

        $statement->executeQuery();
    }

    /**
     * @param Statement $statement
     * @param UserTransfer $userTransfer
     */
    private function bindStatement(Statement $statement, UserTransfer $userTransfer)
    {
        $statement->bindValue('email', $userTransfer->email);
        $statement->bindValue('roles', json_encode($userTransfer->roles));
    }

    /**
     * @param UserTransfer $userTransfer
     * @param string $password
     */
    public function updateUser(UserTransfer $userTransfer, string $password)
    {
        $connection = $this->entityManager->getConnection();

        $transaction = file_get_contents('src/Backend/DataImportUser/Persistence/transaction_update.sql');

        $statement = $connection->prepare($transaction);
        $this->bindStatement($statement, $userTransfer);
        $statement->bindValue('password', $password);

        $statement->executeQuery();
    }
}
