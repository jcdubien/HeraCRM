<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HeraBabyCareController extends AbstractController
{
    /**
     * @Route("/hera/baby/care", name="hera_baby_care")
     */
    public function index()
    {
        return $this->render('hera_baby_care/index.html.twig', [
            'controller_name' => 'HeraBabyCareController',
        ]);
    }
}
