<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Product;
use App\Form\DataTransformer\CentimesTransformer;
use App\Form\Type\PriceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du produit',
                'attr' => ['placeholder' => 'Entrez le nom du produit']
            ])
            ->add('shortDescription', TextareaType::class, [
                'label' => 'Description courte',
                'attr' => [
                    'placeholder' => 'Entrez une courte description du produit'
                ]
            ])
            ->add('price', MoneyType::class, [
                'label' => 'Prix du produit en  ',
                'attr' => [
                    'placeholder' => 'Entrez le prix du produit en €'
                ],
                'divisor' => 100
            ])
            ->add('mainPicture', UrlType::class, [
                'label' => 'Image du produit',
                'attr' => ['placeholder' => 'Tapez une URL d\'image ']
            ])
            ->add('category', EntityType::class, [
                'label' => 'Catégories',
                'placeholder' => '--- Choisir une catégorie ---',
                'class' => Category::class,
                'choice_label' => function (Category $category) {
                    return strtoupper($category->getName());
                } // ou simplement 'name' a la place de la fonction
            ]);

        //$builder->get('price')->addModelTransformer(new CentimesTransformer);

        // $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
        //     $form = $event->getForm();

        //     /**@var Product */
        //     $product = $event->getData();
        //     // if ($product->getId() === null) {
        //     //     $form
        //     //         ->add('category', EntityType::class, [
        //     //             'label' => 'Catégories',
        //     //             'placeholder' => '--- Choisir une catégorie ---',
        //     //             'class' => Category::class,
        //     //             'choice_label' => function (Category $category) {
        //     //                 return strtoupper($category->getName());
        //     //             } // ou simplement 'name' a la place de la fonction
        //     //         ]);
        //     // }
        // });
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}