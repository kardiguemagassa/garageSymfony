<?php

namespace App\Controller\Admin;

use App\Entity\Cars;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CarsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cars::class;
    }

    
    public function configureFields(string $pageName): iterable
    {

        return [
            AssociationField::new('brand', 'Marque'),
            AssociationField::new('models', 'Modele'),
            NumberField::new('year','Année'),
            NumberField::new('kilometer','Kilometrage'),
            TextField::new('energy', 'Carburant'), 
            MoneyField::new('price', 'Prix')
                ->setCurrency('EUR')
                ->setCustomOption('storedAsCents', false),
            //pour utiliser il faut créer un dossier uploads le public 
            ImageField::new('image')
                ->setBasePath('uploads/cars')
                ->setUploadDir("public/uploads/cars")
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            BooleanField::new('isBest'), 
            TextareaField::new('description', 'Description'),
            AssociationField::new('garages', 'Garage'),
       
       ];

     }
    
}
