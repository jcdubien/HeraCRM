<?php

namespace App\Helper;


use App\Entity\Contacts;
use Swift_Message;
use Twig\Environment;

class ContactHelper{

    public function __construct(\Swift_Mailer $mailer,Environment $renderer)
    {
        $this->mailer=$mailer;
        $this->renderer=$renderer;
    }

    public function notify(Contacts $contact) {
        $date=$contact->getDatemessage()->format('j,m,Y');
        /*$message=new Swift_Message('Nouveau message de M. '.$contact->getFirstname().' '.$contact->getLastname())
            >SetFrom("noreply@heracreations.fr")
            ->SetTo("contact@heracréations.fr")
            ->SetReplyTo($contact->getEmail())
            ->SetBody($this->renderer->render('emails/contact.html.twig',[
                'contact'=>$contact,
                'date'=>$date
            ])),'text/html';
        $this->mailer->send($message);*/
    }
}

