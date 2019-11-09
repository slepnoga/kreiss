<?php

namespace App\Form;

use App\Validator\TrailerLicensePlate;
use App\Validator\TruckNumberPlate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Validator\Constraints\Country;
use Symfony\Component\Validator\Constraints\NotBlank;

class AddEventsType extends AbstractType
{
    private $truckRepository;
    private $router;

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('licensenumber', TextType::class, [
                'constraints' =>[
                    new TruckNumberPlate()
                ],
                'invalid_message' => 'Hmm, truck not found!',
                'label' =>'truck',
                'attr' => [
                    'class' => 'js-user-autocomplete',
                    'data-autocomplete-url' => $this->router->generate('app_ajax_search_truck'),

                ],

            ])
            ->add('trailerlicense', TextType::class, [
                'constraints' =>[
                    new TrailerLicensePlate()
                ],
                'invalid_message' => 'Hmm, tailer not found!',
                'label' =>'trailer',
                'required' => false,
            ])

            ->add('direction', ChoiceType::class, [
                'choices'=>[
                    'Tranzit' => 't',
                    'Loads' => 'l',
                    'Unloads' => 'u'
                ],
                'constraints' =>[
                    new NotBlank()
                ]
            ])
            ->add('date', DateTimeType::class, [
                'widget' =>'single_text'
            ])
            ->add('country', TextType::class, [
                'constraints'=>[
                    new Country()
                ]
            ])
            ->add('address', TextType::class)
            ->add('goods', TextType::class)
            ->add('weight', IntegerType::class)
            ->add('temp', IntegerType::class)
            ->add('rezim', ChoiceType::class, [
                'choices' =>[
                    'Постоянка'=> true,
                    'Авто'=> false

                ]
            ])
            ->add('mileage', IntegerType::class)
            ->add('disel', IntegerType::class)
            ->add('frigo', IntegerType::class)
            ->add('motorhours', IntegerType::class)
            ->add('prim', TextareaType::class)
            ->add('submit', SubmitType::class)
            ->setMethod('POST')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
    }
}
