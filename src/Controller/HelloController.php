<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    //protected $calculator;
    //protected $logger;
    // public function __construct(Calculator $calculator)
    // {
    //     $this->calculator = $calculator;
    // }

    /**
     * @Route("/hello/{nom?Fred}", name="hello")
     */
    public function helloWorld($nom = "world")
    {
        return $this->render('hello.html.twig', [
            'prenom' => $nom
        ]);
    }
}