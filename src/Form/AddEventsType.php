<?php

namespace App\Form;

use App\Entity\Events;
use App\Repository\TruckRepository;
use App\Repository\UserRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Routing\RouterInterface;

class AddEventsType extends AbstractType
{
    private $truckRepository;
    private $router;


    /**
     * AddEventsType constructor.
     * @param UserRepository  $userRepository
     * @param RouterInterface $router
     */
    public function __construct(TruckRepository $truckRepository, RouterInterface $router)
    {
        $this->truckRepository = $truckRepository;
        $this->router = $router;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('licensenumber', TextType::class)
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'invalid_message' => 'Hmm, user not found!',
            'finder_callback' => function(TruckRepository $truckRepository, string $licensenumber) {
                return $truckRepository->findOneBy(['licensenumber' => $licensenumber]);
            },
            'attr' => [
                'class' => 'js-user-autocomplete',
                'data-autocomplete-url' => $this->router->generate('app_ajax_search_truck')
            ]
        ]);
    }



}
