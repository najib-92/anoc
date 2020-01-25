<?php

namespace App\Form;

use App\Entity\Groupements;
use App\Entity\Personnel;
use App\Entity\Techniciens;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TechniciensType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('personnelid',EntityType::class, [
                'label'=>'CIN :',
                'class'  => Personnel::class,
                'query_builder' =>function (EntityRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->where('p.fonction = :tec')
                        ->setParameter('tec','Technicien');
                },
                'choice_label' => 'getNumcinNomfrPrenomfr',
                'attr'=>[
                    'class'=>'form-control',
                    'data-parsley-pattern' =>'^[0-9]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required'=>"true",                  
                    'data-parsley-required-message' =>"le choix du technicien est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des lettres"
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Techniciens::class,
        ]);
    }
}
