<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',TextType::class,array('label'=>"Titre de l'article"))
            ->add('content',TextareaType::class,array('label'=>"Contenu de l'article"))
            ->add('image',TextType::class,array('label'=>"URL de l'image de l'article"))
            ->add('category',EntityType::class,array(
                'label'=>'Categorie de l\'article',
                'class'=>Category::class,
                'choice_label'=>'name'))
            /*->add('savearticle',SubmitType::class,array(
                'label'=>'Enregistrer l\'article',
                'attr'=>['class'=>'savearticle btn btn-primary']))*/
        ;
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
