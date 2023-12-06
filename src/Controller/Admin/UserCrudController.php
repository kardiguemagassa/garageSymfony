<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

  
    public function configureFields(string $pageName): iterable
    {
         return [
            TextField::new('firstname', 'Prénom'),
            TextField::new('lastname', 'Nom'),
            EmailField::new('email', 'Email'),
            TextField::new('password', 'Mot de passe')
                ->onlyOnForms()
                ->setFormType(PasswordType::class),
            ChoiceField::new('roles', 'Rôles')
                ->allowMultipleChoices()
                ->setChoices([
                    'Administrateur' => 'ROLE_ADMIN',
                    'Employé' => 'ROLE_USER',
                    'Utilisateur' => 'ROLE_USER'
                ])
                ->renderAsBadges(),
            AssociationField::new('garages', 'Garage')
        ];
    }
      
}
