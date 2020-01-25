<?php

namespace App\Form;

use App\Entity\Provinces;
use App\Entity\Secteurs;
use App\Entity\Villes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class VillesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('villefr',TextType::class,[
                'label'=>'Nom en français :',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Nom en français',
                    'data-parsley-pattern' =>'^[a-zA-Z ]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Nom du ville est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des lettres"	
                ]
            ])
            ->add('villear',TextType::class,[
                'row_attr' => [
                    'class' => 'text_Arb_Datatable'
                ],
                'label'=>': إسم المدينة',
                'label_attr' => ['class'=>'text_Arb'],
                'attr'=>[
                    'class'=>'form-control input_Arb',
                    'placeholder'=>'إسم المدينة',
                    'data-parsley-pattern' =>'^[؀-ۿ ]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"إسم المدينة باللغة العربية ضروري",
                    'data-parsley-pattern-message' =>"يجب عليك كتابة الحروف فقط"	
                ]              
            ])
            ->add('secteurid',EntityType::class, [
                'label'=>'Nom du secteur :',
                'class'  => Secteurs::class,
                'choice_label' => 'secteurfr',
                'attr'=>[
                    'class'=>'form-control',
                    'data-parsley-pattern' =>'^[0-9]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required'=>"true",  
                    'data-parsley-required-message' =>"le choix du secteur est obligatoire !!!",
                    'data-parsley-pattern-message' =>"le secteur ne peut pas être saisi"
                ] 
            ])
            ->add('provinceid',EntityType::class, [
                'label'=>'Nom du provincied',
                'class'  => Provinces::class,
                'choice_label' => 'provincefr',
                'attr'=>[
                    'class'=>'form-control',
                    'data-parsley-pattern' =>'^[0-9]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required'=>"true",  
                    'data-parsley-required-message' =>"le choix du province est obligatoire !!!",
                    'data-parsley-pattern-message' =>"le province ne peut pas être saisi"
                ] 
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Villes::class,
        ]);
    }
}
