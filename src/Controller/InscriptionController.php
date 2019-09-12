<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\UtilisateurType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class InscriptionController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function index()
    {
        $utilisateur=new Utilisateur();
        $form=$this->createForm(UtilisateurType::class);

        return $this->render('inscription/index.html.twig', [
            'controller_name' => 'ConnexionController',
            'form' => $form->createView()

        ]);
    }
}
