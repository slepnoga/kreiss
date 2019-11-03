<?php

namespace App\Form;

use App\Entity\Trailer;
use App\Validator\TrailerLicensePlate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
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
                    'choices' => ['frigo' => [1], 'dry' => [2]],
                    'preferred_choices' => ['frigo'],
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
                ]
            )
            ->add(
                'consumptionrate',
                IntegerType::class,
                [

                    'data' => 2,
                    'required' => false,
                ]
            )
            ->add('submit', SubmitType::class)
            ->setMethod('POST');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => Trailer::class,
            ]
        );
    }
}
