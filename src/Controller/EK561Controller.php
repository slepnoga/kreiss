<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EK561Controller extends AbstractController
{
    /**
     *
     * @Route("/worktime", name="RTO")
     *
     */
    public function index()
    {
        return $this->render('ek561/index.html.twig', [

        ]);
    }
}
