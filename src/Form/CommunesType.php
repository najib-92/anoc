<?php

namespace App\Form;

use App\Entity\Villes;
use App\Entity\Communes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CommunesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('communefr',TextType::class,[
                'label'=>'Nom en français :',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Nom en français',
                    'data-parsley-pattern' =>'^[a-zA-Z ]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Nom du commune est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des lettres"
                ]
            ])
            ->add('communear',TextType::class,[
                'label'=>': إسم الإقليم',
                'label_attr'=>['class'=>'text_Arb'],
                'attr'=>[
                    'class'=>'form-control input_Arb',
                    'placeholder'=>'إسم الإقليم',
                    'data-parsley-pattern' =>'^[؀-ۿ ]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"إسم الإقليم باللغة العربية ضروري",
                    'data-parsley-pattern-message' =>"يجب عليك كتابة الحروف فقط"
                ]             
            ])
            ->add('villeid',EntityType::class, [
                'label'=>'Nom du Ville :',
                'class'  => Villes::class,
                'choice_label' => 'villefr',
                'attr'=>[
                    'class'=>'form-control',
                    'data-parsley-pattern' =>'^[0-9]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required'=>"true",  
                    'data-parsley-required-message' =>"le choix du ville est obligatoire !!!",
                    'data-parsley-pattern-message' =>"le ville ne peut pas être saisi"
                ] 
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Communes::class,
        ]);
    }
}
