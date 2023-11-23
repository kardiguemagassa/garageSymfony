<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class,[
                'label' =>'Votre prénom',
                'constraints' => new Length([
                    'min' => 2, 
                    'max' => 30
                ]),
                'attr' =>[
                    'placeholder' =>'Merci de saisir votre prénom',
                    'style' => 'width: 50px',
                    'style' => 'height: 50px',
                ]
            ])
            ->add('lastname', TextType::class,[
                'label' =>'Votre nom',
                'constraints' => new Length([
                    'min' => 2, 
                    'max' => 30
                ]),
                'attr' =>[
                    'placeholder' =>'Merci de saisir votre nom',
                    'style' => 'width: 50px',
                    'style' => 'height: 50px',
                ]
            ])
            ->add('email', EmailType::class,[
                'label' =>'Votre email',
                'constraints' => new Length([
                    'min' => 2, 
                    'max' => 60
                ]),
                'attr' =>[
                    'placeholder' =>'Merci de saisir votre adresse email',
                    'style' => 'width: 50px',
                    'style' => 'height: 50px',
                ]
            ])
            // mot de passe et sa confirmation password. il ya deux façons de faire
            ->add('password', RepeatedType::class,[
                'type' => PasswordType::class,
                'invalid_message' => "Le mot de passe et la confirmation doivent être identique.",
                'label' =>'Votre mot de passe',
                'required' => true,
                'first_options' =>[
                    "label" => "Mot de passe",
                    "attr" => ["placeholder" => "Merci de saisir votre mot de passe",
                    'style' => 'width: 50px',
                    'style' => 'height: 50px',
                    ]
                ],
                'second_options' =>[
                    "label" => "Confirmez votre mot de passe",
                    "attr" =>["placeholder" => "Merci de confirmer votre mot de passe",
                    'style' => 'width: 50px',
                    'style' => 'height: 50px',
                    ]
                ]
            ])
            // confirmation password
            // ->add('password_confirm', PasswordType::class,[
            //     'label' => "confirmez votre mot de passe",
            //     'mapped' =>false,
            //     'attr' =>[
            //         'placeholder' =>'Confirmez votre mot de passe'
            //     ]
            // ])
            ->add('submit', SubmitType::class,[
                'label' => "s'inscrire",
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
