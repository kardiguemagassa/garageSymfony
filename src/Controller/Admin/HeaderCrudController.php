<?php

namespace App\Controller\Admin;

use App\Entity\Header;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class HeaderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Header::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'titre du header'),
            TextareaField::new('content', 'Contenu de notre header'),
            TextField::new('btnTitle', 'Titre de notre bouton'),
            TextField::new('btnUrl', 'Url de destination de notre bouton'),
            ImageField::new('illustration')
                ->setBasePath('uploads/headers')
                ->setUploadDir("public/uploads/headers")
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false), 
        ];
    }
    
}
