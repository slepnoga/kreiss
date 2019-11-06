<?php

namespace App\Form;

use App\Entity\Truck;
use App\Validator\TruckNumberPlate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class RefillTruckType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('licensenumber', TextType::class,[
                'required' =>true,
                'constraints'=>[
                    new TruckNumberPlate(),
                    new NotBlank()
                ]
            ])
            ->add('refill', IntegerType::class,[
                'required' =>true,
                'constraints'=>[
                    new NotBlank()
                ]
            ])
            ->add('deepcomp', IntegerType::class)
            ->add('odometr', IntegerType::class)
            ->add('date', DateType::class,[
                'widget' => 'single_text',
                'constraints'=>[
                    new  NotBlank()
                ]
            ])
            ->add('Submit', SubmitType::class)
            ->setMethod('POST')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }
}
