<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class,[
                'disabled' =>true,
                'label' => 'mon adresse email',
                'attr' => [
                    'style' => 'width: 50px',
                    'style' => 'height: 50px',
                ]
            ])
            ->add('firstname', TextType::class,[
                'disabled' =>true,
                'label' => 'mon prénom',
                'attr' => [
                    'style' => 'width: 50px',
                    'style' => 'height: 50px',
                ]
            ])
            ->add('lastname', TextType::class,[
                'disabled' =>true,
                'label' => 'mon nom',
                'attr' => [
                    'style' => 'width: 50px',
                    'style' => 'height: 50px',
                ]
            ])
            ->add('old_password', PasswordType::class, [
                'mapped' => false,
                'label' => 'mon mot de passe actuel',
                'attr'=>[
                    'placeholder' => "Veuillez saisir votre mot de passe actuel",
                    'style' => 'width: 50px',
                    'style' => 'height: 50px',
                ]
            ])
            // mot de passe et sa confirmation password. il ya deux façons de faire
            ->add('new_password', RepeatedType::class,[
                'type' => PasswordType::class,
                'mapped' => false,
                'invalid_message' => "Le mot de passe et la confirmation doivent être identique.",
                'label' =>'Mon nouveau mot de passe',
                'required' => true,
                'first_options' =>[
                    "label" => "Mon nouveau mot de passe",
                    "attr" => ["placeholder" => "Merci de saisir votre nouveau mot de passe",
                    'style' => 'width: 50px',
                    'style' => 'height: 50px',
                    ]
                ],
                'second_options' =>[
                    "label" => "Confirmez votre nouveau mot de passe",
                    "attr" =>["placeholder" => "Merci de confirmer votre nouveau mot de passe",
                    'style' => 'width: 50px',
                    'style' => 'height: 50px',
                    ]
                ]
            ])
            ->add('submit', SubmitType::class,[
                'label' => "Mettre à jour",
                'attr' =>[
                    'class' => 'btn-block ',
                    'style' => 'width: 50px',
                    'style' => 'height: 50px',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
