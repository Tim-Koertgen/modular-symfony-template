<?php

/**
 * This file is part of the Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Backend\Team\Communication\Controller;

use App\Backend\Team\Persistence\TeamEntity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TeamEntityCrudController extends AbstractCrudController
{
    /**
     * @return string
     */
    public static function getEntityFqcn(): string
    {
        return TeamEntity::class;
    }
}
