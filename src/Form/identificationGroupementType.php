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

class identificationGroupementType extends AbstractType
{
    private $em;

    public function __construct(EntityManagerInterface $em){
        $this->em=$em;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

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


}
