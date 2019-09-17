<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\UtilisateurType;
use Doctrine\ORM\EntityManager;
use MongoDB\Driver\Manager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class InscriptionController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function index( Request $request  , UserPasswordEncoderInterface $encoder)
    {

        $entityManager=$this->getDoctrine()->getManager();
        $utilisateur=new Utilisateur();
        $form=$this->createForm(UtilisateurType::class,$utilisateur);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($utilisateur,$utilisateur->getMotdepasse());
            $utilisateur->setMotdepasse($hash);
            $entityManager->persist($utilisateur);
            $entityManager->flush();
            $this->addFlash('success','Votre utilisateur a bien été créé ! ');
        }


        return $this->render('inscription/index.html.twig', [
            'controller_name' => 'ConnexionController',
            'form' => $form->createView()

        ]);
    }
}
