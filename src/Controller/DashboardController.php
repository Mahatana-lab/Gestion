<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index(): Response
    {
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }

    /**
     * @Route("/table", name="table")
     */
    public function table_liste(){
        return $this->render('dashboard/table.html.twig');
    }
    /**
     * @Route("/dash",name="dash")
     */
    public function table_bord(){
        return $this->render('dashboard/dashboard.html.twig');
    }
}
