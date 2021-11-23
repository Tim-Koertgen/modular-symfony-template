<?php

namespace App\Backend\Team\Business;

use App\Shared\Team\TeamCollectionTransfer;

interface TeamBusinessFacadeInterface
{
    /**
     * @return TeamCollectionTransfer
     */
    public function list(): TeamCollectionTransfer;
}