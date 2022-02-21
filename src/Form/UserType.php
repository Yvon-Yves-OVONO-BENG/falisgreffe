<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('password')
            ->add('typeMembre')
            ->add('numeroRCS')
            ->add('entreprise')
            ->add('numTVA')
            ->add('renseignerUneReference')
            ->add('validationChaquePaiement')
            ->add('reconnaisAvoirPrisConnaissance')
            ->add('conditionGenerale')
            ->add('secteurActivite')
            ->add('civilite')
            ->add('adresse')
            ->add('sondage')
            ->add('roles')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
