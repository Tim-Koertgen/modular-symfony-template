<?php

namespace App\Client\Team;

use App\Backend\Team\Business\TeamBusinessFacadeInterface;
use App\Shared\Team\Transfer\TeamCollectionTransfer;

class TeamClient implements TeamClientInterface
{
    /**
     * @var TeamBusinessFacadeInterface
     */
    private TeamBusinessFacadeInterface $teamFacade;

    /**
     * @param TeamBusinessFacadeInterface $teamFacade
     */
    public function __construct(TeamBusinessFacadeInterface $teamFacade)
    {
        $this->teamFacade = $teamFacade;
    }

    /**
     * @return TeamCollectionTransfer
     */
    public function list(): TeamCollectionTransfer
    {
        return $this->teamFacade->list();
    }
}
