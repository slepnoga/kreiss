<?php

namespace App\Form;

use App\Entity\Truck;
use App\Validator\TruckNumberPlate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;

class AddTruckType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'licensenumber',
                TextType::class,
                [
                    'constraints' => [
                        new TruckNumberPlate(),
                        new NotBlank(),
                    ],
                ]
            )
            ->add(
                'fueltanksize',
                IntegerType::class,
                [
                    'data' => '1200',
                    'constraints' => [
                        new NotBlank(),
                        new Positive(),
                    ],
                ]
            )
            ->add(
                'deepcomp',
                IntegerType::class,
                [
                    'constraints' => [
                        new NotBlank(),
                        new Positive(),
                    ],
                ]
            )
            ->add(
                'odometr',
                IntegerType::class,
                [
                    'constraints' => [
                        new NotBlank(),
                        new Positive(),
                    ],
                ]
            )
            ->add('disel', IntegerType::class)
            ->add('adBlue', IntegerType::class)

            ->add('country', TextType::class)
            ->setMethod('POST')
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }
}
