<?php

namespace App\Form;

use App\Entity\Races;
use App\Entity\Secteurs;
use App\Entity\Groupements;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class RacesType extends AbstractType
{
    private $em;

    public function __construct(EntityManagerInterface $em){
        $this->em=$em;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /*$builder
            ->add('racefr')
            ->add('especefr')
            ->add('racear')
            ->add('especear')
            ->add('secteurid')
            ->add('groupementid')
        ;*/
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
        ;
        $formModifier = function (FormInterface $form, Secteurs $secteurs = null) {

            $groupement = [];
            if (!is_null($secteurs)) 
                $groupement = $this->em->getRepository(Groupements::class)->findBy(["secteurid" => $secteurs->getSecteurid()]);
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
                ->add('racefr', TextType::class, [
                    'label' => 'Race en français :',
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Adresse en français',
                        'data-parsley-pattern' => '^[a-zA-Z ]+$',
                        'data-parsley-trigger' => 'focusin',
                        'data-parsley-required-message' => "Nom de Race est obligatoire !!!",
                        'data-parsley-pattern-message' => "Vous devez saisir que des lettres"
                    ]
                ])
                ->add('especefr', TextType::class, [
                    'label' => 'Espece en français :',
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Adresse en français',
                        'data-parsley-pattern' => '^[a-zA-Z ]+$',
                        'data-parsley-trigger' => 'focusin',
                        'data-parsley-required-message' => "Espece du Race est obligatoire !!!",
                        'data-parsley-pattern-message' => "Vous devez saisir que des lettres"
                    ]
                ])
                ->add('racear', TextType::class, [
                    'row_attr' => [
                        'class' => 'text_Arb_Datatable'
                    ],
                    'label' => ': الفصيلة',
                    'label_attr' => ['class' => 'text_Arb'],
                    'attr' => [
                        'class' => 'form-control input_Arb',
                        'placeholder' => 'الفصيلة',
                        'data-parsley-pattern' => '^[؀-ۿ ]+$',
                        'data-parsley-trigger' => 'focusin',
                        'data-parsley-required-message' => "الفصيلة باللغة العربية ضروري",
                        'data-parsley-pattern-message' => "يجب عليك كتابة الحروف فقط"
                    ]
                ])
                ->add('especear', TextType::class, [
                    'row_attr' => [
                        'class' => 'text_Arb_Datatable'
                    ],
                    'label' => ': النوع',
                    'label_attr' => ['class' => 'text_Arb'],
                    'attr' => [
                        'class' => 'form-control input_Arb',
                        'placeholder' => 'النوع',
                        'data-parsley-pattern' => '^[؀-ۿ ]+$',
                        'data-parsley-trigger' => 'focusin',
                        'data-parsley-required-message' => "النوع باللغة العربية ضروري",
                        'data-parsley-pattern-message' => "يجب عليك كتابة الحروف فقط"
                    ]
                ])
            ;
               
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

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Races::class,
        ]);
    }
}
