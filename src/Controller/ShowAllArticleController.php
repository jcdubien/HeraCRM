<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ShowAllArticleController extends AbstractController
{
    /**
     * @Route("/show/all/article", name="show_all_article")
     */
    public function index(ArticleRepository $articleRepository)
    {
        $listearticle=$articleRepository->findAll();

        return $this->render('show_all_article/index.html.twig', [
            'controller_name' => 'ShowAllArticleController',
            'articles' => $listearticle
        ]);
    }
}
