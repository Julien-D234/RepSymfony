<?php

namespace App\Form;

use App\Entity\Artiste;
use App\Entity\Chanson;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChansonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'label' => false,
                'attr'  => ['placeholder'   =>  'Le titre ...']
            ])
            ->add('dateSortie', DateType::class, ['input'   =>  'datetime_immutable'])
            ->add('genre', TextType::class)
            ->add('langue', TextType::class)
            ->add('photoCouverture', UrlType::class, ['required' => false])
            ->add('artistes', EntityType::class, [
                'class' => Artiste::class,
                'choice_label'  => 'nom',
                'multiple'  => true,
                'required'  => false,
                'expanded'  => true
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Chanson::class,
        ]);
    }
}
