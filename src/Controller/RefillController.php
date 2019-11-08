<?php

namespace App\Controller;

use App\Entity\AdBlueRefill;
use App\Entity\FrigoRefill;
use App\Entity\FuelRefill;
use App\Entity\Mileage;
use App\Entity\Trailer;
use App\Entity\Truck;
use App\Form\AdBlueRefillType;
use App\Form\RefillFrigoType;
use App\Form\RefillTruckType;
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

    public function trailer(Request $request): Response
    {
        $form = $this->createForm(RefillFrigoType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $refillFrigo = new  FrigoRefill();
            $trailerclass = $this->getDoctrine()->getRepository(Trailer::class);
            $number = $form->get('TrailerNumber')->getData();
            $trailer = $trailerclass->findOneByLicenseNumber($number);
            $date = $form->get('date')->getData();
            $refillFrigo->setDate($date);
            $liter = $form->get('FuellLiters')->getData();
            $refillFrigo->setRefill($liter);


            $trailer->addFrigoRefill($refillFrigo);

            $em->persist($refillFrigo);
            $em->flush();

            return new Response('Trailer Refill Saved');
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
     * @Route("/refill/truck", name="truck_refill")
     */
    public function truckRefill(Request $request): Response
    {
        $form = $this->createForm(RefillTruckType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $refillTruck = new FuelRefill();
            $mileage = new Mileage();
            $truckclass = $this->getDoctrine()->getRepository(Truck::class);
            $number = $form->get('licensenumber')->getData();
            $truck = $truckclass->findOneByLicenseNumber($number);
            $date = $form->get('date')->getData();
            $refillTruck->setDate($date);
            $liter = $form->get('refill')->getData();
            $refillTruck->setTruckrefill($liter);
            $country = $form->get('country')->getData();
            $refillTruck->setCountry($country);
            $mile = $form->get('odometr')->getData();
            $mileage->setOdometr($mile);
            $deepcomp = $form->get('deepcomp')->getData();
            $mileage->setDeepcomp($deepcomp);

            $truck->addFuelRefill($refillTruck);
            $truck->addMileage($mileage);

            $em->persist($truck);
            $em->flush();

            return new Response('Truck Refill Saved');
        }

        return $this->render(
            'refill/refill_main_page.html.twig',
            [
                'adddriver' => $form->createView(),

            ]
        );
    }
}
