<?php

namespace App\Backend\Team\Business\Reader;

use App\Backend\Team\Persistence\TeamRepository;
use App\Backend\Team\TeamConfig;
use App\Shared\Team\Transfer\TeamCollectionTransfer;
use App\Shared\Team\Transfer\TeamTransfer;

class TeamReader implements TeamReaderInterface
{
    /**
     * @var TeamRepository
     */
    private TeamRepository $teamRepository;

    /**
     * @var TeamConfig
     */
    private TeamConfig $teamConfig;

    /**
     * @param TeamRepository $teamRepository
     */
    public function __construct(TeamRepository $teamRepository, TeamConfig $teamConfig)
    {
        $this->teamRepository = $teamRepository;
        $this->teamConfig = $teamConfig;
    }

    /**
     * @return TeamCollectionTransfer
     */
    public function list(): TeamCollectionTransfer
    {
        $teamEntities = $this->teamRepository->findBy([], null, $this->teamConfig->getLimit());
        $teamCollectionTransfer = new TeamCollectionTransfer();

        foreach ($teamEntities as $teamEntity) {
            $teamTransfer = new TeamTransfer();
            $teamTransfer = $teamTransfer->fromArray($teamEntity->toArray());

            $teamCollectionTransfer->appendTeam($teamTransfer);
        }

        return $teamCollectionTransfer;
    }
}