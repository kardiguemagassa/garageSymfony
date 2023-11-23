<?php

namespace App\Controller\Admin;

use App\Entity\Schedules;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SchedulesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Schedules::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('openedDays', 'Jour d\'ouverture'),
            TextField::new('hoursPM', 'Heures d\'ouverture'),
            TextField::new('hoursAM', 'Heures de fermeture'),
            AssociationField::new('garages', 'Garage')
        ];
    }
    
}
