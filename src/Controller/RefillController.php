<?php

namespace App\Controller;

use App\Entity\AdBlueRefill;
use App\Entity\Truck;
use App\Form\AdBlueRefillType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RefillController extends AbstractController
{
    /**
     * @Route("/refill", name="app_refill")
     */
    public function index(): Response
    {
        return $this->render('refill/refill_main_page.html.twig');
    }
    /**
     * @param Request $request
     * @return Response
     * @Route("/refill/adblue", name="adblue_refill")
     */
    public function addBlueRefill(Request $request): Response
    {
        $form = $this->createForm(AdBlueRefillType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $addBlue = new AdBlueRefill();
            $truckclass = $this->getDoctrine()->getRepository(Truck::class);
            // @Todo migrate to value
            $number = $form->get('licensenumber')->getData();
            $truck = $truckclass->findOneByLicenseNumber($number);
            $refilsize = $form->get('refill_size')->getData();
            $country = $form->get('country')->getData();
            $refillDate = $form->get('date')->getData();
            $addBlue->setRefill($refilsize);
            $addBlue->setRefillCountry($country);

            $addBlue->setRefillDate($refillDate);
            $truck->addAdBlueRefill($addBlue);

            $em->persist($truck);
            $em->flush();

            return new Response('AdBluie Refill Saved');
        }

        return $this->render(
            'refill/refill_main_page.html.twig',
            [
                'adddriver' => $form->createView(),

            ]
        );
    }
    /**
     * @param Request $request
     * @return Response
     * @Route("/refill/trailer", name="trailer_refill")
     */

    public function trailer()
    {
        return $this->render(
            'refill/refill_main_page.html.twig',
            [
                'adddriver' => $form->createView(),

            ]
        );
    }
}