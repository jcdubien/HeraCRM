<?php

namespace App\Controller;

use App\Form\ArticleType;
use Cocur\Slugify\Slugify;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="article")
     */
    public function index(Request$request  )
    {

        $entityManager=$this->getDoctrine()->getManager();
        $formarticle=$this->createForm(ArticleType::class);
        $formarticle->handleRequest($request);
        $now=new \DateTime('now');

        if ($formarticle->isSubmitted() && $formarticle->isValid()) {
            $article=$formarticle->getData();
            $slugify=new Slugify();
            $article->setSlug($slugify->slugify($article->getTitle()));
            $article->setExtrait(explode(" ",$article->getContent())[3]);
            $article->setDate($now);
            $entityManager->persist($article);
            $entityManager->flush($article);
            $this->addFlash('success','Votre article a bien été envoyé');
            return $this->redirectToRoute('article');
        }
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
            'form' => $formarticle->createView()
        ]);
    }
}
