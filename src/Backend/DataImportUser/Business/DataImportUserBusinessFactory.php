<?php

/**
 * This file is part of Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Backend\DataImportUser\Business;

use App\Backend\DataImportUser\Business\Writer\DataImportUserStepWriterInterface;
use App\Backend\DataImportUser\Business\Writer\DataImportUserWriter;
use App\Backend\DataImportUser\Business\Writer\DataImportUserWriterInterface;
use App\Backend\User\Business\UserFacadeInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Serializer\SerializerInterface;

class DataImportUserBusinessFactory
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
     * @return DataImportUserWriterInterface
     */
    public function createWriter(): DataImportUserWriterInterface
    {
        return new DataImportUserWriter(
            $this->userFacade,
            $this->filesystem,
            $this->serializer,
            $this->stepWriter,
        );
    }
}
