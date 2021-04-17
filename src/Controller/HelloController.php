<?php

namespace App\Controller;

use App\Taxes\Calculator;
use App\Taxes\Detector;
use Cocur\Slugify\Slugify;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class HelloController
{
    //protected $calculator;
    //protected $logger;
    // public function __construct(Calculator $calculator)
    // {
    //     $this->calculator = $calculator;
    // }

    /**
     * @Route("/hello/{nom?world}", name="hello")
     */
    public function helloWorld($nom = "world", Environment $twig)
    {
        $html = $twig->render('hello.html.twig', [
            'prenom' => $nom,
            'ages' => [
                12,
                18,
                29,
                15
            ]
        ]);
        return new Response($html);
    }
}