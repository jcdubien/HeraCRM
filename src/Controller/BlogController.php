<?php

namespace App\Controller;


use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index(ArticleRepository $articleRepository , CategoryRepository $categoryRepository )
    {

        $articles = $articleRepository->findAll();
        $categories = $categoryRepository->findAll();
        $articleByCat=[];

        foreach ( $categories as $cat)
            {
                $articleByCat[$cat->getName()]=$articleRepository->findByCategory($cat);
            }

        return $this->render('blog/index.html.twig', [
                'articles' => $articles,
                'articleByCat' => $articleByCat,
                'categories' => $categories
            ]);
        }
}


