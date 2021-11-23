<?php

namespace App\Backend\Team;

use App\Core\AbstractConfig;
use App\Shared\Team\Config\TeamConstants;

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
