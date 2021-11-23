<?php

/**
 * This file is part of the Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Backend\Team;

use App\Core\Config\AbstractConfig;
use App\Shared\Team\Config\TeamConstants;

class TeamConfig extends AbstractConfig
{

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return (int) $this->get(TeamConstants::TEAM_LIMIT);
    }

}
