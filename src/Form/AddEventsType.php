<?php

namespace App\Form;

use App\Validator\TruckNumberPlate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Country;

class AddEventsType extends AbstractType
{
    private $truckRepository;
    private $router;


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('licensenumber', TextType::class, [
                'constraints' =>[
                    new TruckNumberPlate()
                ],
                'invalid_message' => 'Hmm, truck not found!',
                'attr' => [
                    'class' => 'js-user-autocomplete',

                ],

            ])
            ->add('direction')
            ->add('date', DateType::class, [
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
            ->add('submit', SubmitType::class)
            ->setMethod('POST')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }
}
