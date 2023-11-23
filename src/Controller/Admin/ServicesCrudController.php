<?php

namespace App\Controller\Admin;

use App\Entity\Services;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ServicesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Services::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'Nom'),
            //TextField::new('slug', 'Slug'),
            SlugField::new('slug')->setTargetFieldName('title'),
            //pour utiliser il faut créer un dossier uploads le public
            ImageField::new('illustration')
                ->setBasePath('uploads/services')
                ->setUploadDir("public/uploads/services")
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false), 
            BooleanField::new('isBest'),
            TextareaField::new('description'),
            MoneyField::new('price', 'Prix')
                ->setCurrency('EUR')
                ->setCustomOption('storedAsCents', false),
            AssociationField::new('garages', 'Garage')
        ];
    }
    
}
