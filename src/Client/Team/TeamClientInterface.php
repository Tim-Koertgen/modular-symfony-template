<?php

namespace App\Client\Team;

use App\Shared\Team\TeamCollectionTransfer;

interface TeamClientInterface
{
    /**
     * @return TeamCollectionTransfer
     */
    public function list(): TeamCollectionTransfer;
}