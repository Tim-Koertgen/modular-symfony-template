<?php

/**
 * This file is part of the Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

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
