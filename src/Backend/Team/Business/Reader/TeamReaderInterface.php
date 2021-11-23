<?php

namespace App\Backend\Team\Business\Reader;

use App\Shared\Team\Transfer\TeamCollectionTransfer;

interface TeamReaderInterface
{
    /**
     * @return TeamCollectionTransfer
     */
    public function list(): TeamCollectionTransfer;
}