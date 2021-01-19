<?php

namespace App\Controller;

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
   public function home() {
        return $this->render('user/home.html.twig');
    }
    /**
     * @Route("/listeU", name="liste")
     * @param UserRepository $userRepository
     * @return Response
     */
    public function ShowUser(){
       

    return $this->render('user/liste.html.twig');
       
    
    
    }
    
    /**
     * @Route("/detail/{statut}", name="user_detail")
     */
    public function showDetailsHistocal(UserRepository $userrepository, string $statut)
    {
        $checkstatutEnabled = $userrepository->findByid("enabled");
        $checkstatutInitiated = $userrepository->findByid("disabled");
    
        return  $this->render('user/detail.html.twig',array(
            "userEnabled" => $checkstatutEnabled,
            "userDisabled" => $checkstatutInitiated,
            "statut" => $statut
        ));
    }

}
