<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    
    /**
    * @Route("/", name="home")
    */
   public function home(UserRepository $userrepository) {
        $listeUser=$userrepository->findAll();
        $User=$userrepository->findAll();
        return $this->render('user/home.html.twig',array(
            
            "listeUser" => $listeUser
            
        ));
        dump($listeUser);die;
    }
    /**
     * @Route("/listeU", name="liste")
     * @param UserRepository $userRepository
     * @return Response
     */
    public function ShowUser(){
       

    return $this->render('user/liste.html.twig');
       
    
    
    }
   
    
}
