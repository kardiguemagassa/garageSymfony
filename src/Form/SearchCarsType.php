<?php

namespace App\Form;

//use App\Classe\Search;
use App\Entity\SearchCars;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class SearchCarsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('minPrice', NumberType::class, [
                'label' => 'Prix Minimum:',
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('maxPrice', NumberType::class, [
                'label' => 'Prix Maximum:',
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('minKilometer', TextType::class, [
                'label' => 'Kilomètres Minimum:',
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('maxKilometer', TextType::class, [
                'label' => 'Kilomètres Maximum:',
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('minYear', IntegerType::class, [
                'label' => 'Année Minimum:',
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('maxYear', IntegerType::class, [
                'label' => 'Année Maximum:',
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('brand', TextType::class, [
                'label' => 'Marque:',
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('energy', ChoiceType::class, [
                'label' => 'Carburant:',
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ],
                'choices' => [
                    'DIESEL' => 'DIESEL',
                    'ESSENCE' => 'ESSENCE',
                    'GPL' => 'GPL',
                    'ELECTRIQUE' => 'ELECTRIQUE',
                ]
            ]);
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SearchCars::class,
            'method' => 'POST',
        ]);
    }
}