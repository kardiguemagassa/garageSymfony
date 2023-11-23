<?php

namespace App\Controller\Admin;

use App\Entity\Garages;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class GaragesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Garages::class;
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
