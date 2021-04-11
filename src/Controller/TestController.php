<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController
{
    public function index()
    {
        dd("Ca fonctionne !");
    }

    /**
     * @Route("/test/{age<\d+>?0}", name="test", methods={"GET", "POST"}, 
     * host="127.0.0.1", schemes={"https", "http"})
     */
    public function test(Request $request, $age)
    {
        // crée un  objet de la classe Request en tenant compte de ce qu'il y a dans les globales, GET POST SESSION
        //$request = Request::createFromGlobals(); --> remplacé par les paramètres de la fonction
        // $age = 0;
        //if(!empty($_GET[''])) {
        //$age = $_GET['age'];
        //}
        //$age = $request->query->get('age', 0); // Query=GET request=POST
        //$age = $request->attributes->get('age'); // Query=GET request=POST
        return new Response("Vous avez $age ans");
    }
}