<?php

/**
 * This file is part of Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Backend\DataImportUser\Business\Writer;

use App\Backend\User\Business\UserFacadeInterface;
use App\Shared\User\Transfer\UserTransfer;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Serializer\SerializerInterface;

class DataImportUserWriter implements DataImportUserWriterInterface
{
    /**
     * @var UserFacadeInterface
     */
    private UserFacadeInterface $userFacade;

    /**
     * @var Filesystem
     */
    private Filesystem $filesystem;

    /**
     * @var SerializerInterface
     */
    private SerializerInterface $serializer;

    /**
     * @var DataImportUserStepWriterInterface
     */
    private DataImportUserStepWriterInterface $stepWriter;

    /**
     * @param UserFacadeInterface $userFacade
     * @param Filesystem $filesystem
     * @param SerializerInterface $serializer
     * @param DataImportUserStepWriterInterface $stepWriter
     */
    public function __construct(UserFacadeInterface $userFacade, Filesystem $filesystem, SerializerInterface $serializer, DataImportUserStepWriterInterface $stepWriter)
    {
        $this->userFacade = $userFacade;
        $this->filesystem = $filesystem;
        $this->serializer = $serializer;
        $this->stepWriter = $stepWriter;
    }

    /**
     * @param SymfonyStyle|null $io
     * @return int
     */
    public function import(SymfonyStyle $io=null): int
    {
        $data = $this->getUserCsv();

        if (isset($io)) {
            $io->title('Importing user data');
            $io->createProgressBar();
            $io->progressStart(count($data));
        }

        foreach ($data as $row) {
            $userTransfer        = new UserTransfer();
            $userTransfer->email = $row['email'];
            $userTransfer->roles = json_decode($row['roles']);

            if (!$this->userFacade->exists($userTransfer)) {
                $this->stepWriter->writeUser($userTransfer, $row['password']);
            } else {
                $this->stepWriter->updateUser($userTransfer, $row['password']);
            }
        }

        if (isset($io)) {
            $io->progressAdvance();
        }

        if (isset($io)) {
            $io->progressFinish();
            $io->success(sprintf('Imported datasets: %s', count($data)));
        }

        return count($data);
    }

    /**
     * @return array
     */
    private function getUserCsv(): array
    {
        if ($this->filesystem->exists('data/import/common/user.csv')) {
            /** @phpstan-ignore-next-line */
            $data = $this->serializer->decode(
                file_get_contents('data/import/common/user.csv'),
                'csv',
                ['csv_delimiter' => ',']
            );

            return $data;
        }

        return [];
    }
}
