<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ConditionsGeneralesController extends AbstractController
{
    /**
     * @Route("/conditions/generales", name="conditions")
     */
    public function index()
    {
        return $this->render('conditions_generales/index.html.twig', [
            'controller_name' => 'ConditionsGeneralesController',
        ]);
    }
}
