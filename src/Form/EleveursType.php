<?php

namespace App\Form;

use App\Entity\Douars;
use App\Entity\Villes;
use App\Entity\Eleveurs;
use App\Entity\Secteurs;
use App\Entity\Groupements;
use Cassandra\Cluster\Builder;
use Doctrine\ORM\EntityManager;
use phpDocumentor\Reflection\Types\Null_;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class EleveursType extends AbstractType
{
    private $em;
    protected $auth;

    public function __construct(EntityManagerInterface $em, AuthorizationCheckerInterface $auth){
        $this->em=$em;
        $this->auth = $auth;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if($this->auth->isGranted("ROLE_TECHNICIEN")){
            $builder
                ->add('effectifovin',TextType::class,[
                    'label'=>'Effectif ovin :',
                    'attr'=>[
                        'class'=>'form-control',
                        'placeholder'=>'Effectif ovin',
                        'data-parsley-pattern' =>'^[0-9]+$',
                        'data-parsley-trigger' =>'focusin',
                        'data-parsley-required-message' =>"Effectif ovin du l'eleveur est obligatoire !!!",
                        'data-parsley-pattern-message' =>"Vous devez saisir que des numéros"
                    ]
                ])
                ->add('effectifcaprin',TextType::class,[
                    'label'=>'Effectif caprin :',
                    'attr'=>[
                        'class'=>'form-control',
                        'placeholder'=>'Effectif caprin',
                        'data-parsley-pattern' =>'^[0-9]+$',
                        'data-parsley-trigger' =>'focusin',
                        'data-parsley-required-message' =>"Effectif caprin du l'eleveur est obligatoire !!!",
                        'data-parsley-pattern-message' =>"Vous devez saisir que des numéros"
                    ]
                ]);
        }
    else {
        $builder
            ->add('secteurid', EntityType::class, [
                'label' => 'Nom du secteur :',
                'class' => Secteurs::class,
                'placeholder' => 'Sélectionnez votre secteur',
                'choice_label' => 'secteurfr',
                'attr' => [
                    'class' => 'form-control',
                ]
            ]);
        $formModifier = function (FormInterface $form, Secteurs $secteurs = null) {

            $groupement = [];
            $villes = [];
            $douars = [];
            if (!is_null($secteurs)) {
                $groupement = $this->em->getRepository(Groupements::class)->findBy(["secteurid" => $secteurs->getSecteurid()]);
                $villes = $this->em->getRepository(Villes::class)->findBy(["secteurid" => $secteurs->getSecteurid()]);
                $villes[] = new Villes();
                $villes = array_reverse($villes);
                $douars = $this->em->getRepository(Douars::class)->findBy(["secteurid" => $secteurs->getSecteurid()]);
                $douars[] = new Douars();
                $douars = array_reverse($douars);
            }

            $form
                ->add('groupementid', EntityType::class, [
                    'class' => Groupements::class,
                    'placeholder' => empty($groupement) ? 'Sélectionnez votre secteur' : false,
                    'auto_initialize' => false,
                    'choices' => $groupement,
                    'attr' => [
                        'class' => 'form-control',
                    ]
                ])
                ->add('villeid', ChoiceType::class, [
                    'label' => 'Nom du Ville :',
                    //'class'  => Villes::class,
                    'placeholder' => empty($villes) ? 'Sélectionnez votre secteur' : false,
                    'auto_initialize' => false,
                    'choices' => $villes,
                    'choice_label' => function (Villes $ville, $key, $value) {
                        return is_null($ville->getVillefr()) ? "sans" : $ville->getVillefr();
                    },
                    'attr' => [
                        'class' => 'form-control',
                    ]
                ])
                ->add('douarid', ChoiceType::class, [
                    'label' => 'Nom du douar :',
                    //'class'  => Douars::class,
                    'placeholder' => empty($douars) ? 'Sélectionnez votre secteur' : false,
                    'auto_initialize' => false,
                    'choices' => $douars,
                    'choice_label' => function (Douars $douars, $key, $value) {
                        return is_null($douars->getDouarfr()) ? "sans" : $douars->getDouarfr();
                    },
                    'attr' => [
                        'class' => 'form-control',
                    ]
                ])
                ->add('codeeleveur', TextType::class, [
                    'label' => 'Code eleveaur :',
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Code eleveaur',
                        'data-parsley-pattern' => '^[a-zA-Z0-9 ]+$',
                        'data-parsley-trigger' => 'focusin',
                        'data-parsley-required-message' => "Code eleveaur du l'eleveaur est obligatoire !!!",
                        'data-parsley-pattern-message' => "Vous devez saisir que des lettres"
                    ]
                ])
                ->add('numcin', TextType::class, [
                    'label' => 'Numéro de CIN :',
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Numéro de CIN',
                        'data-parsley-pattern' => '^[a-zA-Z0-9 ]+$',
                        'data-parsley-trigger' => 'focusin',
                        'data-parsley-required-message' => "CIN du l'eleveaur est obligatoire !!!",
                        'data-parsley-pattern-message' => "Vous devez saisir que des lettres,numéros !!!"
                    ]
                ])
                ->add('datecin', DateType::class, [
                    'label' => 'Date CIN :',
                    'widget' => 'single_text',
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Date CIN',
                        'min' => date("Y-m-d", strtotime('now -12 year')),
                        'max' => (new \DateTime())->format('Y-m-d'),
                        'data-parsley-pattern' => '^[0-9-]+$',
                        'data-parsley-trigger' => 'focusin',
                        'data-parsley-required-message' => "Date de CIN du l'eleveaur est obligatoire !!!",
                        'data-parsley-pattern-message' => "Vous devez saisir que des numéros"
                    ]
                ])
                ->add('validitecin', DateType::class, [
                    'label' => 'Validite de CIN :',
                    'widget' => 'single_text',
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Validite de CIN',
                        'min' => date("Y-m-d", strtotime('now -11 year')),
                        'max' => date("Y-m-d", strtotime('now +11 year')),
                        'data-parsley-pattern' => '^[0-9-]+$',
                        'data-parsley-trigger' => 'focusin',
                        'data-parsley-required-message' => "Validite date de CIN du l'eleveaur est obligatoire !!!",
                        'data-parsley-pattern-message' => "Vous devez saisir que des numéros"
                    ]
                ])
                ->add('nomfr', TextType::class, [
                    'label' => 'Nom en français :',
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Nom en français',
                        'data-parsley-pattern' => '^[a-zA-Z ]+$',
                        'data-parsley-trigger' => 'focusin',
                        'data-parsley-required-message' => "Nom du l'eleveaur est obligatoire !!!",
                        'data-parsley-pattern-message' => "Vous devez saisir que des lettres"
                    ]
                ])
                ->add('nomar', TextType::class, [
                    'row_attr' => [
                        'class' => 'text_Arb_Datatable'
                    ],
                    'label' => ': إسم العائلي',
                    'label_attr' => ['class' => 'text_Arb'],
                    'attr' => [
                        'class' => 'form-control input_Arb',
                        'placeholder' => 'إسم العائلي',
                        'data-parsley-pattern' => '^[؀-ۿ ]+$',
                        'data-parsley-trigger' => 'focusin',
                        'data-parsley-required-message' => "إسم العائلي باللغة العربية ضروري",
                        'data-parsley-pattern-message' => "يجب عليك كتابة الحروف فقط"
                    ]
                ])
                ->add('prenomfr', TextType::class, [
                    'label' => 'Prenom en français :',
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Nom en français',
                        'data-parsley-pattern' => '^[a-zA-Z ]+$',
                        'data-parsley-trigger' => 'focusin',
                        'data-parsley-required-message' => "Prenom du l'eleveaur est obligatoire !!!",
                        'data-parsley-pattern-message' => "Vous devez saisir que des lettres"
                    ]
                ])
                ->add('prenomar', TextType::class, [
                    'row_attr' => [
                        'class' => 'text_Arb_Datatable'
                    ],
                    'label' => ': إسم الشخصي',
                    'label_attr' => ['class' => 'text_Arb'],
                    'attr' => [
                        'class' => 'form-control input_Arb',
                        'placeholder' => 'إسم الشخصي',
                        'data-parsley-pattern' => '^[؀-ۿ ]+$',
                        'data-parsley-trigger' => 'focusin',
                        'data-parsley-required-message' => "إسم الشخصي باللغة العربية ضروري",
                        'data-parsley-pattern-message' => "يجب عليك كتابة الحروف فقط"
                    ]
                ])
                ->add('dateadhesion', DateType::class, [
                    'label' => 'Date adhesion :',
                    'widget' => 'single_text',
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Date adhesion',
                    ]
                ])
                ->add('adressefr', TextType::class, [
                    'label' => 'Adresse en français :',
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Adresse en français',
                        'data-parsley-pattern' => '^[a-zA-Z ]+$',
                        'data-parsley-trigger' => 'focusin',
                        'data-parsley-required-message' => "Adresse du l'eleveaur est obligatoire !!!",
                        'data-parsley-pattern-message' => "Vous devez saisir que des lettres"
                    ]
                ])
                ->add('adressear', TextType::class, [
                    'row_attr' => [
                        'class' => 'text_Arb_Datatable'
                    ],
                    'label' => ': العنوان',
                    'label_attr' => ['class' => 'text_Arb'],
                    'attr' => [
                        'class' => 'form-control input_Arb',
                        'placeholder' => 'العنوان',
                        'data-parsley-pattern' => '^[؀-ۿ ]+$',
                        'data-parsley-trigger' => 'focusin',
                        'data-parsley-required-message' => "العنوان باللغة العربية ضروري",
                        'data-parsley-pattern-message' => "يجب عليك كتابة الحروف فقط"
                    ]
                ])
                ->add('effectifovin', TextType::class, [
                    'label' => 'Effectif ovin :',
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Effectif ovin',
                        'data-parsley-pattern' => '^[0-9]+$',
                        'data-parsley-trigger' => 'focusin',
                        'data-parsley-required-message' => "Effectif ovin du l'eleveur est obligatoire !!!",
                        'data-parsley-pattern-message' => "Vous devez saisir que des numéros"
                    ]
                ])
                ->add('effectifcaprin', TextType::class, [
                    'label' => 'Effectif caprin :',
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Effectif caprin',
                        'data-parsley-pattern' => '^[0-9]+$',
                        'data-parsley-trigger' => 'focusin',
                        'data-parsley-required-message' => "Effectif caprin du l'eleveur est obligatoire !!!",
                        'data-parsley-pattern-message' => "Vous devez saisir que des numéros"
                    ]
                ])
                ->add('typeeleveur', ChoiceType::class, [
                    'label' => 'Type eleveur :',
                    'choices' => [
                        'Multiplicateur' => 'Multiplicateur',
                        'Selectionneur' => 'Selectionneur'
                    ],
                    'required' => true,
                    'expanded' => true,
                    'multiple' => false,
                ]);
        };
        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formModifier) {
                // this would be your entity, i.e. SportMeetup
                $data = $event->getData();

                $formModifier($event->getForm(), $data->getSecteurid());
            }
        );
        $builder->get('secteurid')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($formModifier) {
                // It's important here to fetch $event->getForm()->getData(), as
                // $event->getData() will get you the client data (that is, the ID)
                $secteur = $event->getForm()->getData();

                // since we've added the listener to the child, we'll have to pass on
                // the parent to the callback functions!
                $formModifier($event->getForm()->getParent(), $secteur);
            }
        );


    }
    }

    private function addGroupementField(FormInterface $form,Secteurs $secteurs){


       $form ->add('secteurid',EntityType::class, [
            'label'=>'Nom du secteur :',
            'class'  => Groupements::class,
            'placeholder' => $secteurs ? 'Sélectionnez votre ville' : 'Sélectionnez votre département',
            'choice_label' => $secteurs ? $secteurs->getSecteurid() : [],
            'attr'=>[
                'class'=>'form-control',
            ]
        ]);
        /*$builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
            'groupement',
            EntityType::class,
            null,
            [
                'class' => 'App\Entity\Groupements',
                'placeholder' => '',
                'choices' => $secteurs->getSecteurid()
            ]

        );
        $builder->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event){
                dump($event->getForm());
            }
        );
        $form->add($builder->getForm());*/

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Eleveurs::class,
        ]);
    }
}
