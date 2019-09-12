<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Helper\DeleteCommandeHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EsraseCommandeController extends AbstractController
{
    /**
     * @Route("/esrase/commande/{reference}", name="esrase_commande")
     */
    public function index($reference , DeleteCommandeHelper $commandeHelper)
    {
        $commandeHelper->erasecommande($reference);

        return $this->redirectToRoute('edit_commande',[ 'slug'=> $reference]);

    }
}
