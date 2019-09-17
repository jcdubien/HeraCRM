<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\UtilisateurType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ConnexionController extends AbstractController
{
    /**
     * @Route("/connexion", name="security_login")
     */
    public function login()
    {



        return $this->render('connexion/index.html.twig', [
            'controller_name' => 'ConnexionController'

        ]);
    }
}
