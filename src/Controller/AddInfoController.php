<?php

namespace App\Controller;

use App\Entity\Trailer;
use App\Form\AddDriversType;
use App\Form\AddTelefonType;
use App\Form\AddTrailerType;
use App\Form\AddTruckType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddInfoController extends AbstractController
{
    /**
     * @Route("/addinfo",methods={"GET"}, name="add_info")
     * @return Response
     *
     */
    public function index(): Response
    {
        return $this->render('add/add_main_page.html.twig');
    }

    /**
     * @Route("/addinfo/driver",methods={"POST", "GET"}, name="add_info_driver")
     * @param Request $request
     * @return Response
     */
    public function driver(Request $request): Response
    {
        $form = $this->createForm(AddDriversType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $driver = $form->getData();

            $em->persist($driver);
            $em->flush();

            return new Response('User Saved');
        }

        return $this->render(
            'add/add_main_page.html.twig',
            [
                'adddriver' => $form->createView(),

            ]
        );
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/addinfo/truck", name="add_info_truck")
     */
    public function track(Request $request): Response
    {
        $form = $this->createForm(AddTruckType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $truck = $form->getData();
            $em->persist($truck);
            $em->flush();

            return new Response('Truck Saved');
        }


        return $this->render(
            'add/add_main_page.html.twig',
            [
                'adddriver' => $form->createView(),

            ]
        );
    }

    /**
     *
     * @Route("/addinfo/trailer", name="add_info_trailer")
     * @param Request $request
     * @return Response
     */
    public function trailer(Request $request): Response
    {
        $form = $this->createForm(AddTrailerType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $trailer = new Trailer();
            $type= $form ->get('type')->getData();
            $consump= $form ->get('consumptionrate')->getData();
            $licplate= $form->get('licensenumber')->getData();
            // 1 - frigo, 2 -dryvan ... see entity
            if ($type != 1 && $consump > 0) {
              throw new \InvalidArgumentException('Non Frigo Have Fuel');
            }

            if($type ==1 ){
                switch ($consump){
                    case 2:
                        break;
                    case 2.3:
                        break;
                    default:
                        throw new \InvalidArgumentException('Расход не тот');
                }
            }
            $trailer->setType($type);
            $trailer->setConsumptionrate($consump);
            $trailer->setLicensenumber($licplate);
            $em->persist($trailer);
            $em->flush();

            return new Response('Trailer Saved');
        }

        return $this->render(
            'add/add_main_page.html.twig',
            [
                'adddriver' => $form->createView(),

            ]
        );
    }
    /**
     *
     * @Route("/addinfo/telefon", name="add_info_telefon")
     * @param Request $request
     * @return Response
     */
    public function telefon(Request $request) :Response
    {
        $form = $this->createForm(AddTelefonType::class);
        $form->handleRequest($request);

        return $this->render(
            'add/add_main_page.html.twig',
            [
                'adddriver' => $form->createView(),

            ]
        );
    }
}
