<?php

namespace App\Backend\Team\Communication\Controller;

use App\Backend\Team\Persistence\TeamEntity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TeamEntityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TeamEntity::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
