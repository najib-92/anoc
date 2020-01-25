<?php

namespace App\Form;

use App\Entity\Tauxfonctionement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class TauxfonctionementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tauxfonctionnement',TextType::class,[
                'label'=>'Taux fonctionnement :',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Taux fonctionnement',
                    'data-parsley-pattern' =>'^[0-9.]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Taux fonctionnement est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des lettres"
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tauxfonctionement::class,
        ]);
    }
}
