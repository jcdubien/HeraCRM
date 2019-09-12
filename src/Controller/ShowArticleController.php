<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ShowArticleController extends AbstractController
{
    /**
     * @Route("/show/article/{slug}", name="show_article")
     */
    public function index($slug, ArticleRepository $articleRepository)
    {
        $article=$articleRepository->findOneBySlug([$slug]);
        return $this->render('show_article/index.html.twig', [
            'controller_name' => 'ShowArticleController',
            'article' => $article
        ]);
    }
}
