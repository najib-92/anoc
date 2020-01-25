<?php

namespace App\Form;

use App\Entity\Personnel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;


class PersonnelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('matricule',TextType::class,[
                'label'=>'Matricule :',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'matricule',
                    'data-parsley-pattern' =>'^[a-zA-Z0-9 ]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Matricule du personnel est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des lettres"	
                ]
            ])
            ->add('numcin',TextType::class,[
                'label'=>'CIN :',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'CIN',
                    'data-parsley-pattern' =>'^[a-zA-Z0-9 ]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"CIN du personnel est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des lettres,numéros !!!"	
                ]
            ])

            ->add('datecin',DateType::class,[
                'label'=>'Date CIN :',
                'widget' => 'single_text',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Nom en français',
                    'min' =>date("Y-m-d", strtotime('now -12 year')),
                    'max' => (new \DateTime())->format('Y-m-d'),
                    'data-parsley-pattern' =>'^[0-9-]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Date de CIN du personnel est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des numéros"
                ]
            ])
            ->add('validitecin',DateType::class,[
                'label'=>'Validation technicien :',
                'widget' => 'single_text',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Validation technicien',
                    'min' =>date("Y-m-d", strtotime('now -11 year')),
                    'max' =>date("Y-m-d", strtotime('now +11 year')),
                    'data-parsley-pattern' =>'^[0-9-]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Validite date de CIN du personnel est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des numéros"
                ]
            ])
            ->add('nomfr',TextType::class,[
                'label'=>'Nom en français :',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Nom en français',
                    'data-parsley-pattern' =>'^[a-zA-Z ]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Nom du personnel est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des lettres"	
                ]
            ])
            ->add('nomar',TextType::class,[
                'row_attr' => [
                    'class' => 'text_Arb_Datatable'
                ],
                'label'=>': إسم العائلي',
                'label_attr'=>['class'=>'text_Arb'],
                'attr'=>[
                    'class'=>'form-control input_Arb',
                    'placeholder'=>'إسم العائلي',
                    'data-parsley-pattern' =>'^[؀-ۿ ]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"إسم العائلي باللغة العربية ضروري",
                    'data-parsley-pattern-message' =>"يجب عليك كتابة الحروف فقط"
                ]
            ])
            ->add('prenomfr',TextType::class,[
                'label'=>'Prenom en français :',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Nom en français',
                    'data-parsley-pattern' =>'^[a-zA-Z ]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Prenom du personnel est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des lettres"	
                ]
            ])
            ->add('prenomar',TextType::class,[
                'row_attr' => [
                    'class' => 'text_Arb_Datatable'
                ],
                'label'=>': إسم الشخصي',
                'label_attr'=>['class'=>'text_Arb'],
                'attr'=>[
                    'class'=>'form-control input_Arb',
                    'placeholder'=>'إسم الشخصي',
                    'data-parsley-pattern' =>'^[؀-ۿ ]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"إسم الشخصي باللغة العربية ضروري",
                    'data-parsley-pattern-message' =>"يجب عليك كتابة الحروف فقط"
                ]
            ])
            ->add('adressefr',TextType::class,[
                'label'=>'Adresse en français :',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Adresse en français',
                    'data-parsley-pattern' =>'^[a-zA-Z ]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Adresse du personnel est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des lettres"	
                ]
            ])
            ->add('adressear',TextType::class,[
                'row_attr' => [
                    'class' => 'text_Arb_Datatable'
                ],
                'label'=>': العنوان',
                'label_attr'=>['class'=>'text_Arb'],
                'attr'=>[
                    'class'=>'form-control input_Arb',
                    'placeholder'=>'العنوان',
                    'data-parsley-pattern' =>'^[؀-ۿ ]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"العنوان باللغة العربية ضروري",
                    'data-parsley-pattern-message' =>"يجب عليك كتابة الحروف فقط"
                ]
            ])
            ->add('sexe',ChoiceType::class,[
                'choices'  => [
                    'Femme' => 'Femme',
                    'Homme' => 'Homme'
                ],
                'required' => true,
                'expanded' => true,
                'multiple' => false,           
            ])
            ->add('datenaissance',DateType::class,[
                'label'=>'Date Naissance :',
                'widget' => 'single_text',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Date Naissance',
                    //'min' =>date("Y-m-d", strtotime('now -11 year')),
                    'max' =>date("Y-m-d"),
                    'data-parsley-pattern' =>'^[0-9-]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Date Naissance du personnel est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des numéros"
                ]
            ])
            ->add('lieunaissance',TextType::class,[
                'label'=>'Lieu Naissance :',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Lieu Naissance',
                    'data-parsley-pattern' =>'^[a-zA-Z ]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"lieu de naissance du personnel est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des lettres"
                ]
            ])
            ->add('numcnss',TextType::class,[
                'label'=>'Numéro CNSS :',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Numéro CNSS',
                    'data-parsley-pattern' =>'^[0-9]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Numéro CNSS du personnel est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des numéros"
                ]
            ])
            ->add('numcimr',TextType::class,[
                'label'=>'Numéro CIMR :',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'numcimr',
                    'data-parsley-pattern' =>'^[a-zA-Z0-9 ]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Numéro CIMR du personnel est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des lettres,numéros !!!"
                ]
            ])
            ->add('telpersonnel',TelType::class,[
                'label'=>'Tel personnel :',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Tel personnel',
                    'data-parsley-pattern' =>'^[0-9]+$',                   
                    'data-parsley-minlength' =>"10",
                    'data-parsley-maxlength' =>"10",
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Tele personnel du personnel est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des numéros",
                    'data-parsley-minlength-message' =>"Votre numéro personnel doit contenir minimum 10 numéro",
                    'data-parsley-maxlength-message' =>"Votre numéro personnel doit contenir maximum 10 numéro"
                ]
            ])
            ->add('telprofessionnel',TelType::class,[
                'label'=>'Tel professionnel :',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Tel professionnel',
                    'data-parsley-pattern' =>'^[0-9]+$',
                    'data-parsley-minlength' =>"10",
                    'data-parsley-maxlength' =>"10",
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Tele professionnel du personnel est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des numéros",
                    'data-parsley-minlength-message' =>"Votre numéro personnel doit contenir minimum 10 numéro",
                    'data-parsley-maxlength-message' =>"Votre numéro personnel doit contenir minimum 10 numéro"
                ]
            ])
            ->add('emailpersonnel',EmailType::class,[
                'label'=>'Email personnel :',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Email personnel',
                    'data-parsley-type' =>"email",
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Email personnel du personnel est obligatoire !!!",
                    'data-parsley-type-message' =>"Adresse e-mail invalide"
                ]
            ])
            ->add('emailprofessionnel',EmailType::class,[
                'label'=>'Email professionnel :',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Email professionnel',
                    'data-parsley-type' =>"email",
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Email personnel du personnel est obligatoire !!!",
                    'data-parsley-type-message' =>"Adresse e-mail invalide"
                ]
            ])
            ->add('typecontrat',TextType::class,[
                'label'=>'Type contrat :',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Type contrat',
                    'data-parsley-pattern' =>'^[a-zA-Z ]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Type contrat du personnel est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des lettres"
                ]
            ])
            ->add('fonction',ChoiceType::class,[
                'label'=>'Fonction :',
                'choices'  => [
                    'Technicien' => 'Technicien',
                ],
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Fonction',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Fonction du personnel est obligatoire !!!",
                ]
            ])
            ->add('affectation',ChoiceType::class,[
                'label'=>'Affectation :',
                'choices'  => [
                    'Groupements' => 'Groupements',
                ],
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Affectation',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Affectation du personnel est obligatoire !!!",
                ]
            ])
            ->add('dateentree',DateType::class,[
                'label'=>'Date entrée :',
                'widget' => 'single_text',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Date entrée',
                    'min' =>date("Y-m-d", strtotime('now -11 year')),
                    'max' =>date("Y-m-d"),
                    'data-parsley-pattern' =>'^[0-9-]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Date Naissance du personnel est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des numéros"
                ]
            ])
            ->add('situationfamiliale',TextType::class,[
                'label'=>'Situation familiale :',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Situation familiale',
                    'data-parsley-pattern' =>'^[a-zA-Z ]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Situation familiale du personnel est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des lettres"
                ]
            ])
            ->add('salaire',TextType::class,[
                'label'=>'Salaire :',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Nom en français',
                    'data-parsley-pattern' =>'^[0-9.]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Salaire du personnel est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des lettres"
                ]
            ])
            ->add('banque',TextType::class,[
                'label'=>'Banque :',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Banque',
                    'data-parsley-pattern' =>'^[a-zA-Z ]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Banque du personnel est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des lettres"
                ]
            ])
            ->add('numrib',TextType::class,[
                'label'=>'Numéro du RIB :',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Numéro de RIB',
                    'data-parsley-pattern' =>'^[0-9]+$',
                    'data-parsley-minlength' =>"24",
                    'data-parsley-maxlength' =>"24",
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Numéro du RIB du personnel est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des numéros",
                    'data-parsley-minlength-message' =>"Votre Numéro du RIB doit contenir minimum 24 numéro",
                    'data-parsley-maxlength-message' =>"Votre Numéro du RIB doit contenir minimum 24 numéro"
                ]
            ])
            ->add('diplomes',TextType::class,[
                'label'=>'Diplôme :',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Diplôme',
                    'data-parsley-pattern' =>'^[a-zA-Z ]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Banque du personnel est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des lettres"
                ]
            ])
            ->add('dateobtdiplome',DateType::class,[
                'label'=>'Date diplôme :',
                'widget' => 'single_text',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Date diplôme',
                    'min' =>date("Y-m-d", strtotime('now -100 year')),
                    'max' =>date("Y-m-d"),
                    'data-parsley-pattern' =>'^[0-9-]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Date diplôme du personnel est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des numéros"
                ]
            ])
            ->add('specialite',TextType::class,[
                'label'=>'spécialité :',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'spécialité',
                    'data-parsley-pattern' =>'^[a-zA-Z ]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"spécialité du personnel est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des lettres"
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Personnel::class,
        ]);
    }
}
