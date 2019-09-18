<?php


namespace App\Helper;


use App\Repository\CommandeRepository;
use Doctrine\ORM\EntityManager;
use mysql_xdevapi\Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DeleteCommandeHelper
{
    public function erasecommande (  $commande , CommandeRepository $commandeRepository , EntityManager $entityManager){


        if (!empty($commande)) {

            $commandetoerase=$commandeRepository->findOneBy($commande);

                $entityManager->remove($commandetoerase);
                $entityManager->flush();


    }

}}