<?php

namespace App\Controller;

use App\Taxes\Calculator;
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
    public function helloWorld(
        $nom = "world",
        LoggerInterface $logger,
        Calculator $calculator,
        Slugify $slugify,
        Environment $twig
    ) {

        dd($twig);

        dump($slugify->slugify("hello world"));
        $logger->error("mon message de log");

        $tva = $calculator->calcul(100);
        dump($tva);

        return new Response("Hello $nom");
    }
}