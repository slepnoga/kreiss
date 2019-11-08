<?php


namespace App\Controller;

use App\Entity\Truck;
use App\Form\AddEventsType;
use App\Repository\TruckRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Events extends AbstractController
{
    /**
     * @Route("/events", name="app_events")
     */
    public function addEvents(Request $request): Response
    {
        $form = $this->createForm(AddEventsType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $number = $form->get('licensenumber')->getData();
            $em = $this->getDoctrine()->getManager();
            $truckRepository= $this->getDoctrine()
                ->getRepository(Truck::class);
            $events= new Events();
            $truck = $truckRepository->findOneByLicenseNumber($number);

        }

        return $this->render(
            'events/events_main_page.html.twig',
            [
                'eventform' => $form->createView(),

            ]
        );
    }

    /**
     * @Route("/events/ajax/truck", name="app_ajax_search_truck", methods="GET")
     */
    public function event_truck_ajax(Request $request)
    {
        $truckRepository= $this->getDoctrine()
            ->getRepository(Truck::class);
        $truck = $truckRepository->findAllLicenseNumber();

        return $this->json(
            [
                'truck' => $truck,
            ],
            200,
            [],
            ['groups' => ['main']]
        );
    }
}
