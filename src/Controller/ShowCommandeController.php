<?php

namespace App\Controller;

use App\Repository\CommandeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ShowCommandeController extends AbstractController
{
    /**
     * @Route("/show/commande/{slug}", name="show_commande")
     *
     */
    public function index($slug , CommandeRepository $repo)
    {

        

        $commande=$repo->findOneBySlug([$slug]);

        dump($commande);
        exit();

        if (!$commande) {return $this->redirectToRoute('error');}

        else

        {
            return $this->render('show_commande/index.html.twig', [
                'commande' => $commande,
                'controller_name' => 'ShowCommandeController',
            ]);
        }
    }
}
