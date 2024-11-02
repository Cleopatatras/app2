<?php

namespace App\Form;

use App\Entity\Animaux;
use App\Entity\CompteRendu;
use App\Entity\Nourriture;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompteRenduType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', null, [
                'widget' => 'single_text',
            ])
            ->add('etat_animal')
            ->add('user', EntityType::class, [
                'class' => Users::class,
                'choice_label' => 'username',
            ])
            ->add('animal', EntityType::class, [
                'class' => Animaux::class,
                'choice_label' => 'nom',
            ])
            ->add('nourriture', EntityType::class, [
                'class' => Nourriture::class,
                'choice_label' => 'nom',
            ])
            ->add('grammage')
            ->add('detail')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CompteRendu::class,
        ]);
    }
}