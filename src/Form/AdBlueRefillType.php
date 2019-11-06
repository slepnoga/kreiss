<?php

namespace App\Form;

use App\Entity\AdBlueRefill;
use App\Entity\Truck;
use App\Validator\TruckNumberPlate;
use Symfony\Component\DependencyInjection\Tests\Compiler\I;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Country;
use Symfony\Component\Validator\Constraints\NotBlank;

class AdBlueRefillType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('licensenumber', TextType::class,[
                'label' => 'Truk License plate number',
                'constraints'=>[
                    new NotBlank(),
                    new TruckNumberPlate()
                ]
            ])
            ->add('odometr',IntegerType::class,[
                'constraints' =>[
                    new NotBlank()
                ]
            ])
            ->add('country', TextType::class,[
                'data' =>'DE',
                'constraints' =>[
                    new Country(),
                    new NotBlank()
                ]
            ])
            ->add('refill_size',IntegerType::class,[
                'constraints'=>[
                    new NotBlank()
                ]
            ])
            ->add('submit', SubmitType::class)
            ->setMethod('POST')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }
}
