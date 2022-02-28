<?php

namespace App\Form;

use App\Entity\FormeJuridique;
use Symfony\Component\Form\AbstractType;
use App\Repository\FormeJuridiqueRepository;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class FormeJuridiqueType extends AbstractType
{
    private $formeJuridiqueRepository;

    public function __construct(FormeJuridiqueRepository $formeJuridiqueRepository)
    {
        $this->formeJuridiqueRepository = $formeJuridiqueRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $formeJuridiques = $this->formeJuridiqueRepository->findAll();
        // $formeJuridiquesChoices = [];
        // foreach ($formeJuridiques as $formeJuridique) 
        // {
        //     # code...
        // }

        $builder
            ->add('formeJuridique', ChoiceType::class, [
                'choices' => $formeJuridiques,
                'expanded' => true,
                'multiple' => false,
                'choice_value' => 'id',
                'choice_label' => function(?FormeJuridique $formeJuridique){
                    return $formeJuridique ? $formeJuridique->getFormeJuridique() : '';
                },
                // 'group_by' => function(){
                //     return rand(0,1) == 1 ? 'Grande entreprise' : 'Moyenne entreprise';
                // }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FormeJuridique::class,
        ]);
    }
}
