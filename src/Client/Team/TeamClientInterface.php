<?php

namespace App\Client\Team;

use App\Shared\TransferObject\TeamCollectionTransfer;

interface TeamClientInterface
{
    /**
     * @return TeamCollectionTransfer
     */
    public function list(): TeamCollectionTransfer;
}