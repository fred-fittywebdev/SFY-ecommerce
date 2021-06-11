<?php

namespace App\Controller;

use App\Form\SearchProductType;
use App\Repository\ProductRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage(ProductRepository $productRepository, Request $request)
    {


        $products = $productRepository->findBy([], [], 3);

        $form = $this->createForm(SearchProductType::class);

        $search = $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //on cherhce les produits
            $products = $productRepository->search(
                $search->get('mots')->getData(),
                $search->get('categorie')->getData()
            );
        }

        return $this->render('home.html.twig', [
            'products' => $products,
            'form' => $form->createView()
        ]);
    }
}