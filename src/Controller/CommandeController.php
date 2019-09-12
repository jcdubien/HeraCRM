<?php

namespace App\Controller;

use App\Form\ArticleType;
use App\Form\CommandeType;
use Cocur\Slugify\Slugify;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CommandeController extends AbstractController
{
    /**
     * @Route("/commande", name="commande")
     */
    public function index(Request $request)
    {
        $entityManager=$this->getDoctrine()->getManager();
        $formcommande=$this->createForm(CommandeType::class);

        $formcommande->handleRequest($request);


        if ($formcommande->isSubmitted() && $formcommande->isValid()) {
            $commande=$formcommande->getData();
            $slugify=new Slugify();
            $commande->setSlug($slugify->slugify($commande->getReferenceCommande()));
            $entityManager->persist($commande);
            $entityManager->flush();
            $this->addFlash('success','Votre commande a bien été envoyée');
            return $this->redirectToRoute('commande');
        }
        return $this->render('commande/index.html.twig', [
            'controller_name' => 'ArticleController',
            'form' => $formcommande->createView()
        ]);
    }
}
