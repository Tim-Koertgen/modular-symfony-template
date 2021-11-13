<?php

namespace App\Backend\Team\Business\Reader;

use App\Backend\Team\Persistence\TeamRepository;
use App\Shared\TransferObject\TeamCollectionTransfer;
use App\Shared\TransferObject\TeamTransfer;

class TeamReader implements TeamReaderInterface
{
    /**
     * @var TeamRepository
     */
    private TeamRepository $teamRepository;

    /**
     * @param TeamRepository $teamRepository
     */
    public function __construct(TeamRepository $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    /**
     * @return TeamCollectionTransfer
     */
    public function list(): TeamCollectionTransfer
    {
        $teamEntities = $this->teamRepository->findAll();
        $teamCollectionTransfer = new TeamCollectionTransfer();

        foreach ($teamEntities as $teamEntity) {
            $teamTransfer = new TeamTransfer();
            $teamTransfer = $teamTransfer->fromArray($teamEntity->toArray());

            $teamCollectionTransfer->appendTeam($teamTransfer);
        }

        return $teamCollectionTransfer;
    }
}