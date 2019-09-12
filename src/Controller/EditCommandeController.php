<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Form\CommandeType;
use App\Repository\CommandeRepository;
use Doctrine\ORM\EntityManager;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EditCommandeController extends AbstractController
{
    /**
     * @Route("/edit/commande/{slug}", name="edit_commande")
     */
    public function index($slug , CommandeRepository $repository ,Request $request )
    {
        $entityManager = $this->getDoctrine()->getManager();
$commande=$repository->findOneBySlug($slug);
$form=$this->createForm(CommandeType::class,$commande);

$form->handleRequest($request);

if ($form->isSubmitted() && $form->isValid()) {
$newcommande=$form->getData();
$entityManager->persist($newcommande);
$entityManager->flush();



}
return $this->render('edit_commande/index.html.twig', [
    'controller_name' => 'EditCommandeController',
    'commande' => $slug,
    'formcommande' => $form->createView()
]);
}
}
