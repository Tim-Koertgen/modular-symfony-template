<?php

namespace App\Backend\Team\Business;

use App\Backend\Team\Business\Reader\TeamReaderInterface;
use App\Shared\TransferObject\TeamCollectionTransfer;

class TeamBusinessFacade implements TeamBusinessFacadeInterface
{
    /**
     * @var TeamReaderInterface
     */
    private TeamReaderInterface $teamReader;

    /**
     * @param TeamReaderInterface $teamReader
     */
    public function __construct(TeamReaderInterface $teamReader)
    {
        $this->teamReader = $teamReader;
    }

    /**
     * @return TeamCollectionTransfer
     */
    public function list(): TeamCollectionTransfer
    {
        return $this->teamReader->list();
    }
}