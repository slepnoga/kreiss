<?php

namespace App\Controller;

use App\Entity\Trailer;
use App\Entity\Truck;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    /**
     * @Route("/", name="front_page")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        try {
            $truck = $em->getRepository(Truck::class)->getTruckCount();
        } catch (NonUniqueResultException $e) {
        }
        try {
            $trailer = $em->getRepository(Trailer::class)->getTrailerCount();
        } catch (NonUniqueResultException $e) {
        }

        $stat = true;

        return $this->render(
            'front/index.html.twig',
            [
                'truck' => $truck,
                'trailer' => $trailer,
                'stat' => $stat,
            ]
        );
    }
}
