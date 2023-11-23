<?php

namespace App\Controller\Admin;

use App\Entity\Testimonials;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TestimonialsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Testimonials::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('author', 'Autheur'),
            TextareaField::new('message', 'Commentaire'),
            IntegerField::new('note', 'Note'),
            ImageField::new('illustration')
                ->setBasePath('uploads/avis')
                ->setUploadDir("public/uploads/avis")
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false), 
            BooleanField::new('validated', 'Validé'),
            AssociationField::new('garages', 'Garage')
        ];
    }
    
}
