<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CrmController extends AbstractController
{
    /**
     * @Route("/crm", name="crm")
     */
    public function index()
    {
        return $this->render('commande_choice/index.html.twig', [
            'controller_name' => 'CrmController',
        ]);
    }
}
