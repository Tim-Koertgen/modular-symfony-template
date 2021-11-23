<?php

namespace App\Backend\Team;

use App\Backend\Abstract\AbstractConfig;
use App\Shared\Team\TeamConstants;

class TeamConfig extends AbstractConfig
{
    /**
     * @return int
     */
    public function getLimit(): int
    {
        return (int)$this->get(TeamConstants::TEAM_LIMIT);
    }
}