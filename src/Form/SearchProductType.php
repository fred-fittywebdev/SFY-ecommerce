<?php

namespace App\Form;

use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mots', SearchType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-control mr-3',
                    'placeholder' => 'Rechercher un produit'
                ],
                'required' => false
            ])
            ->add('categorie', EntityType::class, [
                'class' => Category::class,
                'placeholder' => '--- Choisir une catégorie ---',
                'choice_label' => function (Category $category) {
                    return strtoupper($category->getName());
                },
                'label' => false,
                'attr' => [
                    'class' => 'form-control mr-3',
                ],
                'required' => false
            ])
            ->add('Rechercher', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-success my-2 my-sm-0'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}