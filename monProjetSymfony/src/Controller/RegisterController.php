<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends AbstractController
{
    /**
     * @Route("/signup", name="registration")
     */
    public function registration(Request $request, EntityManagerInterface $manager, 
    UserPasswordEncoderInterface $encoder){ 

        $user = new User();

        $user->setRoleId('1'); // role 1 : user , role 2 : admin

        $form = $this->createForm(RegistrationType::class, $user); 

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            
            $hash=$encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);

            $manager->persist($user);
            $manager->flush();

            return $this->redirectToRoute('security_login');
        }

        return $this->render('security/registration.html.twig', [
            'form'=> $form->createView()
        ]);
       
    }

    /**
     * @Route("/signin", name="security_login")
     */
    public function login() {
        return $this->render('security/login.html.twig');
    }

    /**
     * @Route("/signout", name="security_logout")
     */
    public function logout(){

    }

}
