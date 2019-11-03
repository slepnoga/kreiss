<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class OtchetController extends AbstractController
{

    /**
     * @Route("/otchet", name="otchet_main")
     */
    public function index()
    {
        return $this->render(
            'otchet/index.html.twig',
            [

            ]
        );
    }
}
