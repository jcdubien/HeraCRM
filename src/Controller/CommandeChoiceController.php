<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Form\CommandeChoiceType;
use App\Repository\CommandeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CommandeChoiceController extends AbstractController
{
    /**
     * @Route("/commande/choice", name="commande_choice")
     */
    public function index(Request $request , CommandeRepository $commandeRepository)
    {

        $commandechoice=new Commande();
        $form=$this->createForm(CommandeChoiceType::class,$commandechoice);


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commandechoice=$form->getData();
            $commande=$commandeRepository->findOneBy(['referencecommande' => $commandechoice->getReferencecommande()]);
            if (!$commande) {
                $this->
                $this->redirectToRoute('error');
            }

            else
            {
                return $this->render('show_commande/index.html.twig', [

                    'commande'=>$commande


            ]);}

        }

        return $this->render('commande_choice/index.html.twig', [
            'controller_name' => 'CommandeChoiceController',
            'commandechoice'=>$form->createView()
        ]);
    }
}
