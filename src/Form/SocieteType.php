<?php

namespace App\Form;

use App\Entity\Societe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SocieteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('formeJuridique', FormeJuridiqueType::class)
            // ->add('effectifSalarieOuAssimile')
            ->add('telephone')
            ->add('email')
            // ->add('commentaireDestinationGreffe')
            // ->add('visualiserFormalite')
            // ->add('paye')
            // ->add('referenceFormalite')
            // ->add('enregistreLe')
            // ->add('declarationRelativeSociete')
            // ->add('siegeSocial')
            // ->add('declarationRelativeEtablissementActive')
            // ->add('impositionSurBenefice')
            // ->add('optionParticuliereBenefice')
            // ->add('regimeImpositionMatiereTVA')
            // ->add('optionPArticuliereMAtiereTVA')
            // ->add('adresseCorrespondance')
            // ->add('declarant')
            // ->add('document')
            // ->add('modePaiement')
            ->add('societeConstitueAssocieUnique')
            ->add('personneMoraleConstitueSansActivite')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Societe::class,
        ]);
    }
}
