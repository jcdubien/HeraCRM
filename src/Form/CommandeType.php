<?php

namespace App\Form;

use App\Entity\Commande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom',TextType::class,array('label'=>'Nom du client'))
            ->add('prenom',TextType::class,array('label'=>'Prénom du client'))
            ->add('referencecommande',TextType::class,array('label'=>'Référence'))
            ->add('email',EmailType::class,array('label'=>'Email du client'))
            ->add('datecommande',DateType::class,array('label'=>'Date de la commande'))
            ->add('category',TextType::class,array('label'=>'Nom du client'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
