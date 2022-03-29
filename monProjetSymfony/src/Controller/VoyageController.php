<?php

namespace App\Controller;

use App\Entity\Voyage;
use App\Entity\Comment;
use App\Form\VoyageType;
use App\Form\CommentType;
use App\Entity\User;
use App\Repository\VoyageRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class VoyageController extends AbstractController
{
    /**
     * @Route("/voyage", name="voyages")
     */
    public function index(VoyageRepository $repo, UserRepository $repoUser): Response{   
        $voyages = $repo->findAll();
        //$user_names = $repoUser->findById($voyages->idUtilisateur);

        return $this->render('voyage/index.html.twig',
        [ 'voyages' => $voyages,
           // 'user_names' => $user_names
        ]);
    }

    /**
     * @Route("/voyage/create", name="create_form")
     * @Route("/voyage/{id}/update", name="update_form")
     */ 
    
    public function form(Voyage $voyage = null, Request $request, EntityManagerInterface $manager){
       
       if(!$voyage) {
           $voyage = new Voyage();
       }

        $form =$this->createForm(VoyageType::class, $voyage);
                    
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            if(!$voyage->getId()) {
                $voyage->setCreatedAt(new \DateTime());
                // ajouter l'idUtilisateur de l'user connecter 
            }
        

            $manager->persist($voyage);
            $manager->flush();

            return $this->redirectToRoute('show_voyage', ['id' => $voyage->getIdvoyage()]);


        }
        
        return $this->render('voyage/create.html.twig', [

            'formVoyage' => $form->createView(), 
            'updateMode' =>$voyage->getId() !== null

            
        ]);
    }

    /**
     * @Route("/voyage/{id}", name="show_voyage")
     */ 
    public function show(UserRepository $repo, Voyage $voyage, Request $request, EntityManagerInterface $manager){
        $comment = new Comment();


        $username = $repo->findBy(( ['username' =>$voyage->getIdutilisateur() ]
    ));

        $form = $this->createForm(CommentType::class, $comment);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $comment->setCreatedAt(new \DateTime());
            $comment->setVoyage($voyage);
            
            $manager->persist($comment);
            $manager->flush();
        

            return $this->redirectToRoute('show_voyage', ['id' => $voyage->getId()]);

        }
        

        return$this->render('voyage/show.html.twig',[
            'voyage' => $voyage,
            'username' => $username, 
            'commentForm' => $form->createView()
        ]);
    }

}
