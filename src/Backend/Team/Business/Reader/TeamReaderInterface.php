<?php

namespace App\Backend\Team\Business\Reader;

use App\Shared\TransferObject\TeamCollectionTransfer;

interface TeamReaderInterface
{
    /**
     * @return TeamCollectionTransfer
     */
    public function list(): TeamCollectionTransfer;
}