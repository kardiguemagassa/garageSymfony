<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom', TextType::class,[
                'label' => 'Votre prénom',
                'attr' =>[
                    'placeholder' => 'Merci de saisir prénom',
                    'class' => 'form-control',
                    'style' => 'width: 50px',
                    'style' => 'height: 50px',
                ]
            ])
            ->add('nom', TextType::class,[
                'label' => 'Votre nom',
                'attr' =>[
                    'placeholder' => 'Merci de saisir nom',
                    'style' => 'width: 50px',
                    'style' => 'height: 50px',
                ]
            ])
            ->add('email', EmailType::class,[
                'label' => 'Votre email',
                'attr' =>[
                    'placeholder' => 'Merci de saisir votre addresse email',
                    'style' => 'width: 50px',
                    'style' => 'height: 50px',
                ]
            ])
            ->add('content', TextareaType::class,[
                'label' => 'Votre message',
                'attr' =>[
                    'placeholder' => 'En quoi pouvons-nous vous aider ?',
                    'style' => 'width: 50px',
                    'style' => 'height: 50px',
                ]
            ])
             ->add('submit', SubmitType::class,[
                'label' => 'Envoyer',
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
            // Configure your form options here
        ]);
    }
}
