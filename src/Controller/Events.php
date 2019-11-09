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
            $data = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $truckRepository= $this->getDoctrine()
                ->getRepository(Truck::class);
            $trailerRepository= $this->getDoctrine()
                ->getRepository(Trailer::class);

            $events= new OEvents();
            $truck = $truckRepository
                ->findOneByLicenseNumber($data['licensenumber']);
            $trailer = $trailerRepository
                ->findOneByLicenseNumber($data['trailerlicense']);
            $events->setTruck($truck);
            $events ->setTrailer($trailer) ->setCountry($data['country'])->setDirection($data['direction']);
            $events->setEventDate($data['date'])->setAdress($data['address']);
            $events->setGoods($data['goods'])->setWeight($data['weight']);
            $events->setTemp($data['temp'])->setRezim($data['rezim']);
            $events->setPrim($data['prim']);



            $em->persist($events);

            $this->addFlash('success', 'Event Saved');
            $em->flush();
            //sleep(2);
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
