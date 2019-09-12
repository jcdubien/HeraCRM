<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $article=new Article();
        $category1=new Category();
        $category2=new Category();
        $category3=new Category();


        for ($i=0;$i<10;$i++) {
            $article=new Article();
            $now=new \DateTime('now');
            $article->setTitle('article numéro :".$i');
            $article->setContent('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut fuga id 
            laudantium libero, natus nobis optio pariatur, perspiciatis, quae repudiandae sapiente sed soluta 
            velit veniam voluptas? ');
            $article->setDate($now);
            $article->setExtrait('Lorem ipsum dolor sit amet');
            $article->setImage('http://lorempixel.com/400/200/sports/Dummy-Text');
            $article->setCategory($category1);
            $manager->persist($article);
        }
        for ($i=0;$i<10;$i++) {
            $article=new Article();
            $now=new \DateTime('now');
            $article->setTitle('article numéro :".$i');
            $article->setContent('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut fuga id 
            laudantium libero, natus nobis optio pariatur, perspiciatis, quae repudiandae sapiente sed soluta 
            velit veniam voluptas? ');
            $article->setDate($now);
            $article->setExtrait('Lorem ipsum dolor sit amet');
            $article->setImage('http://lorempixel.com/400/200/sports/Dummy-Text');
            $article->setCategory($category2);
            $manager->persist($article);
        }

        for ($i=0;$i<10;$i++) {
            $article=new Article();
            $now=new \DateTime('now');
            $article->setTitle('article numéro :".$i');
            $article->setContent('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut fuga id 
            laudantium libero, natus nobis optio pariatur, perspiciatis, quae repudiandae sapiente sed soluta 
            velit veniam voluptas? ');
            $article->setDate($now);
            $article->setExtrait('Lorem ipsum dolor sit amet');
            $article->setImage('http://lorempixel.com/400/200/sports/Dummy-Text');
            $article->setCategory($category3);
            $manager->persist($article);
        }
        // $manager->persist($product);

        $manager->flush();
    }
}
