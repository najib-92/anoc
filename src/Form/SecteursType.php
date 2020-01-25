<?php

namespace App\Form;

use App\Entity\Secteurs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class SecteursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder
            ->add('secteurfr',TextType::class,[
                'label'=>'Nom du Secteur :',
                'attr'=>[
                    'autofocus' => null,
                    'class'=>'form-control',
                    'placeholder'=>'Nom en français',
                    'data-parsley-pattern' =>'^[a-zA-Z ]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Nom du secteur est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des lettres"	
                ],
            ])
            ->add('secteurar',TextType::class,[
                'row_attr' => [
                    'class' => 'text_Arb_Datatable'
                ],
                'label'=>': إسم المنطقة',                
                'label_attr' => ['class'=>'text_Arb'],              
                'attr'=>[
                    'class'=>'form-control input_Arb keyboard',
                    'placeholder'=>'إسم المنطقة',
                    'data-parsley-pattern' =>'^[؀-ۿ ]+$',
                    //'data-val-regex-pattern' =>"^[؀-ۿ ]+$",
                    //'data-val' =>"true",
                    'data-parsley-trigger'=>"keyup", 
                    //'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"إسم المنطقة باللغة العربية ضروري",
                    'data-parsley-pattern-message' =>"يجب عليك كتابة الحروف فقط",
                    "dir" =>"rtl",
                ]                
            ])
            ->add('codesecteur',TextType::class,[
                'label'=>'Code Secteur :',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Code Secteur ',
                    'data-parsley-pattern' =>'^[a-zA-Z ]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"code du secteur est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des lettres"                  
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Secteurs::class,
        ]);
    }
}
