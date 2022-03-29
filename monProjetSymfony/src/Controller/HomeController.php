<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Voyage;
use App\Repository\VoyageRepository;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="app_home")
     */
    public function index(VoyageRepository $repo): Response
    {
        $voyages = $repo->findAll();

        return $this->render('home/home.html.twig', 
        [ 'title'=> "bienvenue les amis",
 
        ] );

    }
    /**
     * @Route("/", name="home")
     */

    public function home(VoyageRepository $repo) {
        $voyages = $repo->findAll();

        return $this->render('home/home.html.twig', 
            [ 'title'=> "bienvenue les amis",
           
            ]
    );
      //  return $this->render('home/index.html.twig'); à utiliser directement de préference

    }

    
}
