<?php

namespace App\Backend\Team\Business\Reader;

use App\Shared\Team\TeamCollectionTransfer;

interface TeamReaderInterface
{
    /**
     * @return TeamCollectionTransfer
     */
    public function list(): TeamCollectionTransfer;
}