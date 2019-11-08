<?php


namespace App\Controller;

use App\Form\AddEventsType;
use App\Repository\TruckRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
    public function event_truck_ajax(Request $request, TruckRepository $truckRepository)
    {
        $truck = $truckRepository->findAllMatching($request);
        
        return $this->json([
            'truck' =>$truck
            ],200,[],['groups' => ['main']]
        );

    }
}
