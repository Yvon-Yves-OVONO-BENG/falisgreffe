<?php

namespace App\Form;

use App\Entity\Pays;
use App\Entity\Adresse;
use App\Repository\PaysRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class AdresseType extends AbstractType
{
    protected $paysRepository;

    public function __construct(PaysRepository $paysRepository)
    {
        $this->paysRepository = $paysRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('complementAdresse', TextType::class, [
                'label' => 'Complément Adresse'
            ])
            ->add('numeroRue', TextType::class, [
                'label' => 'Numéro de la rue'
            ])
            ->add('voie', TextType::class, [
                'label' => 'Nom de la voie'
            ])
            ->add('codePostal', TextType::class, [
                'label' => 'Code postal'
            ])
            ->add('ville', TextType::class, [
                'label' => 'Ville'
            ])
            ->add('accepteRecevoirInformations', CheckboxType::class, [
                'label' => 'J\'accepte de recevoir des informations ou des offres de falis à cette adresse.'
            ])
            ->add('fixe', TextType::class, [
                'label' => 'Fixe'
            ])
            ->add('partable', TextType::class, [
                'label' => 'portable'
            ])
            ->add('fax', TextType::class, [
                'label' => 'fax'
            ])
            ->add('pays', EntityType::class, [
                'label' => 'Pays',
                'attr' => [
                    'class' => 'form-select',
                    'placeholder' => 'Pays'
                ],
                'class' => Pays::class,
                'choice_label' => 'pays',
                'query_builder' => function(PaysRepository $paysRepository)
                {
                    return $paysRepository->createQueryBuilder('p');
                }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Adresse::class,
        ]);
    }
}
