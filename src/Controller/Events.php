<?php


namespace App\Controller;

use App\Entity\Trailer;
use App\Entity\Truck;
use App\Entity\Events as OEvents;
use App\Form\AddEventsType;
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
            $truckNumber = $form->get('licensenumber')->getData();
            $trailerNumber=$form->get('trailerlicense')->getData();
            $em = $this->getDoctrine()->getManager();
            $truckRepository= $this->getDoctrine()
                ->getRepository(Truck::class);
            $trailerRepository= $this->getDoctrine()
                ->getRepository(Trailer::class);

            $events= new OEvents();
            $truck = $truckRepository->findOneByLicenseNumber($truckNumber);
            $trailer = $trailerRepository->findOneByLicenseNumber($trailerNumber);
            $events->setTruck($truck);
            $events ->setTrailer($trailer);


            $em->persist($events);
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
