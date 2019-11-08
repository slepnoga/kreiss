<?php


namespace App\Controller;

use App\Entity\Trailer;
use App\Entity\Truck;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class ReportController extends AbstractController
{
    /**
     * @Route("/slug/truck/{slug}", methods={"GET"}, name="slug_truck_by_slug")
     *
     */
    public function truck_slug_page($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository(Truck::class)
           ->find($slug)->getLicensenumber();

        return new Response($entity);
    }
    /**
     *@Route("/paginate/truck/{id}", name="paginate_truck")
     * @ParamConverter("id", class="App:Truck")
     *
    */
    public function truck_paginated_page(Truck $truck)
    {
    }

    /**
     * @Route("/slug/ttailer/{slug}", methods={"GET"}, name="slug_trailer_by_slug")
     *
     */
    public function truck_slug_trailer($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository(Trailer::class)
            ->find($slug)->getLicensenumber();

        return new Response($entity);
    }
}
