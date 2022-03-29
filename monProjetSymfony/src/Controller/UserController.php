<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user_space")
     */
    public function userspace(): Response
    {
        return $this->render('user/userspace.html.twig', [
            
        ]);
    }


}
