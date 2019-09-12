<?php

namespace App\Controller;

use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EditArticleController extends AbstractController
{
    /**
     * @Route("/edit/article/{slug}", name="edit_article")
     */
    public function index($slug , ArticleRepository $articleRepository , Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $article=$articleRepository->findOneBySlug($slug);
        $form=$this->createForm(ArticleType::class,$article);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $newarticle=$form->getData();
            $entityManager->persist($newarticle);
            $entityManager->flush();



        }

        return $this->render('edit_article/index.html.twig', [
            'controller_name' => 'EditArticleController',
            'formarticle' => $form->createView(),
            'article' => $slug
        ]);
    }
}
