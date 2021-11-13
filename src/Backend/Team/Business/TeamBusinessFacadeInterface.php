<?php

namespace App\Backend\Team\Business;

use App\Shared\TransferObject\TeamCollectionTransfer;

interface TeamBusinessFacadeInterface
{
    /**
     * @return TeamCollectionTransfer
     */
    public function list(): TeamCollectionTransfer;
}