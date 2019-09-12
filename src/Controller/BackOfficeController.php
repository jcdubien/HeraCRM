<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Commande;
use App\Form\ArticleType;
use App\Form\CommandeType;
use App\Repository\ArticleRepository;
use App\Repository\CommandeRepository;
use Cocur\Slugify\Slugify;
use http\Env;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BackOfficeController extends AbstractController
{
    /**
     * @Route("/back/office", name="back_office")
     */
    public function index(Request $request , CommandeRepository $repository , ArticleRepository $articleRepository)
    {
        $listecommande=$repository->findAll();
        $listearticle=$articleRepository->findAll();
        $article=new Article();
        $commande=new Commande();
        $commande->setStatus(1);
        $entityManager = $this->getDoctrine()->getManager();
        $now=new \DateTime('now');
        $formarticle=$this->createForm(ArticleType::class,$article);
        $formcommande=$this->createform(CommandeType::class,$commande);

        $formarticle->handleRequest($request);

        if ($formarticle->isSubmitted() && $formarticle->isValid()) {
            $slugify=new Slugify();
            $article->setSlug($slugify->slugify($article->getTitle()));
            $article=$formarticle->getData();
            $article->setExtrait(explode(" ",$article->getContent())[3]);
            $article->setDate($now);
            $entityManager->persist($article);
            $entityManager->flush();
            $this->addFlash('success','Votre article a bien été envoyé');
            return $this->redirectToRoute('back_office');
        }

        $formcommande->handleRequest($request);

        if ($formcommande->isSubmitted() && $formcommande->isValid()) {
            $commande=$formcommande->getData();
            $slugify=new Slugify();
            $commande->setSlug($slugify->slugify($commande->getReferenceCommande()));
            $entityManager->persist($commande);
            $entityManager->flush();
            $this->addFlash('success','Votre commande a bien été envoyée');
            return $this->redirectToRoute('back_office');
        }
        return $this->render('back_office/index.html.twig', [
            'controller_name' => 'ContactController',
            'formarticle'=>$formarticle->createView(),
            'formcommande'=>$formcommande->createView(),
            'commandes'=>$listecommande,
            'articles'=>$listearticle
        ]);
    }

}
