<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ShowAllCommandeController extends AbstractController
{
    /**
     * @Route("/show/all/commande", name="show_all_commande")
     */
    public function index()
    {
        return $this->render('show_all_commande/index.html.twig', [
            'controller_name' => 'ShowAllCommandeController',
        ]);
    }
}
