<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Contacts;
use App\Form\ContactType;
use App\Helper\ContactHelper;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, ContactHelper $notification)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $contact=new Contacts();
        $now=new \DateTime('now');
        $form=$this->createForm(ContactType::class,$contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contact->setDatemessage($now);
            $notification->notify($contact);
            $contact=$form->getData();
            $entityManager->persist($contact);
            $entityManager->flush();
            $this->addFlash('success','Votre email a bien été envoyé');
            return $this->redirectToRoute('home');
        }
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'form'=>$form->createView()
        ]);
    }
}
