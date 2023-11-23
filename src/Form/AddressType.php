<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', TextType::class,[
            'label' =>"Quel nom souhaitez-vous donner à votre addresse",
            'attr' =>[
                'placeholder' => "Nommez votre addresse",
                'class' => 'form-control',
                'style' => 'width: 50px',
                'style' => 'height: 50px',
            ]
        ])
        ->add('firstname', TextType::class,[
            'label' =>"Votre pénom",
            'attr' =>[
                'placeholder' => "Entrez votre prénom",
                'class' => 'form-control',
                'style' => 'width: 50px',
                'style' => 'height: 50px',
            ]
        ])
        ->add('lastname', TextType::class,[
            'label' =>"Votre nom",
            'attr' =>[
                'placeholder' => "Entrez votre nom",
                'class' => 'form-control',
                'style' => 'width: 50px',
                'style' => 'height: 50px',
            ]
        ])
        ->add('company', TextType::class,[
            'label' =>"Votre société ",
            'attr' =>[
                'placeholder' => "(facultatif) Entrez le nom de votre société",
                'class' => 'form-control',
                'style' => 'width: 50px',
                'style' => 'height: 50px',
            ]
        ])

        ->add('address', TextType::class,[
            'label' =>"Votre addresse",
            'attr' =>[
                'placeholder' => "8 rue des lylas ...",
                'class' => 'form-control',
                'style' => 'width: 50px',
                'style' => 'height: 50px',
            ]
        ])
        ->add('postal', TextType::class,[
            'label' =>"Votre code postal",
            'attr' =>[
                'placeholder' => "Entrez votre code postal",
                'class' => 'form-control',
                'style' => 'width: 50px',
                'style' => 'height: 50px',
            ]
        ])
        ->add('city', TextType::class,[
            'label' =>"Ville",
            'attr' =>[
                'placeholder' => "Entrez votre ville",
                'class' => 'form-control',
                'style' => 'width: 50px',
                'style' => 'height: 50px',
            ]
        ])
        ->add('country', CountryType::class,[
            'label' =>'Pays',
            'attr' =>[
                'placehoder' => "Votre pays",
                'class' => "form-control",
                'style' => 'width: 50px',
                'style' => 'height: 50px',
            ]
        ])
        ->add('phone', TelType::class,[
            'label' =>"Votre téléphone",
            'attr' =>[
                'placeholder' => "Votre téléphone",
                'class' => 'form-control',
                'style' => 'width: 50px',
                'style' => 'height: 50px',
            ]
        ])
        ->add('submit', SubmitType::class,[
            'label' => 'Valider',
            'attr'=>[
                'class' => 'btn btn-block',
                'style' => 'width: 50px',
                'style' => 'height: 50px',
            ]
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
