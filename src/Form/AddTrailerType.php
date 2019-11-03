<?php

namespace App\Form;

use App\Entity\Trailer;
use App\Validator\TrailerLicensePlate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class AddTrailerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'type',
                ChoiceType::class,
                [
                    'choices' => [
                        'frigo' => 1,
                        'drywan' => 2,
                        'container' => 4
                    ],

                    'label' => 'Trailer Type'

                ]
            )
            ->add(
                'licensenumber',
                TextType::class,
                [
                    'constraints' => [
                        new NotBlank(),
                        new TrailerLicensePlate(),
                    ],
                    'required' => true,
                    'label' => 'CSDD Trailer Number, License plate number'
                ]
            )
            ->add(
                'consumptionrate',
                NumberType::class,
                [

                    'data' => 2,
                    'required' => false,
                    'label' => "consumption in liter in hour, i.e 2 or 2.3"
                ]
            )
            ->add('submit', SubmitType::class)
            ->setMethod('POST');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
         //   'data_class' => Trailer::class,
        ]
        );
    }
}
