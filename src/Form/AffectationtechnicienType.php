<?php

namespace App\Form;

use App\Entity\Affectationtechnicien;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AffectationtechnicienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lieuaffectationid')
            ->add('roleid')
            ->add('serviceid')
            ->add('datedebutaffectation')
            ->add('datefinaffectation')
            ->add('groupementid')
            ->add('technicienid')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Affectationtechnicien::class,
        ]);
    }
}
