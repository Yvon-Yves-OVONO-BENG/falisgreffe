<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Sondage;
use App\Entity\Civilite;
use App\Form\AdresseType;
use App\Entity\SecteurActivite;
use Doctrine\DBAL\Types\BooleanType;
use App\Repository\SondageRepository;
use App\Repository\CiviliteRepository;
use Symfony\Component\Form\AbstractType;
use App\Repository\SecteurActiviteRepository;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class UserType extends AbstractType
{
    protected $sondageRepository; 
    protected $civiliteRepository; 
    protected $secteurActiviteRepository;

    public function __construct(SecteurActiviteRepository $secteurActiviteRepository, CiviliteRepository $civiliteRepository, SondageRepository $sondageRepository)
    {
        $this->sondageRepository = $sondageRepository; 
        $this->civiliteRepository = $civiliteRepository; 
        $this->secteurActiviteRepository = $secteurActiviteRepository;
    }

    
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('particulier', ChoiceType::class, [
                'label' => false,
                'choices' => [
                    'Particulier' => 1,
                    'Entreprise' => 0
                ],
                'expanded' => true,
                'multiple' => false,
                'attr' => [
                    'id' => 'user-type'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email'
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Password'
            ])
            ->add('numeroRCS', TextType::class, [
                'label' => 'Numéro RCS ou SIREN'
            ])
            ->add('entreprise', TextType::class, [
                'label' => 'Entreprise'
            ])
            ->add('numTVA', TextType::class, [
                'label' => 'Numéro TVA'
            ])
            ->add('renseignerUneReference', CheckboxType::class, [
                'label' => 'Je souhaite renseigner une référence à chaque commande',
                'required' => false
            ])
            ->add('validationChaquePaiement', CheckboxType::class, [
                'label' => 'Validation de chaque paiement par saisie du mot de passe'
            ])
            ->add('reconnaisAvoirPrisConnaissance', CheckboxType::class, [
                'label' => 'En cochant cette case, j\'accepte et je reconnais avoir pris connaissance des Informations fournies à l\'Utilisateur au titre de ses données à caractère personnel (en application du règlement UE 2016/679 du 27 avril 2016 (RGPD) et de la loi n°78-17 du 6 janvier 1978)' 
            ])
            ->add('conditionGenerale', CheckboxType::class, [
                'label' => 'En cochant cette case, j\'accepte et je reconnais avoir pris connaissance des Conditions Générales d\'Utilisation et de vente de falis.'
            ])
            ->add('secteurActivite', EntityType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-select',
                    'placeholder' => 'Secteur d\'activité'
                ],
                'class' => SecteurActivite::class,
                'choice_label' => 'secteurActivite',
                'query_builder' => function(SecteurActiviteRepository $secteurActiviteRepository)
                {
                    return $secteurActiviteRepository->createQueryBuilder('s');
                }
            ])
            ->add('civilite', EntityType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-select',
                    'placeholder' => 'Civilité'
                ],
                'class' => Civilite::class,
                'choice_label' => 'civilite',
                'query_builder' => function(CiviliteRepository $civiliteRepository)
                {
                    return $civiliteRepository->createQueryBuilder('c');
                }
            ])
            // ->add('adresse', CollectionType::class, [
            //     'entry_type' => AdresseType::class,
            //     'entry_options' => [
            //         'label' => false,
            //         'allow_add' => true,
            //         'allow_delete' => true,
            //         'by_reference' => false 
            //     ]
            // ])
            ->add('sondage', EntityType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-select',
                    'placeholder' => 'Sondage'
                ],
                'class' => Sondage::class,
                'choice_label' => 'sondage',
                'query_builder' => function(SondageRepository $sondageRepository)
                {
                    return $sondageRepository->createQueryBuilder('c');
                }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
