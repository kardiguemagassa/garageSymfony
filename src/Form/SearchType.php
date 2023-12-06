<?php

namespace App\Form;

use App\Entity\Brand;
use App\Classe\Search;
use App\Entity\Models;
use App\Entity\Category;
use App\Form\SearchType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class SearchType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options): void {
        
        // Ne pas supprimer cette class

        $builder
            // ->add('string', TextType::class,[
            //     'label' => false,
            //     'required' => false,
            //     'attr' =>[
            //         'placeholder' => 'Votre rechreche ... ',
            //         //pour la taille de search bar
            //         //'class' =>'form-control-sm'
            //     ]
            //     ])
            // ->add('brand', EntityType::class,[
            //     'label' => false,
            //     'required' => false,
            //     'class' => Brand::class,
            //     'multiple' => true,
            //     'expanded' => true,
            // ])

            // ->add('brand', EntityType::class,[
            //     'label' => false,
            //     'required' => false,
            //     'class' => Models::class,
            //     'multiple' => true,
            //     'expanded' => true,
            // ])

            // ->add('submit', SubmitType::class,[
            //     'label' => 'Filtrer',
            //     'attr' =>[
            //         'class' => 'btn btn-block btn btn-info'
            //     ]
            // ])
            //         ;

        //}
           
        //     ->add('minPrice', NumberType::class, [
        //         'label' => 'Prix Minimum:',
        //         'required' => false,
        //         'attr' => [
        //             'class' => 'form-control'
        //         ]
        //     ])
        //     ->add('maxPrice', NumberType::class, [
        //         'label' => 'Prix Maximum:',
        //         'required' => false,
        //         'attr' => [
        //             'class' => 'form-control'
        //         ]
        //     ])
        //     ->add('minKilometer', TextType::class, [
        //         'label' => 'Kilomètres Minimum:',
        //         'required' => false,
        //         'attr' => [
        //             'class' => 'form-control'
        //         ]
        //     ])
        //     ->add('maxKilometer', TextType::class, [
        //         'label' => 'Kilomètres Maximum:',
        //         'required' => false,
        //         'attr' => [
        //             'class' => 'form-control'
        //         ]
        //     ])
        //     ->add('minYear', IntegerType::class, [
        //         'label' => 'Année Minimum:',
        //         'required' => false,
        //         'attr' => [
        //             'class' => 'form-control'
        //         ]
        //     ])
        //     ->add('maxYear', IntegerType::class, [
        //         'label' => 'Année Maximum:',
        //         'required' => false,
        //         'attr' => [
        //             'class' => 'form-control'
        //         ]
        //     ])
        //     ->add('brand', TextType::class, [
        //         'label' => 'Marque:',
        //         'required' => false,
        //         'attr' => [
        //             'class' => 'form-control'
        //         ]
        //     ])
        //     ->add('energy', ChoiceType::class, [
        //         'label' => 'Carburant:',
        //         'required' => false,
        //         'attr' => [
        //             'class' => 'form-control'
        //         ],
        //         'choices' => [
        //             'DIESEL' => 'DIESEL',
        //             'ESSENCE' => 'ESSENCE',
        //             'GPL' => 'GPL',
        //             'ELECTRIQUE' => 'ELECTRIQUE',
        //         ]
        //     ]);
        ;
    }


        public function configureOptions(OptionsResolver $resolver): void
        {
            $resolver->setDefaults([
                'data_class' => Search::class,
                'method' => 'POST',
                // vu qu'on est dans un formulaire de recherche je pense on a pas besion d'une protection 100% sécurisée
                'crsf_protection' => false,
            ]);
        }

        public function getBlockPrefix(){
            return '';
        }
}