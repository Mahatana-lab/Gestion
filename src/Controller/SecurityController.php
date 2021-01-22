<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Loader\Configurator\html;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="security_registration")
     */
    
   public function registration(UserPasswordEncoderInterface $encoder) 
   {
    
    $request = Request::createFromGlobals();//POST
    $manager = $this->getDoctrine()->getManager();//Relation base
     $user = new User();
     $form = $this->createForm(RegistrationType::class, $user);

     $form->handleRequest($request);//analyse request
     

     if($form->isSubmitted() && $form->isValid()){

          $hash = $encoder->encodePassword($user, $user->getPassword());
          $user->setPassword($hash);

          $manager->persist($user);
          $manager->flush();

          return $this->redirectToRoute('security_login');// redirigena makani @page login

     }
    
     return $this->render('security/registration.html.twig', [
         'form' => $form->createView()
     ]);
   }
   /**
    * @Route("/connexion", name="security_login") //mifamptohy am redirectToRoute
   */
   public function login(){
       return $this->render('security/login.html.twig');
   }
   /**
    * @Route("/deconnexion", name="security_logout")
    */
   public function logout(){

   }

   

}
