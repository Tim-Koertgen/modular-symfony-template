<?php

/**
 * This file is part of the Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Shared\Team\Transfer;

use App\Core\Transfer\AbstractTransfer;
use ArrayObject;

class TeamCollectionTransfer extends AbstractTransfer
{
    /**
     * @var ArrayObject<TeamTransfer>
     */
    private ArrayObject $teams;

    /**
     * Construct
     */
    public function __construct()
    {
        $this->teams = new ArrayObject();
    }

    /**
     * @return ArrayObject<TeamTransfer>
     */
    public function getTeams(): ArrayObject
    {
        return $this->teams;
    }

    /**
     * @param ArrayObject<TeamTransfer> $teams
     */
    public function setTeams(ArrayObject $teams): void
    {
        $this->teams = $teams;
    }

    /**
     * @param TeamTransfer $teamTransfer
     */
    public function appendTeam(TeamTransfer $teamTransfer): void
    {
        $this->teams->append($teamTransfer);
    }

    /**
     * @param TeamTransfer $teamTransfer
     */
    public function removeTeam(TeamTransfer $teamTransfer): void
    {
        foreach ($this->teams as $key => $value) {
            if ($teamTransfer === $value) {
                $this->teams->offsetUnset($key);
            }
        }
    }

}
