<?php

namespace App\Form;

use App\Entity\Secteurs;
use App\Entity\Groupements;
use App\Entity\Techniciens;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;

class GroupementsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            /*->add('groupementmereid')
            ->add('codegroupement')
            ->add('nomgroupementfr')
            ->add('nomgroupementar')
            ->add('adressepostale')
            ->add('datecreation')
            ->add('pvcreation')
            ->add('droitfonctionement')
            ->add('autrecotisations')
            ->add('effectifovinencadre')
            ->add('effectifcaprinencadre')
            ->add('lieupvcreation')
            ->add('datepvcreation')
            ->add('secteurid')
            ->add('technicienid')
            ->add('droitfonctionementid')*/
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
                    'data-parsley-pattern-message' =>"Vous devez saisir que des lettres"
                ] 
            ])
            ->add('technicienid',EntityType::class, [
                'label'=>'Nom du technicien :',
                'class'  => Techniciens::class,
                'choice_label' => 'getNumcinNomfrPrenomfrTechnicien',
                'attr'=>[
                    'class'=>'form-control',
                    'data-parsley-pattern' =>'^[0-9]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required'=>"true",  
                    'data-parsley-required-message' =>"le choix du technicien est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des lettres"
                ] 
            ])
            /*->add('groupementmereid',TextType::class,[
                'label'=>'Groupement mere id :',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Groupement mere id',
                ]
            ])*/
            ->add('codegroupement',TextType::class,[
                'label'=>'Code groupement :',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Code groupement',
                    'data-parsley-pattern' =>'^[a-zA-Z0-9 ]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Code du groupement est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des lettres,numéros !!!"
                ]
            ])
            ->add('nomgroupementfr',TextType::class,[
                'label'=>'Nom du groupement :',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Nom de groupement en français',
                    'data-parsley-pattern' =>'^[a-zA-Z ]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Nom du groupement est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des lettres"
                ]
            ])
            ->add('nomgroupementar',TextType::class,[
                'row_attr' => [
                    'class' => 'text_Arb_Datatable'
                ],
                'label'=>': إسم التجمع',
                'label_attr' => ['class'=>'text_Arb'],
                'attr'=>[
                    'class'=>'form-control input_Arb',
                    'placeholder'=>'إسم التجمع',
                    'data-parsley-pattern' =>'^[؀-ۿ ]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"إسم التجمع باللغة العربية ضروري",
                    'data-parsley-pattern-message' =>"يجب عليك كتابة الحروف فقط"
                ]
            ])
            ->add('adressepostale',TextType::class,[
                'label'=>'Adresse postale :',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Adresse postale',
                    'data-parsley-pattern' =>'^[a-zA-Z0-9\-,.° ]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Adresse postale du groupement est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des lettres"
                ]
            ])
            ->add('datecreation',DateType::class,[
                'label'=>'Date de creation :',
                'widget' => 'single_text',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Date de creation',
                    'min' =>date("Y-m-d", strtotime('now -100 year')),
                    'max' =>date("Y-m-d"),
                    'data-parsley-pattern' =>'^[0-9-]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Date de creation du groupement est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des numéros"
                ]
            ])
            ->add('pvcreation',FileType::class,[
                'label'=>'PV de creation (PDF file):',

                // unmapped means that this field is not associated to any entity property
                'mapped' => false,

                // make it optional so you don't have to re-upload the PDF file
                // everytime you edit the Product details
                //'required' => true,
                'required' => false,
                'data_class' => null,

                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '5M',
                        'mimeTypes' => [
                            'image/*',
                            'application/pdf',
                            //'application/msword',
                            //'application/vnd.ms-excel',
                            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                            //'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                            //'application/vnd.openxmlformats-officedocument.presentationml.presentation',
                            //'text/plain'
                        ],
                        'mimeTypesMessage' => 'Please upload a valid PDF document',
                    ])
                ],
                'attr'=>[
                    'class'=>'form-control',
                    //'placeholder'=>'PV de creation',
                    //'data-parsley-trigger' =>'focusin',
                    //'data-parsley-fileextension' =>'pdf,jpg,docx',
                    //'data-parsley-max-file-size' =>"5",
                    //'data-parsley-max-file-size-message' =>"size"
                    'data-parsley-trigger' =>"change", 
                    'data-parsley-filemaxmegabytes' =>"5",
                    'data-parsley-filemimetypes' =>"image/jpeg, image/png, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document", 
                ]    
            ])
            ->add('typetauxfonctionnement',ChoiceType::class,[
                'row_attr' => [
                    'class' => 'Typetauxfonctionnement'
                ],
                'choices'  => [
                    'Le même pours toutes les races' => 'paye par groupement',
                    'Diffère d\'une race à l\'autre' => 'paye par race'
                ],
                'required' => true,
                'expanded' => true,
                'multiple' => false,
            ])
            ->add('droitfonctionement',TextType::class,[
                'row_attr' => [
                    'class' => 'droitFonctionement'
                ],
                'label'=>'Droit de fonctionement :',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Droit de fonctionement',
                    'data-parsley-pattern' =>'^[0-9,]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Droit de fonctionement du groupement est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des numéros"
                ]
            ])
            ->add('autrecotisations',TextType::class,[
                'label'=>'Autre cotisations :',
                'required' => false,
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Autre cotisations',
                    'data-parsley-pattern' =>'^[0-9,]+$',
                    'data-parsley-trigger' =>'focusout',
                    'data-parsley-required' =>"false",
                    //'data-parsley-validate'=>"false",
                    'data-parsley-required-message' =>"Droit de fonctionement du groupement est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des numéros"
                ]
            ])
            ->add('effectifovinencadre',TextType::class,[
                'label'=>'Effectif ovin encadré :',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Effectif ovin encadré',
                    'data-parsley-pattern' =>'^[0-9]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Effectif ovin encadré du groupement est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des numéros"
                ]
            ])
            ->add('effectifcaprinencadre',TextType::class,[
                'label'=>'Effectif caprin encadré :',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Effectif caprin encadré',
                    'data-parsley-pattern' =>'^[0-9]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Effectif caprin encadré du groupement est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des numéros"
                ]
            ])
            ->add('lieupvcreation',TextType::class,[
                'label'=>'Lieu PV creation :',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Lieu PV creation',
                    'data-parsley-pattern' =>'^[a-zA-Z ]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Lieu PV creation du groupement est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des lettres"
                ]
            ])
            ->add('datepvcreation',DateType::class,[
                'label'=>'Date PV creation :',
                'widget' => 'single_text',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Date PV creation',
                    'min' =>date("Y-m-d", strtotime('now -100 year')),
                    'max' =>date("Y-m-d"),
                    'data-parsley-pattern' =>'^[0-9-]+$',
                    'data-parsley-trigger' =>'focusin',
                    'data-parsley-required-message' =>"Date PV creation du groupement est obligatoire !!!",
                    'data-parsley-pattern-message' =>"Vous devez saisir que des numéros"
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Groupements::class,
        ]);
    }
}
